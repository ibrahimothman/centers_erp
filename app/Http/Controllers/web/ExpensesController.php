<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\PaymentModel;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ExpensesController extends Controller
{
    public function create()
    {
        $center = Center::FindOrFail(Session('center_id'));
        $instructors = $center->instructors;
//        return json_encode($instructors);
        return view('financialManagement/expenses', compact('instructors'));

    }
}
