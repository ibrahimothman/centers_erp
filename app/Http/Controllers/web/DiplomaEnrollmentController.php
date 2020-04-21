<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Diploma;
use App\DiplomaGroup;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class DiplomaEnrollmentController extends Controller
{

    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $all_diplomas = $center->diplomas()->with('groups.students')->get();
        $diplomas = Center::allDiplomasEnrollments($center);
//        return response()->json($diplomas);
        return view('diploma.diploma_student_show', compact('all_diplomas', 'diplomas'));
    }

    public function create()
    {
        $center = Center::findOrFail(Session('center_id'));
        $diplomas = Diploma::with('groups')->where('center_id', $center->id)->get();

        return view('diploma.diploma_student_register', compact('diplomas'));
    }

    public function store(Request $request)
    {
        // todo check if student has already enrolled in this diploma
        $enrollment_data = $this->validateEnrollmentRequest($request)->validate();
        $diploma_group = DiplomaGroup::findOrFail($enrollment_data['diploma_group_id']);

        $student = Student::findOrFail($enrollment_data['student_id']);

        if($this->hasStudentEnrolledInDiplomaBefore($diploma_group, $student)){
           dd('has already before');
        }

        $student->diplomas_groups()->syncWithoutDetaching($enrollment_data['diploma_group_id']);

        return redirect("diploma-enrollments");

    }

    public function destroy(Request $request)
    {
        DiplomaGroup::findOrFail($request->all()['diploma_group_id'])->students()
            ->detach($request->all()['student_id']);
        return response()->json('successfully detaching', 200);
    }

    private function validateEnrollmentRequest(Request $request)
    {
        return Validator::make($request->all(),[
            'student_id' => 'required | integer',
            'diploma_group_id' => 'required | integer',
        ]);
    }

    private function hasStudentEnrolledInDiplomaBefore($diploma_group, $student)
    {
        return $student->diplomas()->contains($diploma_group->diploma_id);
    }
}
