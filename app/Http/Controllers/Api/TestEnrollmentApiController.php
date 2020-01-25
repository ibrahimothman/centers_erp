<?php

namespace App\Http\Controllers\Api;

use App\Student;
use App\Http\Resources\TestGroup as TestGroupResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestEnrollmentApiController extends Controller
{


    public function store(Request $request){
        $enrollment_data = $this->validateRequest($request);
        if($enrollment_data->fails()){
            return response()->json($enrollment_data->errors(), 400);
        }

        $student = Student::findOrFail($enrollment_data->validate()['student_id']);
        $student->testsEnrolling()->syncWithoutDetaching($enrollment_data->validate()['test_group_id']);
        return response()->json(['message' => 'Successfully you have enrolled in this group'], 200);
    }

    public function show($student){
        return TestGroupResource:: collection(Student::findOrFail($student)->testsEnrolling);
    }

    public function cancelEnrollment(Request $request){
        $enrollment_data = $this->validateRequest($request);
        if($enrollment_data->fails()){
            return response()->json($enrollment_data->errors(), 400);
        }
        $student = Student::findOrFail($enrollment_data->validate()['student_id']);
        $student->testsEnrolling()->detach($enrollment_data->validate()['test_group_id']);
        return response()->json(['message' => 'Successfully you have unenrolled in this group'], 200);

//        return $student.' / '.$test_group;
    }


    private function validateRequest(Request $request){
        return Validator::make($request->all(),[
            'student_id' => ['required','integer'],
            'test_group_id' => ['required','integer'],
        ]);
    }
}
