<?php


namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResource;
use App\Rules\DegreeRule;
use App\Rules\FacultyRule;
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
            $errorString = $student_data->messages()->all()[0];
            return response()->json(['message' => $errorString], 400);
        }

        // create a new student
        $student = Student::create(Arr::except($student_data->validate(),['state','city','address']));
//
//        // attach student with center
        $student->address()->create([
            'state' => $request->all()['state'],
            'city' => $request->all()['city'],
            'address' => $request->all()['address'],
        ]);
//
//         todo fetch center from session
//        $center = Auth::user()->center;
//        // attach the student to the center
//        $center->students()->syncWithoutDetaching($student);
        return new StudentResource($student);


    }

    public function show(Student $student)
    {
        $this->authorize('view',$student);
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $student_data = $this->validateRequest($request);
        if($student_data->fails()){
            $errorString = $student_data->messages()->all()[0];
            return response()->json(['message' => $errorString], 400);
        }
        // create a new student
        $student->update(Arr::except($student_data->validate(),['state','city','address']));

        // update address

        $student->address()->update([
            'state' => $request->has('state')? $request->all()['state']: $student->address->state,
            'city' => $request->has('city')? $request->all()['city']: $student->address->city,
            'address' => $request->has('address')? $request->all()['address']: $student->address->address,
        ]);
//
        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        //policy
//        $this->authorize('delete',$student);
        $student->delete();
        return response()->json(['message' => 'The student has successfully deleted'], 200);

    }

    private function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(), Student::rules($request));
        return $validator;

    }

}
