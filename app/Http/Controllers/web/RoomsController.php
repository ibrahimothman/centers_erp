<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Room;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use mysql_xdevapi\Session;
use function foo\func;

class RoomsController extends Controller
{
    private $center;

    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $rooms = $center->rooms;
        return view('rooms/rooms_view',compact('rooms'));
    }


    public function create()
    {
        $room = new Room();
        return view('rooms/room_create',compact('room'));
    }


    public function store(Request $request)
    {
        $center = Center::findOrFail(Session('center_id'));
        $room_data = $this->validateRoomRequest();
        $room_data['details'] = $this->setRoomDetails(Arr::except($room_data,['name','location']));
        if($request->has('extras')) {
            $room_data['extras'] = $this->setRoomExtras($room_data['extras']);
        }
        $center->rooms()->create(Arr::except($room_data,['area','no_of_chairs','no_of_computers']));
        return redirect("rooms");


    }


    public function show(Room $room)
    {

    }


    public function edit(Room $room)
    {
        return view('rooms/edit',compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $room_data = $this->validateRoomRequest();
        $room_data['details'] = $this->setRoomDetails(Arr::except($room_data,['name','location']));
        if($request->has('extras')) {
            $room_data['extras'] = $this->setRoomExtras($room_data['extras']);
        }else $room_data['extras'] = null;
        $room->update(Arr::except($room_data,['area','no_of_chairs','no_of_computers']));
        return redirect("rooms");
    }


    public function destroy($id)
    {
        //
    }

    private function validateRoomRequest(){
        return request()->validate([
            'name' => 'required',
            'location' => 'required',
            'area' => 'required|integer',
            'no_of_chairs' => 'required|integer',
            'no_of_computers' => 'required|integer',
            'extras' => 'sometimes|array'
        ]);

    }

    private function setRoomDetails(array $except)
    {
        $room_details['area'] = $except['area'];
        $room_details['no_of_chairs'] = $except['no_of_chairs'];
        $room_details['no_of_computers'] = $except['no_of_computers'];
        return json_encode($room_details);
    }

    private function setRoomExtras(array $extras)
    {
        return json_encode($extras);
    }


    public function getAvailableRooms()
    {
        if(request()->ajax()){
            $day= request('day');
            $begin = request('begin');
            $end = request('end');
        }
        $time = Time::where('day', $day)->where('begin', $begin)->where('end', $end)->first();

        $rooms = Center::findOrFail(Session('center_id'))->rooms()->whereDoesnthave('times', function ($q) use ($time, $begin, $day, $end) {
            $q->where('time_id', is_null($time)? 0 : $time->id)
                ->orWhere(function ($q) use ($day, $begin, $end){
                $q->where('day',$day)
                    ->where('begin' , '>=', $begin)
                    ->where('begin' , '<', $end);
            })->orWhere(function ($q) use($day, $begin, $end){
                $q->where('day',$day)
                    ->where('begin' , '<=', $begin)
                    ->where('end' , '>', $begin);
            });
        })->get();
        return $rooms;


    }

    public function showRoomCalendar(Room $room){
        $groups = [];
        foreach ($room->course_groups as $course_group){
            foreach ($course_group->times as $time){
                $temp['title'] = $course_group->course->name;
                $temp['start'] = $time->day;
                $temp['end'] = $time->day;
                $groups[] = $temp;

            }
        }
        return response()->json($groups);
    }


    public function allRooms()
    {
        $center = Center::findOrFail(Session('center_id'));
        return $center->rooms;
    }


}
