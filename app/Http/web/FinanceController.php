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
        $this->authorize('viewAny', Transaction::class);
        $results = TransactionRepository::getInstance()->fetchTransactions($this->center);
        return view('financialManagement/financialManagement_show'
            , compact('results'));
    }
}
