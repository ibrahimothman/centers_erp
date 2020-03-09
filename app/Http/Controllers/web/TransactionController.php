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
//        dd($request->all());
        $center = Center::findOrFail(Session('center_id'));
        $date = $this->validateTransaction($request);
        $center->transactions()->create($date->validate());
        return response()->json('transactions are successfully added :)');
    }


    private function validateTransaction(Request $request)
    {
        /*
         * date, amount, account, meta-data
         * */
        return Validator::make($request->all(),[
            'date' => 'required | date',
            'amount' => 'required | integer',
            'account' => 'required | integer',
            'meta_data' => ['required']
        ]);
    }
}
