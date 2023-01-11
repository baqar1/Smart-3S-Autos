<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DahboardController extends Controller
{
    public function index(){
         
        return view('superadmin.dashboard');
        // if(Auth::user()->type=='super-admin'){
        //     return view('superadmin.dashboard');
        // }
        // else{
        //     if(Auth::user()->status=='0'){
        //         Auth::guard('web')->logout();

        //         $request->session()->invalidate();

        //         $request->session()->regenerateToken();
        //         return redirect()->back()->with('message','Dealer not active');
        //     }
        //     else{
        //         return view('dealers.dashboard');
        //     }
            
        // }
        
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

    public function showAdminSetting(){
        $setting = AdminSetting::first();
        return view('superadmin.setting', compact('setting'));
    }
    public function updateAdminSetting(Request $request){
        $request->validate([
            'service_commision' => 'numeric|between:0,99.99',
            'spareparts_commision' => 'numeric|between:0,99.99',
            'vehicles_commision' => 'numeric|between:0,99.99',
        ]);
        if(Auth::user()->type=='super-admin'){
            $admin = AdminSetting::first();
            $admin->update([
                'service_commision'=>$request->service_commision,
                'spareparts_commision'=>$request->spareparts_commision,
                'vehicles_commision'=>$request->vehicles_commision,

            ]);
            return redirect()->route('show.admin.setting')->with('success','Setting updated successfully');

        }
        else{
            return redirect()->route('show.admin.setting')->with('error','You have no permission to update');
        }
    }
}
