<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk_points;
use App\Models\Integration_final;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function risk_point(Request $request)
    {
        $id_risk_point = $request->id;
        $risk_points = Risk_points::orderBy('remark')->get();
        $case_list = [];

        // เก็บค่า case_list ใน Array
        if ($id_risk_point) {
            $search = 1;
            $risk_point = Risk_points::findOrFail($id_risk_point);
            $case_list = explode(",", $risk_point->case_list);
        }

        /* รายการแต่ละ Case / Google Map */
        Cache::forget('cached_integration_final');
        $integration_finals = Cache::remember("cached_integration_final", 3600, function () use ($id_risk_point, $case_list) {
            $integration_final = new Integration_final;
            if ($id_risk_point) {
                $integration_final = $integration_final->where(function ($query) use ($case_list) {
                    foreach ($case_list as $key => $value) {
                        $query->orWhere('DEAD_CONSO_REPORT_ID', trim($value));
                    }
                });
            }
            $integration_final = $integration_final->orderBy('DateRec', 'DESC')->orderBy('TimeRec')->get();
            return $integration_final;
        });

        /* [Start] Time */
        // $times = Cache::remember("cached_integration_final_time", 3600, function () {
        //     return Integration_final::get();
        // });
        $times = $integration_finals;
        for ($i=0; $i<=24; $i++) { // สร้างตัวแปร Array เก็บค่า ชั่วโมง
            $oclock[$i]['label'] = '';
            $oclock[$i]['count'] = 0;
        }
        foreach ($times as $time) {
            if ($time->TimeRec != NULL) {
                $time24 = date('H:i', strtotime($time->TimeRec));
                if ($time24 >= '00:00' && $time24 <= '00:59') { $oclock[0]['count'] += 1; }
                else if ($time24 >= '01:00' && $time24 <= '01:59') { $oclock[1]['count'] += 1; }
                else if ($time24 >= '02:00' && $time24 <= '02:59') { $oclock[2]['count'] += 1; }
                else if ($time24 >= '03:00' && $time24 <= '03:59') { $oclock[3]['count'] += 1; }
                else if ($time24 >= '04:00' && $time24 <= '04:59') { $oclock[4]['count'] += 1; }
                else if ($time24 >= '05:00' && $time24 <= '05:59') { $oclock[5]['count'] += 1; }
                else if ($time24 >= '06:00' && $time24 <= '06:59') { $oclock[6]['count'] += 1; }
                else if ($time24 >= '07:00' && $time24 <= '07:59') { $oclock[7]['count'] += 1; }
                else if ($time24 >= '08:00' && $time24 <= '08:59') { $oclock[8]['count'] += 1; }
                else if ($time24 >= '09:00' && $time24 <= '09:59') { $oclock[9]['count'] += 1; }
                else if ($time24 >= '10:00' && $time24 <= '10:59') { $oclock[10]['count'] += 1; }
                else if ($time24 >= '11:00' && $time24 <= '11:59') { $oclock[11]['count'] += 1; }
                else if ($time24 >= '12:00' && $time24 <= '12:59') { $oclock[12]['count'] += 1; }
                else if ($time24 >= '13:00' && $time24 <= '13:59') { $oclock[13]['count'] += 1; }
                else if ($time24 >= '14:00' && $time24 <= '14:59') { $oclock[14]['count'] += 1; }
                else if ($time24 >= '15:00' && $time24 <= '15:59') { $oclock[15]['count'] += 1; }
                else if ($time24 >= '16:00' && $time24 <= '16:59') { $oclock[16]['count'] += 1; }
                else if ($time24 >= '17:00' && $time24 <= '17:59') { $oclock[17]['count'] += 1; }
                else if ($time24 >= '18:00' && $time24 <= '18:59') { $oclock[18]['count'] += 1; }
                else if ($time24 >= '19:00' && $time24 <= '19:59') { $oclock[19]['count'] += 1; }
                else if ($time24 >= '20:00' && $time24 <= '20:59') { $oclock[20]['count'] += 1; }
                else if ($time24 >= '21:00' && $time24 <= '21:59') { $oclock[21]['count'] += 1; }
                else if ($time24 >= '22:00' && $time24 <= '22:59') { $oclock[22]['count'] += 1; }
                else if ($time24 >= '23:00' && $time24 <= '23:59') { $oclock[23]['count'] += 1; }
            }
            else {
                $oclock[24]['label'] = "อื่นๆ";
                $oclock[24]['count'] += 1;
            }
        }
        for ($i=0; $i<count($oclock); $i++) { // เก็บ label ชั่วโมง
            $oclock[$i]['label'] = sprintf("%02d", $i).":00";
        }
        $oclock[24]['label'] = "อื่นๆ";
        /* [End] Time */

        /* [Start] Age */
        Cache::forget('cached_integration_final_age');
        $ages = Cache::remember("cached_integration_final_age", 3600, function () use ($id_risk_point, $case_list) {
            $integration_final = Integration_final::select(DB::raw('
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
            '));
            if ($id_risk_point) {
                $integration_final = $integration_final->where(function ($query) use ($case_list) {
                    foreach ($case_list as $key => $value) {
                        $query->orWhere('DEAD_CONSO_REPORT_ID', trim($value));
                    }
                });
            }
            $integration_final = $integration_final->groupBy('label')->get();
            return $integration_final;
        });
        /* [End] Age */

        /* [Start] Vehicle */
        Cache::forget('cached_integration_final_vehicle');
        $vehicles = Cache::remember("cached_integration_final_vehicle", 3600, function () use ($id_risk_point, $case_list) {
            $integration_final = Integration_final::select(DB::raw('
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
            '));
            if ($id_risk_point) {
                $integration_final = $integration_final->where(function ($query) use ($case_list) {
                    foreach ($case_list as $key => $value) {
                        $query->orWhere('DEAD_CONSO_REPORT_ID', trim($value));
                    }
                });
            }
            $integration_final = $integration_final->groupBy('label')->orderBy('count', 'DESC')->get();
            return $integration_final;
        });
        /* [End] Vehicle */

        /* เก็บข้อมูลใส่ตัวแปร count */
        $count = [
            'ages' => $ages,
            'times' => $oclock,
            'vehicles' => $vehicles,
        ];
        return view('risk_point', compact('risk_points', 'integration_finals', 'count', 'id_risk_point'));
    }

    public function integration_final($id)
    {
        Cache::forget("cached_integration_final_{$id}");
        $integration_finals = Cache::remember("cached_integration_final_{$id}", 3600, function () use ($id) {
            return Integration_final::where('DEAD_CONSO_REPORT_ID', $id)->get();
        });

        return response()->json([
            'data' => $integration_finals
        ]);
    }

    public function working_group()
    {
        return view('working_group');
    }
}
