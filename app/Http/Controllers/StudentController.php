<?php

namespace App\Http\Controllers;

use App\Center;
use App\StudentDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\File\File;


class StudentController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.all')->with('students',$students);
    }

    public function viewAll(){
        $students = DB::table('users')
            ->orderBy('created_at','desc')
            ->join('student_details', 'users.id', '=', 'student_details.student_id')
            ;


        return response()->json($students);
    }

    /**
     * Display a listing of the resource as table.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {

        $students = Student::orderBy('id','asc')->get();
        return view('students.all-table')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $student = new Student();
        return view('students.studentCreate',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // todo : attach student to the center
        $center = Center::first();
        $student = Student::create($this->validateRequest(''));
        $this->storeImage($student);
        $center->students()->syncWithoutDetaching($student);
//        $center->push();

        return redirect("/students/$student->id");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {


//        dd($student);
        return view('students.studentEdit',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student)
    {
        $student->update($this->validateRequest($student->id));
        $this->storeImage($student);
        return redirect("/students/$student->id")->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        $student->delete();
        return redirect('/students')->with('success','students is deleted');

    }



    private function validateRequest($user_id)
    {
        return request()->validate([
            'nameAr' => 'required',
            'nameEn' => 'required',
            'email' => 'required|unique:students,email,'.$user_id,
            'idNumber' => 'required|digits:14',
            'image' => ' sometimes|image|file | max:10000',
            'idImage' => 'sometimes|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/',
            'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'skillCardNumber' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'faculty' => 'required',
        ]);
    }

    private function storeImage($student)
    {
        if (request()->has('image')){
            $student->update([
                'image' => request()->image->store('profiles','public'),
            ]);
        }
    }

    public function searchByName(){
        if(request()->ajax()){
            $query = request()->get('query');
            if($query != ''){
                $students = Student::where('nameEn', 'like', '%' . $query . '%')->get();
            }else{
                $students = Student::all();
            }

        }
        return response()->json($students);
    }
}
