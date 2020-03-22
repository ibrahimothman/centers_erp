<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class CenterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Center $center)
    {
        $expenses = Collection::make($center->expenses);
        dd($expenses->where('id', 3));
    }

    public function store(Request $request)
    {
        $center = Auth::user()->center()->create($this->validateRequest());
        return redirect('/');
    }

    public function update(Request $request, Center $center)
    {
        $center->update($this->validateRequest());
        return redirect('settings');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'manager_name' => 'required',
            'location' => 'sometimes',
            'image' => 'sometimes | image',
            'about_manager' => 'sometimes',
            'about_center' => 'sometimes',
        ]);
    }
}
