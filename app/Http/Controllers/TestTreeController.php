<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestTreeController extends Controller
{
    //
    public function index(){
        return view('test.create');
    }

    public function fillParent(){
        $parentTests = Test::all();

        $output = '<option value="0">Parent Test</option>';
        foreach ($parentTests as $test){
            $output .= '<option value="'.$test['id'].'">'.$test['name'].'</option>';
        }
        return $output;
    }

    public function add(Request $request)
    {
        if($request->ajax()){
            $testName = $request->get('test_name');
            $parentTest = $request->get('main_test');
            $test = new Test;
            $test->name = $testName;
            $test->description = 'test_description';
            $test->cost_ind = '1000';
            $test->cost_course = '500';
            $test->retake = 1;
            $test->parent_id = $parentTest;
            $test->save();
            return 'test added';
        }else return null;
    }

    public function fetchTree(){
        $tests = Test::all();
        foreach ($tests as $test){
            $nodes = $this->getNodes(0);
        }
        return json_encode(array_values($nodes));
    }

    public function getNodes($parentId){
        $tests = DB::table('tests')->where('parent_id',$parentId)->get();
        $output = array();
        foreach ($tests as $test) {
            $sub_array = array();
            $sub_array['text'] = $test->name;
            $sub_array['nodes'] = array_values($this->getNodes($test->id));
            $output[] = $sub_array;
        }
        return $output;
    }

}
