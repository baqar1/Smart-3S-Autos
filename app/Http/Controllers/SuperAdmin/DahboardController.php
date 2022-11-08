<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DahboardController extends Controller
{
    public function index(){
        return view('superadmin.dashboard');
    }
    public function profile(User $superadmin){
        return view('superadmin.profile',compact('superadmin'));
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
        return redirect()->route('dashboard')->with('success','Profile updated successfully');
    }
}
