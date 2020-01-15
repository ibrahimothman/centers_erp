<?php

namespace App\Http\Controllers;

use App\Center;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Input::has('search')) {
            $queryString=Input::get('search');
            $instructors=Instructor::where('nameAr','like','%'.$queryString.'%')->paginate(5);

            return view("instructor/view_all_instructors")
                ->with('instructors',$instructors);
        }

        $instructors=Instructor::paginate(5);
        return view("instructor/view_all_instructors")
            ->with('instructors',$instructors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor/register_instructor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validateRequest('');

        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));

        $instructor=Instructor::create(array_except($data,['state','city','address']));
        $instructor->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        $center->instructors()->syncWithoutDetaching($instructor);
        return redirect('/instructor/'.$instructor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor=Instructor::find($id);

        return view('instructor/overview_instructor')
            ->with('instructor',$instructor);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("instructor/update_instructor");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function searchInstructors(Request $request){


        return view("instructor/view_all_instructors");
    }

    private function validateRequest($user_id)
    {
        return request()->validate([
            'nameAr' => 'required',
            'nameEn' => 'required',
            'email' => 'required',
            'idNumber' => 'required|digits:14',
            'image' => ' nullable|image|file | max:10000',
            'idImage' => 'nullable|image|file | max:10000',
            'phoneNumber' => 'required|regex:/(01)[0-9]{9}/',
            'phoneNumberSec' => 'nullable|regex:/(01)[0-9]{9}/',
            'passportNumber' => 'sometimes',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'bio' => 'nullable',
        ]);
    }
}
