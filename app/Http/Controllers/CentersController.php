<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        Center::create($this->validateRequest());
        return redirect('/');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'manager_name' => 'required'
        ]);
    }
}
