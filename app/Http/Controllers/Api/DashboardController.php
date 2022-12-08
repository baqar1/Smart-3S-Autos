<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Smart;
use App\Models\SpareParts;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        dd('hello');
    }
    public function getDealers(){
        $dealers = User::where('type','dealer')->latest()->get();
        return response()->json([
            'status'=>true,
            'dealers'=>$dealers,
        ]);
    }

    public function getVehicles(){
        $vehicles = Smart::where('type',3)->latest()->get();
        return response()->json([
            'status'=>true,
            'vehicles'=>$vehicles,
        ]);
    }

    public function getServices(){
        $services = Smart::where('type',1)->latest()->get();
        return response()->json([
            'status'=>true,
            'services'=>$services,
        ]);
    }
    public function getSpareParts(){
        $spareParts = Smart::where('type',2)->latest()->get();
        return response()->json([
            'status'=>true,
            'spareParts'=>$spareParts,
        ]);
    }
}
