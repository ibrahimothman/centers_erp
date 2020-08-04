<?php
namespace App\Http\Controllers\web;

use App\Address;
use App\City;
use App\Http\Controllers\Controller;

use App\State;
use Illuminate\Http\Request;
use App\Student;

use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{


    public function index()
    {

        $this->authorize('view',Student::class);

        return view('students.all')->with('students',$this->getStudents());
    }

    public function getStudents(){
        return Student::allStudents($this->center);

    }


    public function showTable()
    {
        $students = Student::allStudents($this->center);
        return view('students.all-table')->with('students', $students);
    }


    public function create()
    {
        // authorization check
        $this->authorize('create', Student::class);

        $student = new Student();
        $student->address = new Address();
        return view('students.studentCreate',compact('student'));
    }


    public function store(Request $request)
    {
        // check if user has rights to add a new student
        $this->authorize('create', Student::class);

        $data = $this->validateRequest($request);

        // create a new student
        $student = Student::create(Arr::except($data->validate(),['state','city','address']));

        // attach student with center
        $student->address()->create([
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
        ]);

        $this->center->students()->syncWithoutDetaching($student);
        $return = $request->get('next') == 'students'? "/students/$student->id": "/students/create";
        return redirect($return)->with('success','Student added successfully');

    }



    public function show(Student $student)
    {
        // check if student related to the auth center
        if (! $this->center->students->contains($student)){
            return abort(404);
        }

        // authorization check
        $this->authorize('view', Student::class);
        $student->address = $student->getAddress($student->address);
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
            'state' => $request->has('state')? $request->get('state'): $student->address->state,
            'city' => $request->has('city')? $request->get('city'): $student->address->city,
            'address' => $request->has('address')? $request->get('address'): $student->address->address,
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

    public function getTests(Request $request)
    {
        return Student::findOrFail($request->get('student_id'))->tests();
    }

    public function getDiplomas(Request $request)
    {
        return Student::findOrFail($request->get('student_id'))->diplomas();
    }

}
