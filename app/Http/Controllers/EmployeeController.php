<?php

namespace App\Http\Controllers;

use App\Center;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $center = Center::findOrFail(Session('center_id'));
        $jobs = $center->jobs;
        return view('employee.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // todo 1) create user account for this employee
//        $user = User::create($this->validateRequest());

        // 2) create an employee related to that user
        $data = $this->validateRequest();
        $employee = Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
        ]);

        // create address
        $employee->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        // save job
        $employee->jobs()->syncWithoutDetaching($data['job']);
        dd('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => ['required', 'string', 'max:255','unique:employees,name'],
            'email' => ['required', 'string', 'email', 'max:255','unique:employees,email'],
            'phoneNumber' => 'required',
            'job' => 'required',
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
    }
}
