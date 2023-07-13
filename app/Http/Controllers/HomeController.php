<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk_points;
use App\Models\Integration_final;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function risk_point()
    {
        $risk_points = Risk_points::orderBy('remark')->get();
        $integration_finals = Cache::remember("cached_integration_final", 3600, function () {
            return Integration_final::get();
        });
        $ages = Cache::remember("cached_integration_final_age", 3600, function () {
            return Integration_final::selectRaw('Age, count(*) as count')
                ->whereNotNull('Age')
                ->groupBy('Age')
                ->orderBy('Age')
                ->get();
        });
        $times = Cache::remember("cached_integration_final_time", 3600, function () {
            return Integration_final::selectRaw('TimeRec, count(*) as count')
                ->whereNotNull('TimeRec')
                ->groupBy('TimeRec')
                ->orderBy('TimeRec')
                ->get();
        });
        $vehicles = Cache::remember("cached_integration_final_vehicle", 3600, function () {
            return Integration_final::selectRaw('TypeMotor, count(*) as count')
                ->whereNotNull('TypeMotor')
                ->groupBy('TypeMotor')
                ->orderBy('TypeMotor')
                ->get();
        });
        $count = [
            'ages' => $ages,
            'times' => $times,
            'vehicles' => $vehicles,
        ];
        return view('risk_point', compact('risk_points', 'integration_finals', 'count'));
    }

    public function working_group()
    {
        return view('working_group');
    }
}
