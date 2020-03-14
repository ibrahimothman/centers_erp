<?php


namespace App\Http\Controllers\Api;


use App\CourseGroup;
use App\Http\Controllers\Controller;
use App\Http\Resources\Course;
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
        if(! Student::find($enrollment_data['student_id'])){
            return response()->json(['message' => 'invalid student'], 200);
        }

        if(! CourseGroup::find($enrollment_data['group_id'])){
            return response()->json(['message' => 'invalid course group'],200);
        }
        if($this->checkIfStudentHasEnrolledInThisCourseBefore($enrollment_data['student_id'], $enrollment_data['group_id'])){
            return response()->json(['message' => "You're already enrolled in this course"]);
        }
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

    private function checkIfStudentHasEnrolledInThisCourseBefore($student_id, $courseGroup_id)
    {
        $groups = CourseGroup::find($courseGroup_id)->course->groups;
        foreach ($groups as $group){
            if($group->joiners->contains(Student::find($student_id))) return true;
        }
        return false;
    }

}
