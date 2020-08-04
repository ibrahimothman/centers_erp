<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Student;
use App\Test;
use App\TestTake;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\File;

class TestTakeController extends Controller
{


    public function create()
    {
        //todo mvalidation
        // todo get todays test groups only
        // todo paginate

        $this->authorize('create', Test::class);

        $tests = $this->center->tests()->has('groups.enrollers')->with('groups.enrollers')->get();
        return view('testTakes/test-take')->with('tests',$tests);
    }


    public function store()
    {

        $this->authorize('create', Test::class);
        if(request()->ajax()){
            $student_id =request()->get('student_id');
            $group_id =request()->get('group_id');
            $take =request()->get('take');
        }

        Student::findOrFail($student_id)->testsEnrolling()->updateExistingPivot($group_id,array('take' => $take));

        $take==1?$message="Student take was recorded":$message="Student take was removed";
        return $message;

     }



    public function uploadImage(Request $request,$key){
        $file = Input::file($key);
        $imageName = time().'.'.$file->getClientOriginalExtension();

        return $file->move(public_path('/uploads'), $imageName);
    }

    private function getPath(File $file){
        return url("/uploads/".pathinfo($file)['basename']);
    }
}
