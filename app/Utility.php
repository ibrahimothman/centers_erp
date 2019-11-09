<?php

namespace App;

class Utility {

    public static function getDate($dateTime)
    {
        return substr($dateTime, 0, 10);
    }
    public function getTime($dateTime)
    {
        return substr($dateTime, 11, 5);

    }

   public function getCurrentDay(){
       date_default_timezone_set('Africa/Cairo');
       return date('y-m-d');

   }

    public function datePassed($expireDate,$expireTime){
        date_default_timezone_set('Africa/Cairo');
        $todayDate=date('y-m-d');
        $todayTime=date("H:i:s");

        $todayTime=substr($todayTime, 0, 4);
        $today_date = strtotime($todayDate);
        $expire_date = strtotime($expireDate);

        $todayTime = strtotime($todayTime);
        $expireTime = strtotime($expireTime);

        if ($expire_date<$today_date){
            return true;
        }
        else{
            if ($expire_date==$today_date&&$expireTime<$todayTime){
                return true;
            } else{
                return false;
            }
        }


    }

    private function timePassed($pastTime,$currentTime){
        echo $pastTime.'----------' .$currentTime;
        $pastHour=substr($pastTime, 0, 2);
        $currentHour=substr($currentTime, 0, 2);
        $pastMinute=substr($pastTime, 2, 2);
        $currentMinute=substr($currentTime, 2, 2);

        //echo $currentHour.':'.$currentMinute.' ------ '.$pastHour.':'.$pastMinute;

        if ($pastHour<$currentHour){
            return true;
        }else{
            return $pastHour==$currentHour&&$pastMinute<$currentMinute;
        }
    }



}

?>
