<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\FinanceAccount;
use App\Http\Controllers\Controller;
use App\PaymentModel;
use App\repository\EmployeeRepository;
use App\repository\InstructorRepository;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use mysql_xdevapi\Session;

class SalaryController extends Controller
{
    public function create()
    {

        $instructors = InstructorRepository::getInstance()->allInstructors();
        $employees = EmployeeRepository::getInstance()->allEmployees();


        return view('financialManagement/salaries'
            , compact('instructors', 'employees'));

    }

    public function edit($transaction)
    {
        $type = Input::has('type') ? Input::get('type'): 'salaries';
        $transaction = Transaction::findOrFail($transaction);

        return view("financialManagement/edit_$type", compact('transaction'));
    }


}
