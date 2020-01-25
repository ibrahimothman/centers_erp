<?php

namespace App\Http\Controllers\Api;

use App\Rules\TestRule;
use App\Test;
use App\TestGroup;
use App\Http\Resources\TestGroup as TestGroupResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestGroupApiController extends Controller
{

    public function index()
    {
        $groups = new Collection();
        $tests = Collection::make(Auth::user()->center->tests);
        $tests->each(function ($test) use ($groups){
           $groups->push(TestGroup::allGroups($test));
        });

        return TestGroupResource::collection(collect($groups)->collapse());
    }

    public function store(Request $request)
    {
        $group_data = $this->validateRequest($request,'');
        if($group_data->fails()){
            return response()->json($group_data->errors(), 400);
        }

        return new TestGroupResource(TestGroup::create($group_data->validate()));
    }

    public function show(TestGroup $group){
        return new TestGroupResource($group);
    }

    private function validateRequest(Request $request, $group_id)
    {
        return Validator::make($request->all(),[
            'test_id' => ['required','integer', new TestRule],
            'group_date' => 'required|date',
            'available_chairs' => 'required|integer',
        ]);
    }
}
