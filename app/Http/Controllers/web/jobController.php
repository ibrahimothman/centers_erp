<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Job;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class jobController extends Controller
{

//    public function index()
//    {
//        return view('jobs/index');
//    }

    public function create()
    {

        return view('jobs.create');
    }

    public function store(Request $request)
    {

        $data = $this->validateRequest($request);
        if($data->fails()){
            return response()->json(['message' => "invalid data", 'errors' => $data->errors()->messages()], 400);
        }
        $job = $this->center->jobs()->create($data->validate());

        return response()->json(['message' => "job has successfully added"], 200);

    }

    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), Job::rules($request));
    }
}
