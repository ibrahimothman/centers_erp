<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;

use App\Student;
use App\Transaction;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class RefundController extends Controller
{

    public function create()
    {
        $this->authorize('create', Transaction::class);
        return view("financialManagement/refund");
    }

    public function edit($transaction)
    {
        $this->authorize('update', Transaction::class);
        $transaction = Transaction::findOrFail($transaction);
        return view("financialManagement/edit_refund", compact("transaction"));
    }
}
