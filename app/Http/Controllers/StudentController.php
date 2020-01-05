<?php

namespace App\Http\Controllers;

use App\Center;
use App\QueryFilter\Sort;
use App\QueryFilter\SortElse;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        $center = Center::findOrFail(Session('center_id'));
        $students = Student::allStudents($center);
        return view('students.all')->with('students',$students);
    }

    public function viewAll(){
        $center = Center::findOrFail(Session('center_id'));
        $students = Student::allStudents($center);
        return response()->json($students);
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
//        $this->authorize('create',Student::class);
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
        $student = Student::create(array_except($data,['state','city','address']));

        // attach student with center
        $center->students()->syncWithoutDetaching($student);

        // create address
        $student->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

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
            'nameAr' => 'required',
            'nameEn' => 'required',
            'email' => 'required|unique:students,email,'.$user_id,
            'idNumber' => 'required|digits:14',
            'image' => ' required|image|file | max:10000',
            'idImage' => 'sometimes|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/',
            //'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'faculty' => 'required',
        ]);
    }


    public function searchByName(){
        // search for only auth center
        $center = Center::findOrFail(Session('center_id'));
        if(request()->ajax()){
            $query = request()->get('query');
            if($query != ''){
                $students = $center->students()->where('nameEn', 'like', '%' . $query . '%')->get();
            }else{
                $students = $center->students;
            }

        }
        return response()->json($students);
    }

    private function deleteImage($image)
    {
        File::delete([
           public_path('/uploads/profiles/'.$image)
        ]);
    }
}
