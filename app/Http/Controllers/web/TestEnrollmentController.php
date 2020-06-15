<?php

namespace App\Http\Controllers\web;

use App\DiplomaGroup;
use App\Http\Controllers\Controller;

use App\Center;
use App\Policies\TestEnrollmentPolicy;
use App\TestGroup;
use App\Utility;
use Illuminate\Http\Request;
use App\Student;
use App\Test;
use App\StudentTestGroup;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;


class TestEnrollmentController extends Controller
{


    public function index()
    {
        $this->authorize('view', Test::class);
        $all_tests = $this->center->tests()->with('groups.enrollers')->get();

        $groups = TestGroup::allEnrollments($this->center->testsIds());




        return view('testEnrollments.index',compact('all_tests', 'groups'));
    }

    public function create()
    {
        $this->authorize('create', Test::class);
        $students = $this->center->students;
        $tests = Test::allTests($this->center);


         $selected_group = Input::has('group_id') ?
             TestGroup::with('times')->findOrFail(Input::get('group_id')): new TestGroup();

//        return json_encode($tests);

        return view('testEnrollments.create')
            ->with('students',$students)
            ->with('selected_group',$selected_group)
            ->with('tests',$tests);
    }


    public function store()
    {
        $this->authorize('create', Test::class);
        if(request()->ajax()){
            $stu_id = request()->get('stu_id');
            $test_id = request()->get('test_id');
            $group_id = request()->get('group_id');
        }

        if(! $this->IsGroupOpened($group_id)){
            return response()->json('this groups is closed', 200);
        }

        if($this->checkTestEnrollmentValidation($stu_id,$test_id)){
            return response()->json('student has already enrolled in this test', 200);
        }

        Student::findOrFail($stu_id)->testsEnrolling()->syncWithoutDetaching($group_id);
        return response()->json('student has successfully enrolled in this test', 200);



    }

    // check if a students has already enrolled in a test or not
    public function checkTestEnrollmentValidation($stu_name, $test_id){
        $groups =  Test::findOrFail($test_id)->groups;
        foreach ($groups as $group){
            if($group->enrollers->contains($stu_name)){
                return true;
            }

        }
        return false;
    }





    public function getTestEnrollments()
    {

        if(request()->ajax()){
            $test_id = request()->get('test_id');
        }

        // todo determine center
        $this->center = Center::findOrFail(Session('center_id'));
        $test = $this->center->tests()->with('groups.enrollers')->with('statement')->findOrFail($test_id);

        return $test ;

    }


    public function edit($student_id)
    {
        if(! Center::findOrFail(Session('center_id'))->students->contains($student_id)){
            return abort(404);
        }
        $this->authorize('update', Test::class);
        $current_group = TestGroup::with('test')->findOrFail(Input::get('test_group'));
        $student = Student::findOrFail($student_id);

        // check if student is enrolled in this group or not before editing
        if(is_null($current_group->enrollers()->where('student_id', $student->id)->first())){
            return abort(404);
        }

        $groups = $current_group->test->groups;


        return view('testEnrollments.edit', compact('current_group', 'groups', 'student'));
    }


    public function update(Request $request, $student_id)
    {
        $this->authorize('update', Test::class);
        if(request()->ajax()){
            $new_group_id = request()->get('new_group_id');
            $prev_group_id = request()->get('prev_group_id');
        }



        if($new_group_id != $prev_group_id) {
            if(! $this->IsGroupOpened($new_group_id)){
                return response()->json('this group is closed', 200);
            }
            $student = Student::findOrFail($student_id);
            $new_test_group = TestGroup::findOrFail($new_group_id);

            /*
             * fetch all student's groups
             * delete prev group
             * add new one
             * sync all groups to student
             * */
            $student_groups = $student->testsEnrolling;
            $student_groups->push($new_test_group);
            $student_groups->pull($student_groups->search(function($group) use ($prev_group_id){
                return $group->id == $prev_group_id;
            }));

//
            $student->testsEnrolling()->sync($student_groups);
            return response()->json('enrollment has successfully updated', 200);
        }

        else{
            return response()->json('enrollment has successfully updated', 200);
        }


    }


    public function destroy(Request $request)
    {
        $this->authorize('delete', Test::class);
        TestGroup::findOrFail($request->all()['test_group_id'])->enrollers()
            ->detach($request->all()['student_id']);
        return response()->json('successfully detaching', 200);
    }


//
    private function IsGroupOpened($group_id)
    {
        $group = TestGroup::findOrFail($group_id);
        if (! Utility::datePassed($group->times[0]->day, $group->times[0]->begin)){
            if ($group->available_seats > 0 ){
                return true;
            }
        }

        return false;
    }
}

