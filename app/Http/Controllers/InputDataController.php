<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Support\Facades\Input;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->city;

        $lowm = new LaravelOWM();
        $location = $lowm->getCurrentWeather($input);

        return response()->json(['status' => 'success', 'data' => $location], 200);

        // $country = $location->city->country;
        // $city = $location->city->name;
        // $latitude = $location->city->lat;
        // $longtitude = $location->city->lon;
    }
    
    public function getCoordinates(Request $request){
       $coordinates = json_decode(json_encode($this->index($request)))->original->city;
        
       $lat = $coordinates->lat;
       $lon = $coordinates->lon;
       return $lat . ' && ' . $lon;
    }
}
