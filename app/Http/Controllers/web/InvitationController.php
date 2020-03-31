<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InvitationController extends Controller
{

    public function processInvitation(Request $request)
    {
        $invitation = Invitation::where('token', $request->token)
            ->where('accepted', 0)
            ->first();
        if($invitation){
            return view('auth.register')->with(['invitation' => $invitation]);
        }

        return abort(404, "No Invitation found");
    }
}
