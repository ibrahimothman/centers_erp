<?php


namespace App\Http\Controllers\Api;


use App\Center;
use App\Http\Controllers\Controller;
use App\Http\Resources\Test as TestResource;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestApiController extends Controller
{
    public function index(){
        return TestResource::collection(Test::allTests(Auth::user()->center));
    }

    public function store(Request $request){

        $test_date = $this->validateRequest($request,'');
        if($test_date->fails()){
            return response()->json($test_date->errors(), 400);
        }

        $test = Auth::user()->center->tests()->create($test_date->validate());
        $test = $this->setRetake($test);

        return new TestResource($test);
    }

    public function show(Test $test)
    {
        $this->authorize('view', $test);
        return new TestResource($test);
    }

    public function update(Request $request, Test $test){
        $test->update($this->validateRequest($request, $test->id)->validate());
        $this->setRetake($test);
        return new TestResource($test);
    }

    public function destroy(Test $test){
        $this->authorize('view', $test);
        $test->delete();
        return response()->json(['message' => 'The test has successfully deleted']);
    }

    private function validateRequest(Request $request, $test_id)
    {
        return Validator::make($request->all(),[
            'name' => 'required|unique:tests,name,'.$test_id,
            'description' => 'required',
            'cost' => 'required|integer',
            'cost_course' => 'required|integer',

        ]);
    }


    private function setRetake($test)
    {
        if(request()->has('retake')){
            $test->update(['retake' => 1]);
        }else{
            $test->update(['retake' => 0]);
        }
        return Test::find($test->id);
    }



}
