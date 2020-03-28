<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $center = Auth::user()->center;
//        dd(Session('center_id'));
        return view('account_settings/setting', compact('center'));
    }



}
