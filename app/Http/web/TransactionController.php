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
use Symfony\Component\HttpFoundation\ServerBag;

use function foo\func;

class TransactionController extends Controller
{


    public function allTransactions()
    {
        return TransactionRepository::getInstance()->fetchTransactions($this->center);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Transaction::class);
        $center = $this->center;
        $data = $this->validateTransaction($request);
        if($data->fails()){
            return response()->json(['message' => 'invalid data'], 400);
        }


        $transaction = $data->validate()['transaction'];
        $transaction = $center->transactions()->create($transaction);
        return response()->json(
            [
                'data' => $this->responseData($transaction)
        ]);
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
            // 'transactions' => ['required' , 'array'],
            'transaction.account_id' => ['required', 'integer'],
            'transaction.amount' => ['required', 'integer'],
            'transaction.rest' => ['required', 'integer'],
            'transaction.deserved_amount' => ['required', 'integer'],
            'transaction.meta_data' => ['required', 'array'],
            'transaction.meta_data.payer_id' => ['required', 'integer'],
            'transaction.meta_data.payer_type' => ['required'],
            'transactions.*.meta_data.payFor_id' => ['sometimes', 'nullable', 'integer'],
            'transaction.meta_data.payFor_type' => ['sometimes'],
        ]);

        return $validator;
    }

    private function responseData($transaction){
        $client = '';
        $service = '';
        if ($transaction->account->parent_id != 6) {
            if($transaction->account_id == 9){
                $client = $transaction->payer()->nameAr;
                $service = $transaction->payFor()->name;
            }else{
                $client = $transaction->account->top_parent == 1 ?
                    $transaction->payer()->nameAr
                    : $transaction->payFor()->nameAr ;

                $service = $transaction->account->top_parent == 1 ?
                    $transaction->payFor()->name
                    : $transaction->payFor()->payment_model['salary'];
            }


        }

        return [
            'code' => $transaction->getCode(),
            'date' => $transaction->created_at->format('Y-m-d H:i:s'),
            'amount' => $transaction->amount,
            'deserved_amount' => $transaction->deserved_amount,
            'rest' => $transaction->rest,
            'service' => $service,
            'client' => $client
        ];
    }
}
