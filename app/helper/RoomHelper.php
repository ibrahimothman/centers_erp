<?php


namespace App\helper;


use App\Room;
use App\Time;

class RoomHelper
{

    public function setRoomDetails(array $except)
    {
        $room_details['area'] = $except['area'];
        $room_details['no_of_chairs'] = $except['no_of_chairs'];
        $room_details['no_of_computers'] = $except['no_of_computers'];
        return json_encode($room_details);
    }


    // get available rooms in this time
    public function getAvailableRooms($center, $day, $begin, $end)
    {

        $time = Time::where('day', $day)->where('begin', $begin)->where('end', $end)->first();

        $rooms = $center->rooms()->whereDoesnthave('times', function ($q) use ($time, $begin, $day, $end) {
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




}