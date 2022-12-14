<?php

namespace App\Http\Controllers\Dealers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DahboardController extends Controller
{
    public function index(){
        return view('dealers.dashboard');

    }
    public function profile(User $dealer){
        return view('dealers.profile',compact('dealer'));
    }

    public function profileUpdate(User $superadmin,Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $superadmin->update([
            'name'=>$request->name,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('dealers.dashboard')->with('success','Profile updated successfully');
    }
}
