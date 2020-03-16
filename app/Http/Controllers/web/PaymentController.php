<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class PaymentController extends Controller
{

    public function create()
    {

        $center = Center::findOrFail(Session('center_id'));
        $instructors = $center->instructors;
        $employees = $center->employees;
        $payment_models = $center->paymentModels;
        return view('paymentRecord.payment_instructor', compact('instructors', 'employees',  'payment_models'));
    }

    public function store(Request $request)
    {


    }

    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'payable_id' => 'required',
            'payable_type' => 'required',
            'payment_model' => 'required',
            'meta_data' => ['required', 'array'],
        ]);
    }
}
