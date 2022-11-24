<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SpareParts;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        dd('hello');
    }
    public function dealers(){
        $dealers = User::where('type','dealer')->latest()->get();
        return response()->json([
            'status'=>true,
            'dealers'=>$dealers,
        ]);
    }

    public function services(){
        $services = Service::latest()->get();
        return response()->json([
            'status'=>true,
            'services'=>$services,
        ]);
    }
    public function spareParts(){
        $spareParts = SpareParts::latest()->get();
        return response()->json([
            'status'=>true,
            'spareParts'=>$spareParts,
        ]);
    }
}
