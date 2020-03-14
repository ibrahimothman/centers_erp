<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Diploma;
use App\Http\Controllers\Controller;
use App\Rules\TransactionMetaDateRule;
use App\Student;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class TransactionController extends Controller
{


    public function allTransactions()
    {
        $center = Center::findOrFail(Session('center_id'));
        $transactions = Transaction::allTransactions($center);
        $revenues_amount = 0;
        $expenses_amount = 0;
        $transactions->filter(function ($value) use (&$revenues_amount, &$expenses_amount){
            if($value->account == 1){
                $revenues_amount += $value->amount;
                return true;
            }
            else{
                $expenses_amount += $value->amount;
            }
        });
        $transactions['revenues_amount'] = $revenues_amount;
        $transactions['expenses_amount'] = $expenses_amount;
        return $transactions;
    }

    public function store(Request $request)
    {
        $center = Center::findOrFail(Session('center_id'));
        $data = $this->validateTransaction($request);
        if($data->fails()){
            return response()->json(['message' => 'invalid data', 'error' => true]);
        }
        $transactions = $data->validate()['transactions'];
        foreach ($transactions as $transaction){
            $center->transactions()->create($transaction);
        }
        return response()->json(['message' => 'transactions are successfully added :)', 'error' => false]);
    }


    private function validateTransaction(Request $request)
    {
        /*
         * date, amount, account, meta-data
         * */
        return Validator::make($request->all(),[
            'transactions' => ['required' , 'array'],
            'transactions.*.account' => ['required', 'integer'],
            'transactions.*.amount' => ['required', 'integer'],
            'transactions.*.date' => ['required', 'date'],
            'transactions.*.meta_data' => ['required', 'array'],
            'transactions.*.meta_data.payer_id' => ['required', 'integer'],
            'transactions.*.meta_data.payer_type' => ['required'],
            'transactions.*.meta_data.payFor_id' => ['required', 'integer'],
            'transactions.*.meta_data.payFor_type' => ['required'],
        ]);
    }
}
