<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\Transaction;


class FinanceController extends Controller
{
    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $transactions = Transaction::allTransactions($center);
        $revenue_amount = 0;
        $expenses_amount = 0;
        $transactions->filter(function ($value) use (&$revenue_amount, &$expenses_amount){
           if($value->account == 1){
               $revenue_amount += $value->amount;
               return true;
           }
           else{
               $expenses_amount += $value->amount;
           }
        });

        $transactions['revenues_amount'] = $revenue_amount;
        $transactions['expenses_amount'] = $expenses_amount;
//        return json_encode($transactions);
        return view('financialManagement/financialManagement_show', compact('transactions'));
    }
}
