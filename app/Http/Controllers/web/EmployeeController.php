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
        $employee = new Employee();
        $center = Center::findOrFail(Session('center_id'));
        $jobs = $center->jobs;
        $payment_models = $center->paymentModels;
        return view('employee.create', compact('employee', 'jobs', 'payment_models'));
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
        $employee=$center->employees()->create(Arr::except($data,['state','city','address', 'job', 'send_invitation']));


        // create address
        $employee->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        // attach employee with related job
        if($data['job'] != "0"){
             $employee->update([
                 'job_id' => $data['job']
             ]);
        }


        // if this employee is wanted to be a user, send him an user invitation
        if(isset($data['send_invitation'])){
            $invitation = (new \App\Invitation)->addNew([
                'email' => $data['email'],
                'jobs' => $data['job']
            ]);
        }

        return redirect("/employees");
    }


    public function show(Employee $employee)
    {
        //

        return view('employee.show', compact('employee'));

    }


    public function edit(Employee $employee)
    {
//        dd($employee->payment_model_meta_data);
        $center = Center::findOrFail(Session('center_id'));
        $jobs = $center->jobs;
        $payment_models = $center->paymentModels;
        return view('employee.update', compact('employee', 'jobs', 'payment_models'));
    }

    public function update(Request $request, Employee $employee)
    {
        //
        $data = $this->validateRequest($request);
        $data = $data->validate();
        $employee->update(Arr::except($data,['state','city','address', 'job', 'send_invitation']));


        // create address
        $employee->address()->update([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        // attach employee with related job
        if($data['job'] != "0"){
            $employee->update([
                'job_id' => $data['job']
            ]);
        }


        // if this employee is wanted to be a user, send him an user invitation
        if(isset($data['send_invitation'])){
            $invitation = (new \App\Invitation)->addNew([
                'email' => $data['email'],
                'jobs' => $data['job']
            ]);
        }

        return redirect('employees/'.$employee->id);

    }


    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return back();
    }

    private function validateRequest(Request $request)
    {
        $v = Validator::make($request->all(),Employee::rules($request));
        $v->sometimes('job', ['required', Rule::notIn([0])], function ($input){
            return $input->send_invitation;
        });

        if($request->isMethod('post')){
            $v->sometimes('email', ['required', 'email', new UniquePerCenter(Employee::class, '')], function ($input){
                return $input->send_invitation;
            });

        }
        else{
            $employee_id = $request->route('employee')->id;
            $v->sometimes('email', ['required', 'email', new UniquePerCenter(Employee::class, $employee_id)], function ($input){
                return $input->send_invitation;
            });

        }

        return $v;
    }
}
