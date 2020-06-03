<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\PaymentModel;
use App\repository\InstructorRepository;
use App\Room;
use App\Rules\UniquePerCenter;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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

        return view("instructor/view_all_instructors")
            ->with('instructors',$this->searchInstructors());

    }

    public function searchInstructors()
    {
        $center = Center::findOrFail(Session('center_id'));
        return Instructor::allInstructors($center);
    }

//    public function getInstructorPayment()
//    {
//
//    }

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
        $data = $this->validateRequest($request);
//        if($data->fails()){
//            dd($data->errors()->messages());
//        }

        $data = $data->validate();

        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));

        $instructor = Instructor::create(Arr::except($data,['state','city','address']));
        // attach student with center
        $instructor->address()->create([
            'state' => $request->all()['state'],
            'city' => $request->all()['city'],
            'address' => $request->all()['address'],
        ]);

        $center->instructors()->syncWithoutDetaching($instructor);
        $next = $request->get('next') == 'save' ? "instructors/$instructor->id": 'instructors/create';

        return redirect($next)->with('success', 'The instructor is added successfully');


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
        $data = $this->validateRequest($request);


        $instructor->update(Arr::except($data,['state','city','address']));
        $instructor->address()->update([
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);

        return redirect('instructors/'.$instructor->id);
    }


    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return response()->json('instructor deleted successfully', 200);
    }



    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(),[
            'nameAr' => ['required', new UniquePerCenter(Instructor::class, '','instructors',false)],
            'nameEn' =>['required', new UniquePerCenter(Instructor::class, '','instructors',false)] ,
            'email' =>['required', new UniquePerCenter(Instructor::class, '','instructors',false)],
            'idNumber' => ['required','digits:14',new UniquePerCenter(Instructor::class, '','instructors',false)],
            'image' => ' nullable|image|file | max:10000',
            'idImage' => 'nullable|image|file | max:10000',
            'phoneNumber' => ['required','regex:/(01)[0-9]{9}/', new UniquePerCenter(Instructor::class, '','instructors',false)],
            'phoneNumberSec' => ['nullable','regex:/(01)[0-9]{9}/',new UniquePerCenter(Instructor::class, '','instructors',false)],
            'passportNumber' => ['sometimes',new UniquePerCenter(Instructor::class, '','instructors',false)],
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

    public function getAvailableBegins()
    {
        if(request()->ajax()){
            $instructor_id = request('instructor_id');
            $day = request('day');
            return InstructorRepository::getInstance()->getAvailableBegins($instructor_id, $day);
        }

        return null;

    }

    public function getAvailableEnds()
    {
        if(request()->ajax()){
            $instructor_id = request('instructor_id');
            $day_id = request('day');
            $begin_id = request('begin');
            return InstructorRepository::getInstance()->getAvailableEnds($instructor_id, $day_id, $begin_id);
        }

        return null;

    }
}
