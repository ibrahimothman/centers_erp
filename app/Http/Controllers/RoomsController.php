<?php

namespace App\Http\Controllers;

use App\Center;
use App\Room;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use mysql_xdevapi\Session;

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
//        $this->getAvailableTimes(2,2);

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

    public function getAvailableBegins()
    {
        if(request()->ajax()){
            $room_id = request('room_id');
            $day_id = request('day_id');
        }
        $begin = Time::hours();
        $room = Room::findOrFail($room_id);
        foreach($room->times->where('day', $day_id) as $time){
            for ($i = $time->begin; $i < $time->end; $i++){
                $begin= Arr::except($begin,$i);
            }
        }

        return $begin;

    }

    public function getAvailableEnds()
    {
        if(request()->ajax()){
            $room_id = request('room_id');
            $day_id = request('day_id');
            $begin_id = request('begin_id');
        }
        $end = Time::hours();
        $room = Room::findOrFail($room_id);

        // Except all times before the time at which you begin
        for ($k = 7; $k <= $begin_id; $k++) {
            $end = Arr::except($end, $k);
        }
        foreach ($room->times->where('day', $day_id) as $time) {
            if ($begin_id < $time->begin) {
                for ($i = $time->begin + 1; $i <= 24; $i++) {
                    $end = Arr::except($end, $i);
                }
            } else {
                for ($j = $begin_id; $j >= 7; $j--) {
                    $end = Arr::except($end, $j);
                }
            }

        }


        return $end;

    }


}
