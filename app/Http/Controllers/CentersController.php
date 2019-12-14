<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

class CentersController extends Controller
{
    public function create()
    {
//        return 'sad';
        return view('setting.create');
    }

    public function store()
    {
//        dd('store center');
        Center::create($this->validateRequest());
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'manager_name' => 'required'
        ]);
    }
}
