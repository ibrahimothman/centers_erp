<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'userName' => ['required'],
                'email' => ['required', 'unique:users'],
                'password' => ['required'],
            ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        User::create([
            'name' => $input['userName'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        return response()->json([
            'error'=>false,
            'message'=>'Now you have an account',
        ], 200);
    }
}
