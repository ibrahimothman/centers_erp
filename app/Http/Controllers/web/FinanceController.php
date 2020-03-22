<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\FinanceAccount;
use App\Http\Controllers\Controller;
use App\repository\TransactionRepository;
use App\Transaction;


class FinanceController extends Controller
{
    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $transactions = TransactionRepository::getInstance()->fetchTransactions($center);
        $accounts = FinanceAccount::with('children')->where('parent_id', null)->get();
//        foreach ($transactions as $transaction){
//            echo $transaction->payFor();
//        }
//        dd($transactions);
//        echo count($transactions);
//        return json_encode($transactions[0]->payFor());
        return view('financialManagement/financialManagement_show'
            , compact('transactions', 'accounts'));
    }
}
