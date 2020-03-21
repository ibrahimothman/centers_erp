<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'unique:users'],
                'email' => ['required', 'unique:users'],
                'password' => ['required'],
            ]);

        if ($validator->fails()) {
            $failedRules = $validator->failed();

            if(isset($failedRules['name']['Required'])){
                return response()->json(['message' => 'this username field is required'], 400);
            }

            if(isset($failedRules['name']['Unique'])){
                return response()->json(['message' => 'this username is already existed'], 400);
            }

            if(isset($failedRules['email']['Required'])){
                return response()->json(['message' => 'this email field is required'], 400);
            }
            if(isset($failedRules['email']['Unique'])){
                return response()->json(['message' => 'this email is already existed'], 400);
            }

            if(isset($failedRules['password']['Required'])){
                return response()->json(['message' => 'this password field is required'], 400);
            }
        }
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $credentials = request(['email','password']);

//        return response()->json($credentials);
        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'error' => true,
                'message' => 'Email or password is wrong'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    private function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
