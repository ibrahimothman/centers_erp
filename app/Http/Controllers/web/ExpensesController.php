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
        foreach ($instructors as $instructor){
            $rest = $center->transactions()->where("meta_data->payFor_type", "App\Instructor")
            ->where("meta_data->payFor_id", "$instructor->id")->latest()->first()['rest'];

            $instructor['rest'] = is_null($rest)? 0 : $rest;
            $instructor['total'] = $instructor->payment_model['salary'] + $instructor['rest']  ;

        }
//        $transactions = $center->transactions()->where("meta_data->payFor_type", "App\Instructor")
//            ->where("meta_data->payFor_id", "7")->latest()->first();
//        return json_encode($instructors);
        return view('financialManagement/expenses', compact('instructors'));

    }
}
