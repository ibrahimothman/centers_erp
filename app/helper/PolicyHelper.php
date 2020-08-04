<?php


namespace App\helper;


use Illuminate\Support\Facades\Auth;

class PolicyHelper
{
    public static function checkPolicyFromRoute($link)
    {
        $items = explode('/', $link);
        $last = $items[count($items) -1 ];
        return $last == 'create' ? ['create'] : ['view', 'viewAny', 'update'];
    }

    public static function checkPolicy($can, $on)
    {
        return Auth::user()->can($can, $on)? 1 : 0;
    }
}
