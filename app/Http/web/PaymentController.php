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

        $instructors = $this->center->instructors;
        $employees = $this->center->employees;
        $payment_models = $this->center->paymentModels;
        return view('paymentRecord.payment_instructor', compact('instructors', 'employees',  'payment_models'));
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
