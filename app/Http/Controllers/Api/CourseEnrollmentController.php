<?php


namespace App\Http\Controllers\Api;


use App\CourseGroup;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseEnrollment as CourseEnrollmentResource;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseEnrollmentController extends Controller
{

    public function index()
    {
        $student = Student::findOrFail(request('student'));
        return CourseEnrollmentResource::collection($student->courses);
    }

    public function store(Request $request)
    {
        $enrollment_data = $this->validateEnrollment($request)->validate();
        Student::findOrFail($enrollment_data['student_id'])->courses()->syncWithoutDetaching($enrollment_data['group_id']);
        return response()->json(['message' => 'You are now enrolled in this groups'], 200);
    }


    public function validateEnrollment(Request $request)
    {
        return Validator::make($request->all(), [
            'student_id' => ['required', 'integer'],
            'group_id' => ['required', 'integer'],
        ]);
    }

}
