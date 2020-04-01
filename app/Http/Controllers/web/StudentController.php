<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\helper\ImageUploader;
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
//        dd($center);
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
//        dd(Session('center_id'));
        //check if user has rights to view create_student_form
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
        $data = $this->validateRequest($request);


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
    public function update(Request $request, Student $student)
    {

//        $this->authorize('update',$student);

        // todo delete prev image from profiles dir

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
//        $this->authorize('delete',$student);
        $student->delete();
        return redirect('/students')->with('success','students is deleted');

    }



    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), Student::rules($request));
    }


    public function searchByName(){
        return response()->json($this->getStudents());

    }


}
