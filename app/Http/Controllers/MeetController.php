<?php

namespace App\Http\Controllers;

use App\Models\Appoinments;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function saveMeet(Request $request) {
        $google = $this->googleLocationDatas($request->from_location, $request->to_location);

        $fields = [
            'agent_id' => $request->agent_id,
            'client_id' => 0,
            'name' => $request->client_name,
            'surname' => $request->client_surname,
            'email' => $request->client_email,
            'phone' => $request->client_phone,
            'from_postcode' => $request->from_location,
            'to_postcode' => $request->to_location,
            'distance' => $google->rows[0]->elements[0]->distance->text,
            'meet_date' => $request->meet_date,
            'meet_time' => $request->meet_time,
            'exit_time' => $this->exitTimeCalculate($google->rows[0]->elements[0]->duration->value, $request->meet_time),
            'return_time' => $this->returnTimeCalculate($google->rows[0]->elements[0]->duration->value, $request->meet_time),
        ];

        $add = Appoinments::create($fields);

        if($add) {
            echo json_encode([
                'action' => 'OK'
            ]);
        } else {
            echo json_encode([
                'action' => 'ERR'
            ]);
        }
    }

    private function googleLocationDatas($from_loc, $to_loc) {
        $from = urlencode($from_loc);
        $to = urlencode($to_loc);

        $data = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false&key=AIzaSyB18Pbqsuvd6q-nXROLWA_E_gBWKmVv9dg");
        $data = json_decode($data);

        return $data;
    }

    private function exitTimeCalculate($distance_duration, $meet_time) {
        $calc_time = '';
        $calc = $distance_duration / 60;

        if($calc <= 60) {
            $calc_time = number_format($calc);
        } else {
            $calc_time = $calc / 60;
            $calc_time = number_format($calc_time,2);
        }

        $st_calc_time = str_replace('.',':', $calc_time);

        echo $st_calc_time.'<br/>';

        $new_hour = $distance_duration / 3600 % 24;
        $new_minute = $distance_duration / 60 % 60;
        $new_time = $new_hour.':'.$new_minute;

        $exp_calc_time = explode(':',$new_time);

        //Calculate Available Time
        if(isset($exp_calc_time[1])) {
            if($exp_calc_time[0] == 0) {
                $timestamp = strtotime("-".$exp_calc_time[1]." minutes", strtotime($meet_time));
            } else {
                $timestamp = strtotime("-".$exp_calc_time[1]." minutes", strtotime($meet_time)) - 60*60*$exp_calc_time[0];
            }
        } else {
            $timestamp = strtotime("-".$exp_calc_time[0]." minutes", strtotime($new_time)) - 60*60;
        }

        $hour = $timestamp / 3600 % 24;
        $minute = $timestamp / 60 % 60;
        $lastTime = $hour.':'.$minute;

        return $lastTime;
    }

    private function returnTimeCalculate($distance_duration, $meet_time) {
        $calc_time = '';
        $calc = $distance_duration / 60;

        if($calc <= 60) {
            $calc_time = number_format($calc);

        } else {
            $calc_time = $calc / 60;
            $calc_time = number_format($calc_time,2);
        }

        //Total Meeting Hour 1
        $timestamp = strtotime($meet_time) + 60*60;

        $new_hour = $timestamp / 3600 % 24;
        $new_minute = $timestamp / 60 % 60;
        $new_time = $new_hour.':'.$new_minute;

        $exp_calc_time = explode('.',$calc_time);

        //Calculate Available Time
        if(isset($exp_calc_time[1])) {
            $timestamp = strtotime("+".$exp_calc_time[1]." minutes", strtotime($new_time)) + 60*60*$exp_calc_time[0];
        } else {
            $timestamp = strtotime("+".$exp_calc_time[0]." minutes", strtotime($new_time)) + 60*60;
        }
        $hour = $timestamp / 3600 % 24;
        $minute = $timestamp / 60 % 60;
        $lastTime = $hour.':'.$minute;

        return $lastTime;
    }
}
