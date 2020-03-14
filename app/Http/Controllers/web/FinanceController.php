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
        return view('financialManagement/financialManagement_show', compact('transactions'));
    }
}
