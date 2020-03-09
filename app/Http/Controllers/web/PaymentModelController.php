<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class PaymentModelController extends Controller
{
    public function create()
    {
        $center = Center::findOrFail(Session('center_id'));
        $payment_models = $center->paymentModels;
//        return json_encode($payment_models);
        return view('welcome', compact('payment_models'));
    }

    public function updateInstructorPayment()
    {
////        echo json_encode(request('payment_model'));
//        $instructor = Instructor::findOrFail(2);
//        foreach (json_decode($instructor->payment_model, true) as $key => $value){
//            echo $key;
//        }
    }
}
