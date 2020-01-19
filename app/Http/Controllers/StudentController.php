<?php

namespace App\Http\Controllers;

use App\Center;
use App\helper\Uploader;
use App\QueryFilter\Name;
use App\QueryFilter\Sort;
use App\QueryFilter\SortElse;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Null_;
use const http\Client\Curl\AUTH_ANY;
use mysql_xdevapi\Session;


class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $this->authorize('viewAny',Student::class);
        return view('students.all')->with('students',$this->getStudents());
    }

    public function getStudents(){
        $center = Center::findOrFail(Session('center_id'));
        return Student::allStudents($center);

    }

    /**
     * Display a listing of the resource as table.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable()
    {
        $center = Center::findOrFail(Session('center_id'));
        $students = Student::allStudents($center);
        return view('students.all-table')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check if user has rights to view create_student_form
        //$this->authorize('create',Student::class);

        // $this->authorize('create',Student::class);
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
        // check if user has rights to add a new student

//        $this->authorize('create',Student::class);
        $data = $this->validateRequest('');

        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));

        // create a new student
        $student = Student::create(Arr::except($data,['state','city','address']));

        // attach student with center
        $student->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        $center->students()->syncWithoutDetaching($student);
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
//        $this->authorize('view',$student);
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

//        $this->authorize('update',$student);
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

//        $this->authorize('update',$student);

        // todo delete prev image from profiles dir

        $data = $this->validateRequest($student->id);

        // create a new student
        $this->deleteImage($student->image);
        $student->update(array_except($data,['state','city','address']));

        // update address
        $student->address()->update([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

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
        //policy
//        $this->authorize('delete',$student);

        // delete from pivot
        $center = Center::findOrFail(Session('center_id'));
        $center->students()->detach($student);

        // delete images
        $this->deleteImage($student->image);
        // delete record
        $student->delete();
        return redirect('/students')->with('success','students is deleted');

    }



    private function validateRequest($user_id)
    {
        return request()->validate([
            'nameAr' => 'required|unique:students,nameAr,'.$user_id,
            'nameEn' => 'required|unique:students,nameEn,'.$user_id,
            'email' => 'required|unique:students,email,'.$user_id,
            'idNumber' => 'required|digits:14|unique:students,idNumber,'.$user_id,
            'image' => ' required|image|file | max:10000',
            'idImage' => 'required|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/|unique:students,phoneNumber,'.$user_id,
            //'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'faculty' => 'required',
            'skillCardNumber' => 'required|unique:students,skillCardNumber,'.$user_id,
        ]);
    }


    public function searchByName(){
        return response()->json($this->getStudents());

    }

    private function deleteImage($image)
    {
        File::delete([
           public_path('/uploads/profiles/'.$image)
        ]);
    }
}
