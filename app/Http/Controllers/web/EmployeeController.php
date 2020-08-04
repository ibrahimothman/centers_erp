<?php

namespace App\Http\Controllers\web;

use App\Address;
use App\Employee;
use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\Invitation;
use App\PaymentModel;
use App\Rules\UniquePerCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Session;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = $this->getEmployees();
        return view("employee/index", compact('employees'));
    }

    public function getEmployees()
    {
        return Employee::allEmployees($this->center);

    }


    public function create()
    {
        //
        $employee = new Employee();
        $employee->address = new Address();
        $jobs = $this->center->jobs;
        $payment_models = PaymentModel::all();
        return view('employee.create', compact('employee', 'jobs', 'payment_models'));
    }


    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $data = $data->validate();
        $employee=$this->center->employees()->create(Arr::except($data,['state','city','address', 'job', 'send_invitation']));


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
//            dd('sendinvitaion');
            $invitation = (new \App\Invitation)->addNew([
                'email' => $data['email'],
                'jobs' => $data['job']
            ]);

        }
        $next = $request->get('next') == 'save' ? "employees": 'employees/create';

        return redirect($next)->with('success', 'The employee is added successfully');
    }


    public function show(Employee $employee)
    {
        $employee->address = $employee->getAddress($employee->address);
        return view('employee.show', compact('employee'));

    }


    public function edit(Employee $employee)
    {
        $jobs = $this->center->jobs;
        $payment_models = $this->center->paymentModels;
        return view('employee.update', compact('employee', 'jobs', 'payment_models'));
    }

    public function update(Request $request, Employee $employee)
    {
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
        $employee->update(
            [
                'job_id' => $data['job'] == '0'? null : $data['job']
            ]);



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
        return response()->json('employee deleted successfully', 200);
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
