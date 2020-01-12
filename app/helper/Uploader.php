<?php


namespace App\helper;


use Illuminate\Support\Str;

class Uploader
{
    public static $public_path='/uploads/profiles/';

    public static function uploadImage($image,$dir){
        if(! is_dir(public_path('/uploads/profiles'))){
            mkdir(public_path('/uploads/profiles'));
        }
        $basename = Str::random();
        $original = $basename.'.'.$image->getClientOriginalExtension();
        $image->move($dir, $original);
        return self::getPath($dir,$original);
    }

    private static function getPath($dir,$original){
        if ($dir===self::$public_path){
            return public_path("/uploads/profiles/".$original);
        }
    }

}
