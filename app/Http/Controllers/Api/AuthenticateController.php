<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class AuthenticateController extends Controller
{
    public function register(Request $request) {
        try {
            $validateUser = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                //'password'=>'required'
            ]);
            if ($validateUser->fails()) {
                return response()->json([
                    'status'=>false,
                    'message'=>'validation error',
                    'errors'=>$validateUser->errors(),
                ], 401);
            }
            $user = User::create([
                'name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'type'=>'user'
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'user created successfully',
                'token'=>$user->createToken('Api Token')->plainTextToken
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage()
            ], 500);

        }
    }

    public function login(Request $request) {
        try {
            $validateUser = Validator::make($request->all() , 
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if ($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password'])) ) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    
    }
}
