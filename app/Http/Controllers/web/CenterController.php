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
    public function store(Request $request)
    {
        $center = Auth::user()->center()->create($this->validateRequest());
        return redirect('/');
    }

    public function update(Request $request, Center $center)
    {
        $data = $this->validateRequest();
        $center->update(array_except($data, ['source']));
        if (isset($data['source']) && $data['source'] == 'api'){
            return response()->json("successfully added", 200);
        }
        return back()->with('success', 'successfully updated');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'sometimes',
            'manager_name' => 'sometimes',
            'location' => 'sometimes',
            'image' => 'sometimes | image',
            'about_manager' => 'sometimes',
            'about_center' => 'sometimes',
            'options' => 'sometimes',
            'source' => 'sometimes',
        ]);
    }

    public function options()
    {
        $options = $this->center->getRoomOptionsAsString();

        return view('options/room', compact('options'));
    }
}
