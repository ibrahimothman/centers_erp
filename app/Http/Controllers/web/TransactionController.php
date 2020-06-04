<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Diploma;
use App\Http\Controllers\Controller;
use App\repository\TransactionRepository;
use App\Rules\TransactionMetaDateRule;
use App\Student;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\Nullable;
use function foo\func;

class TransactionController extends Controller
{


    public function allTransactions()
    {
        $center = Center::findOrFail(Session('center_id'));
        return TransactionRepository::getInstance()->fetchTransactions($center);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $center = Center::findOrFail(Session('center_id'));
        $data = $this->validateTransaction($request);
        if($data->fails()){
            dd($data->errors()->messages());
            return response()->json(['message' => 'invalid data'], 400);
        }

        $transactions = $data->validate()['transactions'];
        DB::transaction(function() use ($transactions, $center){
            foreach ($transactions as $transaction){
                $center->transactions()->create($transaction);
            }
        });

        return response()->json(['message' => 'transactions are successfully added :)', 'error' => false]);
    }


    public function update(Request $request, Transaction $transaction)
    {
        $data = Validator::make($request->all(),[
            'amount' => 'required | numeric',
            'date' => 'required | date',
            'rest' => 'required | numeric',
        ]);


        $data = $data->validate();
        $transaction->update($data);
        return redirect()->back()->with('message', 'Successfully updated');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(['massage' => 'deleted'], 200);
    }

    private function validateTransaction(Request $request)
    {
        /*
         * date, amount, account, meta-data
         * */
        $validator =  Validator::make($request->all(),[
            'transactions' => ['required' , 'array'],
            'transactions.*.account_id' => ['required', 'integer'],
            'transactions.*.amount' => ['required', 'integer'],
            'transactions.*.rest' => ['required', 'integer'],
            'transactions.*.deserved_amount' => ['required', 'integer'],
            'transactions.*.meta_data' => ['required', 'array'],
            'transactions.*.meta_data.payer_id' => ['required', 'integer'],
            'transactions.*.meta_data.payer_type' => ['required'],
            'transactions.*.meta_data.payFor_id' => ['sometimes', 'nullable', 'integer'],
            'transactions.*.meta_data.payFor_type' => ['sometimes'],
        ]);

        return $validator;
    }
}
