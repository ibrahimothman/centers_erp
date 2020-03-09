<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Input;
use mysql_xdevapi\Session;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $center = Center::findOrFail(Session('center_id'));
        $instructors = Instructor::allInstructors($center);
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

        $instructor=Instructor::create(Arr::except($data,['state','city','address']));
        $instructor->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        $center->instructors()->syncWithoutDetaching($instructor);
        return redirect('instructors/'.$instructor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
//        return json_encode($instructor);

        return view('instructor/overview_instructor')
            ->with('instructor',$instructor);

    }


    public function edit(Instructor $instructor)
    {
        return view("instructor/update_instructor", compact('instructor'));
    }


    public function update(Request $request, Instructor $instructor)
    {
        $data = $this->validateRequest('');


        $instructor->update(Arr::except($data,['state','city','address']));
        $instructor->address()->update([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        return redirect('instructors/'.$instructor->id);
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

    public function showInstructorCalendar(Instructor $instructor){
        $groups = [];
        foreach ($instructor->courses as $course){
            foreach ($course->groups as $group){
                foreach ($group->times as $time){
                    $temp['title'] = $course->name;
                    $temp['start'] = $time->day;
                    $temp['end'] = $time->day;
                    $groups[] = $temp;
                }
            }
        }

        return json_encode($groups);
    }

    public function calendar()
    {
        return view('instructor/calendar');

    }

    public function allInstructors()
    {
        $center = Center::findOrFail(Session('center_id'));
        return $center->instructors;
    }
}
