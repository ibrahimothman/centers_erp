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
        $results = TransactionRepository::getInstance()->fetchTransactions($center);

//        $accounts = FinanceAccount::with('children')->where('parent_id', null)->get();


//        return $results['transactions'][0]['expenses_amount'];
        return view('financialManagement/financialManagement_show'
            , compact('results'));
    }
}
