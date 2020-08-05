<?php

namespace App\Http\Controllers\web;

use App\Address;
use App\City;
use App\Http\Controllers\Controller;

use App\Center;
use App\Instructor;
use App\PaymentModel;
use App\repository\InstructorRepository;
use App\Room;
use App\Rules\UniquePerCenter;
use App\State;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class InstructorsController extends Controller
{

    public function index()
    {

        $this->authorize('viewAny', Instructor::class);
        return view("instructor/view_all_instructors")
            ->with('instructors',$this->searchInstructors());

    }

    public function searchInstructors()
    {
        return Instructor::allInstructors($this->center);
    }


    public function create()
    {
        $this->authorize('create', Instructor::class);
        $payment_models = PaymentModel::all();
        $address = new Address();
        return view('instructor/register_instructor', compact('payment_models', 'address'));
    }


    public function store(Request $request)
    {
        $this->authorize('create', Instructor::class);

        $data = $this->validateRequest($request);

        $data = $data->validate();

        // fetch center from session

        $instructor = Instructor::create(Arr::except($data,['state','city','address']));

        // attach student with center
        $instructor->address()->create([
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
        ]);

        $this->center->instructors()->syncWithoutDetaching($instructor);
        $next = $request->get('next') == 'save' ? "instructors/$instructor->id": 'instructors/create';

        return redirect($next)->with('success', 'The instructor is added successfully');


    }


    public function show(Instructor $instructor)
    {
        $this->authorize('view', $instructor);
        $courses = $instructor->courses()->where('center_id', Session('center_id'))->get();
        return view('instructor/overview_instructor', compact('instructor', 'courses'));

    }


    public function edit(Instructor $instructor)
    {
        $this->authorize('update', $instructor);
        $payment_models = $this->center->paymentModels;
        return view("instructor/update_instructor", compact('instructor', 'payment_models'));
    }


    public function update(Request $request, Instructor $instructor)
    {
        $this->authorize('update', $instructor);
        $data = $this->validateRequest($request);

        $data = $data->validate();
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
        $this->authorize('delete', $instructor);
        $instructor->delete();
        return response()->json('instructor deleted successfully', 200);
    }



    private function validateRequest(Request $request)
    {

        return Validator::make($request->all(), Instructor::rules($request));
    }

    public function showInstructorCalendar(Instructor $instructor){
        $groups = [];
         foreach ($instructor->diplomaGroups as $group){
             foreach ($group->times as $time){
                 $temp['title'] = $group->diploma->name;
                 $temp['start'] = $time->day;
                 $temp['end'] = $time->day;
                 $groups[] = $temp;
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
        return $this->center->instructors;
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
