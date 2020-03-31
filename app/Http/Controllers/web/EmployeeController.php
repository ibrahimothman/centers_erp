<?php

namespace App\Http\Controllers\web;

use App\Employee;
use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\Invitation;
use App\Rules\UniquePerCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        $center = Center::findOrFail(Session('center_id'));
        $employees = Employee::allEmployees($center);
        return view("employee/index", compact('employees'));
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

        // 2) create an employee related to that user
        $data = $this->validateRequest($request);
        $data = $data->validate();

        $center = Center::findOrFail(Session('center_id'));
        $employee=$center->employees()->create(Arr::except($data,['state','city','address', 'jobs', 'send_invitation']));


        // create address
        $employee->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);


         // if this employee is wanted to be a user, send him an user invitation
        if(isset($data['send_invitation'])){
            $invitation = (new \App\Invitation)->addNew([
                'email' => $data['email'],
                'jobs' => $data['jobs']
            ]);
        }

        return redirect("/employees");
    }


    public function show(Employee $employee)
    {
        //
//        return json_encode($employee);

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
        $v = Validator::make($request->all(),[
            'idNumber' => ['required', 'digits:14',  new UniquePerCenter(Employee::class, '')],
//            'image' => ' sometimes |nullable|image|file | max:10000',
//            'idImage' => 'sometimes |nullable|image|file | max:10000',
            'phoneNumber' => ['required', 'regex:/(01)[0-9]{9}/',new UniquePerCenter(Employee::class, '')],
//            'phoneNumberSec' => 'nullable|regex:/(01)[0-9]{9}/',
            'passportNumber' => ['sometimes', new UniquePerCenter(Employee::class, '')],
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'payment_model' => ['required', 'integer'],
            'payment_model_meta_data' => ['required', 'array'],
            'nameAr' => ['required', new UniquePerCenter(Employee::class, '')],
            'nameEn' => ['required', new UniquePerCenter(Employee::class, '')],
            'send_invitation' => 'sometimes'

        ]);

        $v->sometimes('email', ['required', 'email', new UniquePerCenter(Employee::class, '')], function ($input){
            return $input->send_invitation;
        });

        $v->sometimes('jobs', ['required', Rule::notIn([0])], function ($input){
            return $input->send_invitation;
        });
        return $v;
    }
}
