<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Invitation;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use mysql_xdevapi\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/students/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'invitation_token' => ['sometimes'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // if this is an invitation
        if(isset($data['invitation_token'])){

            $invitation = Invitation::with('jobs')
                ->where('token', $data['invitation_token'])
                ->where('accepted', 0)
                ->first();
            if($invitation){
                // update invitation
                $invitation->update([
                    'accepted' => 1,
                    'accepted_at' => Carbon::now()->toDateTimeString()
                ]);
                if($invitation->jobs){
                    $user->jobs()->syncWithoutDetaching($invitation->jobs);
                }


                // update employee_userID
                Employee::where('email', $invitation->email)->update(['user_id' => $user->id]);
                // delete invitation
                $invitation->delete();
            }
        }


        return $user;
    }



}
