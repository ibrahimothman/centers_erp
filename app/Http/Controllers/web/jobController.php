<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Job;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class jobController extends Controller
{

    public function index()
    {
        $this->authorize('view',Job::class);
        $jobs = $this->center->jobs;
        return view('jobs/index', compact('jobs'));
    }

    public function create()
    {
        $this->authorize('create',Job::class);
        $jobs = Lang::get('jobs');
        return view('jobs.create', compact('jobs'));
    }

    public function store(Request $request)
    {

        $this->authorize('create',Job::class);
        $data = $this->validateRequest($request);
        if($data->fails()){
            return response()->json(['message' => "invalid data", 'errors' => $data->errors()->messages()], 400);
        }
        $job = $this->center->jobs()->create($data->validate());

        return response()->json(['message' => "job has successfully added"], 200);

    }

    public function show(Job $job)
    {

        return view('jobs/update', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update',$job);
        $data = $this->validateRequest($request);
        if($data->fails()){
            return response()->json(['message' => "invalid data", 'errors' => $data->errors()->messages()], 400);
        }
        $job->update($data->validate());
        return response()->json(['message' => "Successfully updated"], 200);

    }

    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), Job::rules($request));
    }
}
