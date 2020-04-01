<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\FinanceAccount;
use App\Http\Controllers\Controller;
use App\PaymentModel;
use App\repository\EmployeeRepository;
use App\repository\InstructorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use mysql_xdevapi\Session;

class ExpensesController extends Controller
{
    public function create()
    {

        $instructors = InstructorRepository::getInstance()->allInstructors();
        $employees = EmployeeRepository::getInstance()->allEmployees();
        $accounts = FinanceAccount::all()->where('parent_id', 6);


        return view('financialManagement/expenses'
            , compact('instructors', 'employees', 'accounts'));

    }
}
