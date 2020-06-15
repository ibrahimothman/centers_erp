<?php

namespace App\Http\Controllers;


use App\Center;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $center;
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->center = Center::findOrFail(session('center_id'));
            return $next($request);
        });
    }
}
