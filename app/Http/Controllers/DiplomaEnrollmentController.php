<?php

namespace App\Http\Controllers;

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
        $enrollment_data = $this->validateEnrollmentRequest($request)->validate();
        Student::findOrFail($enrollment_data['student_id'])->diplomas()
            ->syncWithoutDetaching($enrollment_data['diploma_group_id']);

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
}
