<?php

namespace App\Http\Controllers\web;

use App\helper\RoomHelper;
use App\Http\Controllers\Controller;

use App\Center;
use App\Room;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;
use function foo\func;

class RoomsController extends Controller
{

    private $roomHelper;

    public function __construct(RoomHelper $helper)
    {
        parent::__construct();
        $this->roomHelper = $helper;
    }

    public function index()
    {

        $rooms = $this->center->rooms;
        return view('rooms/rooms_view',compact('rooms'));
    }


    public function create()
    {
        $room = new Room();
        $options = $this->center->getRoomOptions();
        return view('rooms/room_create',compact('room', 'options'));
    }


    public function store(Request $request)
    {
        $room_data = $this->validateRoomRequest();
        $room_data = $room_data->validated();
        $room_data['details'] = $this->roomHelper->setRoomDetails(Arr::except($room_data,['name','location']));
        $this->center->rooms()->create(Arr::except($room_data,['area','no_of_chairs','no_of_computers']));

        $next = $request->get('next') == 'save'? 'rooms' : 'rooms/create';
        return redirect($next)->with('success', 'Room is added successfully');


    }

    public function edit(Room $room)
    {
        $options = $this->center->getRoomOptions();
        return view('rooms/edit',compact('room', 'options'));
    }

    public function update(Request $request, Room $room)
    {
        $room_data = $this->validateRoomRequest();

         $room_data = $room_data->validated();
        $room_data['details'] = $this->roomHelper->setRoomDetails(Arr::except($room_data,['name','location']));
        if(!$request->has('extras')) {
            $room_data['extras'] = null;
        }
        $room->update(Arr::except($room_data,['area','no_of_chairs','no_of_computers']));
        return redirect("rooms");
    }

    public function destroy(Request $request, Room $room)
    {

    }



    private function validateRoomRequest(){
        return Validator::make(request()->all(),[
            'name' => 'required',
            'location' => 'required',
            'area' => 'required|integer',
            'no_of_chairs' => 'required|integer',
            'no_of_computers' => 'required|integer',
            'extras' => 'sometimes|array'
        ]);

    }

    public function getAvailableRooms()
    {
        $day = request('day');
        $begin = request('begin');
        $end = request('end');

        return $this->roomHelper->getAvailableRooms($this->center, $day, $begin, $end);
    }

    public function showRoomCalendar(Room $room)
    {
        return $this->showRoomCalendar($room);
    }

    public function allRooms()
    {
        return $this->center->rooms;
    }


}
