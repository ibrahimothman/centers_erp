<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\PaymentModel;
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
        $payment_models = Center::findOrFail(Session('center_id'))->paymentModels;
        return view('instructor/register_instructor', compact('payment_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $data = $this->validateRequest('');

        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));
//        PaymentModel::findOrFail($data['payment_model'])->instructors()->create(Arr::except($data,['payment_model', 'state','city','address']));
        $instructor=Instructor::create(Arr::except($data,['state','city','address']));
        $instructor->address()->create([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        $center->instructors()->syncWithoutDetaching($instructor);
        return redirect('instructors/'.$instructor->id);
    }


    public function show(Instructor $instructor)
    {
        $courses = $instructor->courses()->where('center_id', Session('center_id'))->get();
        return view('instructor/overview_instructor', compact('instructor', 'courses'));

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
            'payment_model' => ['required', 'integer'],
            'payment_model_meta_data' => ['required', 'array'],
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
