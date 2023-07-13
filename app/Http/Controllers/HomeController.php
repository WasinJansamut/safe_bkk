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
        $risk_points = Risk_points::get();
        $integration_finals = Cache::remember("cached_integration_final", 3600, function () {
            return Integration_final::get();
        });
        $ages = Integration_final::selectRaw('Age, count(*) as count')->whereNotNull('Age')->groupBy('Age')->orderBy('Age')->get();
        $vehicles = Integration_final::selectRaw('TypeMotor, count(*) as count')->whereNotNull('TypeMotor')->groupBy('TypeMotor')->orderBy('TypeMotor')->get();
        $count = [
            'ages' => $ages,
            'vehicles' => $vehicles,
        ];
        return view('home', compact('risk_points', 'integration_finals', 'count'));
    }
}
