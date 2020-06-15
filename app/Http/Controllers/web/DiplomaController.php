<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class DiplomaController extends Controller
{

    public function index()
    {
        $diplomas = $this->allDiplomas();
        return view('diploma/diploma_view_all', compact('diplomas'));
    }

    public function allDiplomas()
    {
        return Diploma::allDiplomas($this->center);
    }


    public function create()
    {
        $courses = $this->center->courses;
        return view('diploma/diploma_create', compact('courses'));
    }


    public function store(Request $request)
    {
        $diploma_data = $this->validateDiplomaData($request, '');
        if ($diploma_data->fails()){
            return response()->json($diploma_data->errors());
        }

        $diploma_courses = $diploma_data->validate()['courses'];

        $diploma = $this->center->diplomas()->create(Arr::except($diploma_data->validate(), 'courses'));

        // attach courses to diploma
        $diploma->courses()->syncWithoutDetaching($diploma_courses);
        $next = $request->get('next') == 'save' ? "diplomas/$diploma->id" : 'diplomas/create';
        return redirect($next)->with('success', 'diploma added successfully');

    }

    public function show(Diploma $diploma)
    {
        $diploma = Diploma::with('courses')->with('groups.times')->with('groups.instructor')->findOrFail($diploma->id);
        return view('diploma/diploma_details', compact('diploma'));
    }

    public function edit(Diploma $diploma)
    {

        $diploma = Diploma::with('courses')->findOrFail($diploma->id);
        $courses = $diploma->center->courses;
        return view('diploma/diploma_update', compact('diploma', 'courses'));
    }


    public function update(Request $request, Diploma $diploma)
    {
        $diploma_data = $this->validateDiplomaData($request, $diploma->id);
        if ($diploma_data->fails()){
            return response()->json($diploma_data->errors());
        }

        $diploma_courses = $diploma_data->validate()['courses'];

        $diploma->update(Arr::except($diploma_data->validate(), 'courses'));

        // attach courses to diploma
        $diploma->courses()->sync($diploma_courses);

        return redirect("diplomas/$diploma->id");
    }

    public function destroy(Diploma $diploma)
    {
        $diploma->delete();
        return response()->json(['message' => 'deleted'], 200);
    }

    private function validateDiplomaData($request, $diploma_id)
    {
        return Validator::make($request->all(),[
            'name' => 'required|unique:diplomas,name,'.$diploma_id,
            'description' => 'required',
            'cost' => 'required|integer',
            'number_of_lectures' => 'required|integer',
            'courses' => 'required|array',
            'duration' => 'required',
            'image' => 'sometimes|image',
        ]);



    }
}
