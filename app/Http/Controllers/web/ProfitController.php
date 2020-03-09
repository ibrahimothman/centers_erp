<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ProfitController extends Controller
{
    public function index(){
        return view("financialManagement/profit");
    }


}
