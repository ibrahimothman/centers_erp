<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class CentersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('center.create');
    }

    public function store()
    {
        Auth::user()->centers()->create($this->validateRequest());
        dd(Session('center_id'));
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'manager_name' => 'required'
        ]);
    }
}
