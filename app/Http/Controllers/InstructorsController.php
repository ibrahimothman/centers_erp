<?php

namespace App\Http\Controllers;

use App\Center;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("instructor/overview_instructor");

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
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        ]);
    }
}
