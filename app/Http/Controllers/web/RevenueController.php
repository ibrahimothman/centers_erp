<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;

use App\Student;
use App\Transaction;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class RevenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        return json_encode(Transaction::allTransactions($center));
    }

    public function create()
    {
        // get students with diplomas in which they enroll
        $center = Center::findOrFail(Session('center_id'));
        $students = $center->students()->with('diplomas.diploma')->get();
//        return response()->json($students);
        return view("financialManagement/revenues", compact('students'));
    }
}
