<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\PaymentModel;
use App\repository\EmployeeRepository;
use App\repository\InstructorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use mysql_xdevapi\Session;

class ExpensesController extends Controller
{
    public function create()
    {

        $center = Center::FindOrFail(Session('center_id'));
        $instructors = InstructorRepository::getInstance()->allInstructors();
        $employees = EmployeeRepository::getInstance()->allEmployees();

//        return json_encode($employees[0]);
//        $transactions = $center->transactions()->where("meta_data->payFor_type", "App\Instructor")
//            ->where("meta_data->payFor_id", "7")->latest()->first();
//        return json_encode($instructors);
        return view('financialManagement/expenses', compact('instructors', 'employees'));

    }
}
