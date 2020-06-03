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
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\Nullable;

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
        $transaction = $data->validate()['transaction'];
        $center->transactions()->create($transaction);

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
            'transaction.account_id' => ['required', 'integer'],
            'transaction.amount' => ['required', 'integer'],
            'transaction.rest' => ['required', 'integer'],
            'transaction.deserved_amount' => ['required', 'integer'],
            'transaction.meta_data' => ['required', 'array'],
            'transaction.meta_data.payer_id' => ['required', 'integer'],
            'transaction.meta_data.payer_type' => ['required'],
            'transaction.meta_data.payFor_id' => ['sometimes', 'nullable', 'integer', ],
            'transaction.meta_data.payFor_type' => ['sometimes'],
        ]);

        return $validator;
    }
}
