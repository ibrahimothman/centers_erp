<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class settingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfileSettings(){
        $center = Auth::user()->center;
        return view('settings/profile')
            ->with('center',$center);
    }

    public function updateProfileSettings(Request $request){
//        $center=new Center();
//        //DB::table('centers')
//            where
        Auth::user()->center->update(
            [
                'name'=>$request->input('centerName'),
                'manager_name'=>$request->input('ManagerName')
            ]);

        return redirect('settings/profile');
    }

    public function instructorSettings(){
        return view("instructor/setting_instructor");
    }
    public function instructorPassReset(){
        return view("instructor/change_password_instructor");
    }
}
