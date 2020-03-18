<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
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
//        (Employee::findOrFail(1)->delete();
//        dd'deleted');
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
        $payment_models = $center->paymentModels;
        return view('employee.create', compact('jobs', 'payment_models'));
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
//        dd($request->all());
//        $user = User::create($this->validateRequest());

        // 2) create an employee related to that user
        $data = $this->validateRequest($request);

        $data = $data->validate();
        $center = Center::findOrFail(Session('center_id'));
        $employee=$center->employees()->create(Arr::except($data,['state','city','address']));


        // create address
        $employee->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        // todo 2) save employee's jobs
        // $employee->jobs()->syncWithoutDetaching($data['job']);

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

    private function validateRequest($request)
    {
        return Validator::make($request->all(),[
            'idNumber' => 'required|digits:14',
//            'image' => ' sometimes |nullable|image|file | max:10000',
//            'idImage' => 'sometimes |nullable|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/',
            'phoneNumberSec' => 'nullable|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'payment_model' => ['required', 'integer'],
            'payment_model_meta_data' => ['required', 'array'],
            'name' => 'required| unique:employees,name,NULL,id,center_id,'.Session('center_id'),
//            'job' => 'required',

        ]);
    }
}
