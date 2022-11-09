<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DahboardController extends Controller
{
    public function index(Request $request){
        if(Auth::user()->type=='super-admin'){
            return view('superadmin.dashboard');
        }
        else{
            if(Auth::user()->status=='0'){
                Auth::guard('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();
                return redirect()->back()->with('message','Dealer not active');
            }
            else{
                return view('dealers.dashboard');
            }
            
        }
        
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
