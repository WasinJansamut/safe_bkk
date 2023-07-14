<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk_points;
use App\Models\Integration_final;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function risk_point()
    {
        $risk_points = Risk_points::orderBy('remark')->get();
        $integration_finals = Cache::remember("cached_integration_final", 3600, function () {
            return Integration_final::get();
        });

        // Cache::forget('cached_integration_final_age');
        $ages = Cache::remember("cached_integration_final_age", 3600, function () {
            // return Integration_final::selectRaw('Age, count(*) as count')
            //     ->whereNotNull('Age')
            //     ->groupBy('Age')
            //     ->orderBy('Age')
            //     ->get();
            return Integration_final::select(DB::raw('
                    CASE
                        WHEN age >= 0 AND age <= 5 THEN "0-5"
                        WHEN age >= 6 AND age <= 10 THEN "6-10"
                        WHEN age >= 11 AND age <= 15 THEN "11-15"
                        WHEN age >= 16 AND age <= 20 THEN "16-20"
                        WHEN age >= 21 AND age <= 25 THEN "21-25"
                        WHEN age >= 26 AND age <= 30 THEN "26-30"
                        WHEN age >= 31 AND age <= 35 THEN "31-35"
                        WHEN age >= 36 AND age <= 40 THEN "36-40"
                        WHEN age >= 41 AND age <= 45 THEN "41-45"
                        WHEN age >= 46 AND age <= 50 THEN "46-50"
                        WHEN age >= 51 AND age <= 55 THEN "51-55"
                        WHEN age >= 56 AND age <= 60 THEN "56-60"
                        WHEN age >= 61 AND age <= 65 THEN "61-65"
                        WHEN age >= 66 AND age <= 70 THEN "66-70"
                        WHEN age >= 71 AND age <= 75 THEN "71-75"
                        WHEN age >= 76 AND age <= 80 THEN "76-80"
                        WHEN age >= 81 AND age <= 85 THEN "81-85"
                        WHEN age >= 86 AND age <= 90 THEN "86-90"
                        WHEN age >= 91 AND age <= 95 THEN "91-95"
                        WHEN age >= 96 AND age <= 100 THEN "96-100"
                        ELSE "อื่นๆ"
                    END AS label,
                    COUNT(*) AS count
                '))
                ->groupBy('label')
                ->get();
        });
        $times = Cache::remember("cached_integration_final_time", 3600, function () {
            return Integration_final::selectRaw('TimeRec, count(*) as count')
                ->whereNotNull('TimeRec')
                ->groupBy('TimeRec')
                ->orderBy('TimeRec')
                ->get();
        });
        Cache::forget('cached_integration_final_vehicle');
        $vehicles = Cache::remember("cached_integration_final_vehicle", 3600, function () {
            // return Integration_final::selectRaw('TypeMotor, count(*) as count')
            //     ->whereNotNull('TypeMotor')
            //     ->groupBy('TypeMotor')
            //     ->orderBy('TypeMotor')
            //     ->get();
            return Integration_final::select(DB::raw('
                    CASE
                        WHEN TypeMotor LIKE "%รถจักรยานยนต์%" THEN "รถจักรยานยนต์"
                        WHEN TypeMotor LIKE "%รถบรรทุกส่วนบุคคล%" THEN "รถบรรทุกส่วนบุคคล"
                        WHEN TypeMotor LIKE "%รถพ่วง%" THEN "รถพ่วง"
                        WHEN TypeMotor LIKE "%รถยนต์บรรทุก%" THEN "รถยนต์บรรทุก"
                        WHEN TypeMotor LIKE "%รถยนต์ส่วนบุคคล%" THEN "รถยนต์ส่วนบุคคล"
                        WHEN TypeMotor LIKE "%รถยนต์โดยสาร%" THEN "รถยนต์โดยสาร"
                        WHEN TypeMotor LIKE "%รถสามล้อ%" THEN "รถสามล้อ"
                        WHEN TypeMotor LIKE "%รถแทรกเตอร์%" THEN "รถแทรกเตอร์"
                        WHEN TypeMotor LIKE "%หัวรถลากจูง%" THEN "หัวรถลากจูง"
                        ELSE "อื่นๆ"
                    END AS label,
                    COUNT(*) AS count
                '))
                ->groupBy('label')
                ->orderBy('count', 'DESC')
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
