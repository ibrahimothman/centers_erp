<?php


namespace App\helper;


class Redirector
{
    public static function notFound($message){

        return view("errors/404")
            ->with('message',$message);
    }

}
