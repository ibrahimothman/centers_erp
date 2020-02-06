<?php

namespace App\Http\Controllers;

use App\Center;
use App\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class DiplomaController extends Controller
{
    private $center;
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $diplomas = $center->diplomas;
        return view('diploma/diploma_view_all', compact('diplomas'));
    }


    public function create()
    {
        $center = Center::findOrFail(Session('center_id'));
        $courses = $center->courses;
        return view('diploma/diploma_create', compact('courses'));
    }


    public function store(Request $request)
    {
        $diploma_data = $this->validateDiplomaData($request, '');
        if ($diploma_data->fails()){
            return response()->json($diploma_data->errors());
        }

        $diploma_courses = $diploma_data->validate()['courses'];

        $center = Center::findOrFail(Session('center_id'));
        $diploma = $center->diplomas()->create(Arr::except($diploma_data->validate(), 'courses'));

        // attach courses to diploma
        $diploma->courses()->syncWithoutDetaching($diploma_courses);

        return redirect('diplomas');

    }

    public function show(Diploma $diploma)
    {
        return view('diploma/diploma_details');
    }

    public function edit(Diploma $diploma)
    {
        return view('diploma/diploma_update');
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
            'image' => 'required|image',
        ]);



    }
}
