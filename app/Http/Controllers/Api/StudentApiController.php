<?php


namespace App\Http\Controllers\Api;


use App\Address;
use App\Center;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResource;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentApiController extends Controller
{
    public function index()
    {
        $center = Auth::user()->center;
        return StudentResource::collection(Student::allStudents($center));
    }


    public function store(Request $request)
    {

        $student_data = $this->validateRequest($request);
        if($student_data->fails()){
            return response()->json($student_data->errors(), 400);
        }

        // fetch center from session
        $center = Auth::user()->center;

        // create a new student
        $student = Student::create(Arr::except($student_data->validate(),['state','city','address']));

       $state  = $request->all()['state'];
        $city  = $request->all()['city'];
        $address  = $request->all()['address'];
        echo $state;

        // attach student with center
        $student->address()->create([
            'state' => $state,
            'city' => $city,
            'address' => $address,
        ]);


        $center->students()->syncWithoutDetaching($student);
        return new StudentResource($student);


    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    private function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nameAr' => 'required|unique:students,nameAr',
            'nameEn' => 'required|unique:students,nameEn',
            'email' => 'required|unique:students,email',
            'idNumber' => 'required|digits:14|unique:students,idNumber,',
            'image' => ' required|image|file | max:10000',
            'idImage' => 'required|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/|unique:students,phoneNumber',
            //'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'faculty' => 'required',
            'skillCardNumber' => 'required|unique:students,skillCardNumber',
        ]);

        return $validator;

    }
}
