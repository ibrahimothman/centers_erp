<?php

namespace App\Http\Controllers;

use App\Center;
use App\Room;
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
        echo json_encode($room);

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
}
