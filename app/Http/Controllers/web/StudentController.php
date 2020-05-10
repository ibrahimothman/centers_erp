<?php
namespace App\Http\Controllers\web;

use App\helper\AccessRightsHelper;
use App\Http\Controllers\Controller;

use App\Center;
use App\helper\ImageUploader;
use App\Job;
use App\QueryFilter\Name;
use App\QueryFilter\Sort;
use App\QueryFilter\SortElse;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function index()
    {

        $this->authorize('view',Student::class);

        return view('students.all')->with('students',$this->getStudents());
    }

    public function getStudents(){
        $center = Center::findOrFail(Session('center_id'));
        return Student::allStudents($center);

    }


    public function showTable()
    {
        $center = Center::findOrFail(Session('center_id'));
        $students = Student::allStudents($center);
        return view('students.all-table')->with('students', $students);
    }


    public function create()
    {
        // authorization check
        $this->authorize('create', Student::class);

        $student = new Student();
        return view('students.studentCreate',compact('student'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        // check if user has rights to add a new student
        $this->authorize('create', Student::class);

        $data = $this->validateRequest($request);
//        if ($data->fails()){
//            dd($data->errors()->messages());
//        }

        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));

        // create a new student
        $student = Student::create(Arr::except($data->validate(),['state','city','address']));

        // attach student with center
        $student->address()->create([
            'state' => $request->all()['state'],
            'city' => $request->all()['city'],
            'address' => $request->all()['address'],
        ]);

        $center->students()->syncWithoutDetaching($student);
        $return = $request->get('return') == 'students'? "/students/$student->id": "/students/create";
        return redirect($return)->with('success','Student added successfully');

    }



    public function show(Student $student)
    {
        // check if student related to the auth center
        $center = Center::findOrFail(Session('center_id'));
        if (! $center->students->contains($student)){
            return abort(404);
        }

        // authorization check
        $this->authorize('view', Student::class);
        return view('students.show',compact('student'));
    }


    public function edit(Student $student)
    {
        $this->authorize('update', $student);
        return view('students.studentEdit',compact('student'));
    }


    public function update(Request $request, Student $student)
    {

        $this->authorize('update',$student);

        $data = $this->validateRequest($request);

        // create a new student
        $student->update(Arr::except($data->validate(),['state','city','address']));

        // update address

        $student->address()->update([
            'state' => $request->has('state')? $request->all()['state']: $student->address->state,
            'city' => $request->has('city')? $request->all()['city']: $student->address->city,
            'address' => $request->has('address')? $request->all()['address']: $student->address->address,
        ]);

        return redirect("/students/$student->id")->with('success','updated');
    }

  function destroy(Student $student)
    {
        //policy
        $this->authorize('delete',$student);
        $student->delete();
        return response()->json('student deleted successfully', 200);

    }



    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), Student::rules($request));
    }


    public function searchByName(){
        return response()->json($this->getStudents());

    }


}
