<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk_points;
use App\Models\Integration_final;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function risk_point(Request $request)
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $id_risk_point = $request->id;
        $risk_points = Risk_points::orderBy('total_death', 'DESC')->get();
        $risk_point2 = NULL;
        $case_list = [];
        $cctvs = [];
        // เก็บค่า case_list ใน Array
        if ($id_risk_point) {
            $search = 1;
            $risk_point2 = Risk_points::findOrFail($id_risk_point);
            $case_list = array_map('trim', explode(',', $risk_point2->case_list));
            if ($risk_point2->cctv_id) {
                $cctvs = array_map('trim', explode(',', $risk_point2->cctv_id));
            }
        }
        /* รายการแต่ละ Case / Google Map */
        Cache::forget("cached_integration_final_{$id_risk_point}");
        $integration_finals = Cache::remember("cached_integration_final_{$id_risk_point}", 3600, function () use ($id_risk_point, $case_list) {
            $integration_final = new Integration_final;
            if ($id_risk_point) {
                $integration_final = $integration_final->where(function ($query) use ($case_list) {
                    foreach ($case_list as $key => $value) {
                        $query->orWhere('DEAD_CONSO_REPORT_ID', $value);
                    }
                });
            }
            $integration_final = $integration_final->orderBy('DateRec', 'DESC')->orderBy('TimeRec')->get();
            return $integration_final;
        });

        /* [Start] Time */
        for ($i = 0; $i <= 24; $i++) { // สร้างตัวแปร Array เก็บค่า ชั่วโมง
            $times[$i]['label'] = '';
            $times[$i]['count'] = 0;
        }
        foreach ($integration_finals as $integration_final) {
            if ($integration_final->TimeRec != NULL) {
                $time24 = date('H:i', strtotime($integration_final->TimeRec));
                for ($i = 0; $i <= 23; $i++) { // เก็บ count ชั่วโมง
                    $time_start = sprintf("%02d", $i) . ':00';
                    $time_end = sprintf("%02d", $i) . ':50';
                    if ($time24 >= $time_start && $time24 <= $time_end) {
                        $times[$i]['count']++;
                    }
                }
            } else {
                $times[24]['count']++;
            }
        }
        for ($i = 0; $i < count($times); $i++) { // เก็บ label ชั่วโมง
            $times[$i]['label'] = sprintf("%02d", $i) . ":00";
        }
        $times[24]['label'] = "อื่นๆ";
        /* [End] Time */

        /* [Start] Age */
        for ($i = 0; $i <= 20; $i++) { // สร้างตัวแปร Array เก็บค่า อายุ
            $ages[$i]['label'] = '';
            $ages[$i]['count'] = 0;
        }
        foreach ($integration_finals as $integration_final) {
            if ($integration_final->Age != NULL) {
                $age = $integration_final->Age;
                $ii = 1; // เอาไว้กำหนดตัวนับเพิ่มทีละ 5
                for ($i = 0; $i <= 19; $i++) { // เก็บ count อายุ
                    $age_start = $ii;
                    $age_end = $ii + 4;
                    if ($age >= $age_start && $age <= $age_end) {
                        $ages[$i]['count']++;
                    }
                    $ii += 5;
                }
            } else {
                $ages[20]['count']++;
            }
        }
        $ii = 1; // เอาไว้กำหนดตัวนับเพิ่มทีละ 5
        for ($i = 0; $i < count($ages); $i++) { // เก็บ label อายุ
            $age_start = $ii;
            $age_end = $ii + 4;
            $ages[$i]['label'] = $age_start . '-' . $age_end;
            $ii += 5;
        }
        $ages[20]['label'] = "อื่นๆ";
        /* [End] Age */

        /* [Start] Vehicle */
        // Cache::forget("cached_integration_final_vehicle_{$id_risk_point}");
        $vehicles = Cache::remember("cached_integration_final_vehicle_{$id_risk_point}", 3600, function () use ($id_risk_point, $case_list) {
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
                        $query->orWhere('DEAD_CONSO_REPORT_ID', $value);
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
            'times' => $times,
            'vehicles' => $vehicles,
        ];
        // dd($id_risk_point);

        // หาไฟล์ในสถานที่
        if ($id_risk_point) {

            $directoryPath = public_path('upload/doc/' . $id_risk_point); // เปลี่ยนเส้นทางไปตามที่คุณเก็บไฟล์
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true); // สร้างโฟลเดอร์พร้อมทั้งสิทธิ์การเข้าถึง
            }

            if (file_exists($directoryPath) && is_dir($directoryPath)) {

                $files = File::files($directoryPath);

                $data = [];
                foreach ($files as $file) {
                    $filePath = $file->getRealPath();
                    $fileInfo = pathinfo($filePath);
                    $extension = strtolower($fileInfo['extension']);

                    // if (in_array($extension, ['pdf', 'ppt', 'doc'])) {
                        $data[] = [
                            'name' => $fileInfo['basename'],
                            'type' => $extension,
                        ];
                    // }
                }
            }
            //dd($data);
        } else {
            //
            $data = [];
        }

        return view('risk_point', compact('risk_points', 'risk_point2', 'integration_finals', 'count', 'id_risk_point', 'cctvs'), ['files' => $data]);
    }

    public function integration_final($id)
    {
        // Cache::forget("cached_integration_final_{$id}");
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
