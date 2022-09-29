<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class NasaController extends Controller
{
    //
    public function get_data(Request $request)
    {
        $key="dub9wZ9LLJLbnMKNj1lPLb5onkAdKsrwFbglUB8I";
        $start_date=$request['start_date'];
        $end_date=$request['end_date'];
        // dd($end_date);
        $response = Http::get("https://api.nasa.gov/neo/rest/v1/feed?start_date=$start_date&end_date=$end_date&api_key=$key");
      $nearst="";
      $averageDiameter=[];
      $velocity=0;
        foreach($response["near_earth_objects"][$end_date] as $key=>$res)
        {
            
            $nearstAestroid= $res["close_approach_data"][0]["miss_distance"]["kilometers"];

            $velocityAestroid= $res["close_approach_data"][0]["relative_velocity"]["kilometers_per_hour"];
            $minDiameterAestroid= $res["estimated_diameter"]["kilometers"]["estimated_diameter_min"];
            $maxDiameterAestroid= $res["estimated_diameter"]["kilometers"]["estimated_diameter_min"];
            
            $diameter=($minDiameterAestroid+$maxDiameterAestroid)/2;
            $averageDiameter[$res["id"]]= $diameter;
            if(!$nearst)
            {
                $nearst=$nearstAestroid;
            }
            if($nearst >  $nearstAestroid )
            {
                $nearst=$nearstAestroid;
                $nearstId=$res['id'];
            }

            if($velocityAestroid > $velocity)
            {
                $velocity=$velocityAestroid;
                $fastestId=$res['id'];;
            }
            
                
        }
        // dd($averageDiameter);
    $data['nearest_aestroid']=$nearst;
    $data['fastest_aestroid']=$velocity;
    $data['fastest_id']=$fastestId;
    $data['nearst_id']=$nearstId;
    $data['size']=$averageDiameter;
    return view('nasa_charts',["data"=>$data,"size"=>$averageDiameter]);
    
    }
}
