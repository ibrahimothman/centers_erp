<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Diploma;
use App\DiplomaGroup;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class DiplomaEnrollmentController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Diploma::class);
        $all_diplomas = $this->center->diplomas()->with('groups.students')->get();
        $groups = DiplomaGroup::allEnrollments($this->center->diplomasIds());

        return view('diploma.diploma_student_show', compact('all_diplomas', 'groups'));
    }

    public function create()
    {

        $this->authorize('create', Diploma::class);
        $diplomas = Diploma::with('groups')->where('center_id', $this->center->id)->get();

        $selected_group = Input::has('group_id')? DiplomaGroup::findOrFail(Input::get('group_id')): new DiplomaGroup();

        return view('diploma.diploma_student_register', compact('diplomas', 'selected_group'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Diploma::class);
        // todo check if student has already enrolled in this diploma
        $enrollment_data = $this->validateEnrollmentRequest($request)->validate();
        $diploma_group = DiplomaGroup::findOrFail($enrollment_data['diploma_group_id']);

        $student = Student::findOrFail($enrollment_data['student_id']);

        if($this->hasStudentEnrolledInDiplomaBefore($diploma_group, $student)){
           return back()->with('error','This student has already enrolled in this diploma');
        }

        if ($diploma_group->getAvailableSeats() == 0){
            return back()->with('error', 'This groups has no more available chairs');
        }

        $student->diplomas_groups()->syncWithoutDetaching($enrollment_data['diploma_group_id']);

        if($request->get('next') == 'save' ){
            return redirect('diploma-enrollments');
        }

        return redirect()->back()->with('success', 'The student has successfully added to this diploma');

    }

    public function edit($student_id)
    {
        $this->authorize('update', Diploma::class);
        $current_group = DiplomaGroup::with('diploma')->findOrFail(Input::get('diploma_group'));
        $student = Student::findOrFail($student_id);

        // check if student is enrolled in this group or not before editing
        if(is_null($current_group->students()->where('student_id', $student->id)->first())){
            return abort(404);
        }

        $groups = $current_group->diploma->groups;


        return view('diploma.diploma_student_register_update', compact('current_group', 'groups', 'student'));
    }

    public function update(Request $request)
    {
        $this->authorize('update', Diploma::class);
        $student_id = $request->get('student_id');
        $prev_group_id = $request->get('prev_group_id');
        $new_diploma_group_id = $request->get('diploma_group_id');

        $student = Student::findOrFail($student_id);
        $new_diploma_group = DiplomaGroup::findOrFail($new_diploma_group_id);

        /*
         * fetch all student's groups
         * delete prev group
         * add new one
         * sync all groups to student
         * */
        $student_groups = $student->diplomas_groups;
        $student_groups->push($new_diploma_group);
        $student_groups->pull($student_groups->search(function($group) use ($prev_group_id){
            return $group->id == $prev_group_id;
        }));
//
        $student->diplomas_groups()->sync($student_groups);
        return redirect("diploma-enrollments?diploma_id=$new_diploma_group->diploma_id");
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', Diploma::class);
        DiplomaGroup::findOrFail($request->all()['group_id'])->students()
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