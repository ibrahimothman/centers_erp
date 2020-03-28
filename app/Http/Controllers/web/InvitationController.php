<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvitationController extends Controller
{

    public function create()
    {
        return view('invitation.create');
    }
    public function store(Request $request)
    {
       $invitation = Invitation::create($request->all());
       return view('invitation.sent', compact('invitation'));
    }

    public function processInvitation(Request $request)
    {
        $invitation = Invitation::where('token', $request->token)->first();
        if($invitation){
            $invitation->update(['accepted' => 1, 'accepted_at' => Carbon::now()->toDateTimeString()]);
            return view('auth.register')->with(['invitation' => $invitation]);
        }

        return abort(404, "No Invitation found");
    }
}
