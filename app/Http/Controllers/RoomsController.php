<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

    }


    public function create()
    {
        return view('rooms/room_create');
    }


    public function store(Request $request)
    {
        $room_data = $this->validateRoomRequest();
        $room_data['details'] = $this->setRoomDetails(Arr::except($room_data,['name','location']));
        Room::create(Arr::except($room_data,['area','no_of_chairs','no_of_computers']));
        return redirect("rooms");


    }


    public function show(Room $room)
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
        //
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
        //
    }

    private function validateRoomRequest(){
        return request()->validate([
            'name' => 'required',
            'location' => 'required',
            'area' => 'required|integer',
            'no_of_chairs' => 'required|integer',
            'no_of_computers' => 'required|integer',
        ]);

    }

    private function setRoomDetails(array $except)
    {
        $room_details['area'] = $except['area'];
        $room_details['no_of_chairs'] = $except['no_of_chairs'];
        $room_details['no_of_computers'] = $except['no_of_computers'];
        return json_encode($room_details);
    }
}
