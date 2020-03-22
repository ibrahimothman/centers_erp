<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\repository\TransactionRepository;
use App\Transaction;


class FinanceController extends Controller
{
    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $transactions = TransactionRepository::getInstance()->fetchTransactions($center);
//        foreach ($transactions as $transaction){
//            echo $transaction->payFor();
//        }
//        dd($transactions);
//        echo count($transactions);
        return json_encode($transactions[count($transactions) -6]);
//        return view('financialManagement/financialManagement_show', compact('transactions'));
    }
}
