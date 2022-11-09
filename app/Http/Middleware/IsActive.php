<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->type=='dealer'){
            if(Auth::user()->status=='0'){
                Auth::guard('web')->logout();
    
                $request->session()->invalidate();
    
                $request->session()->regenerateToken();
                return redirect()->back()->with('message','Dealer not active');
            }
            else{
                return $next($request);
            }

        }
        else{
            
            return redirect()->back()->with('message','Credentials do not match for dealer');
        }
        
        
    }
}
