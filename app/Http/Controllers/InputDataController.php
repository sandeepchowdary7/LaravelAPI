<?php

namespace App\Http\Controllers;

use App\UserSearchData;
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
        //Validating the user input data
        $this->validate ($request,  [
            'name'  =>  'required',
            'city'  =>  'required',
            'email' =>  'required'
        ]);

        //Saving the user input data
        $userSearchData = new UserSearchData;
        $userSearchData->name =  Input::get('name');
        $userSearchData->city =  Input::get('city');
        $userSearchData->email =  Input::get('email');
        $userSearchData->user_ip = $request->ip();
        $userSearchData->user_location =  Input::get('location');
        $userSearchData->rqst_status =  Input::get('rqst_status');
        $userSearchData->save();

        //Posting user input city name to the weather api
        $lowm = new LaravelOWM();
        $location = $lowm->getCurrentWeather($request->city);
        
        //If city value is null throw not found exception and Saving request status to the db
        if($location->city->name == NULL) {
            $rqstStatus = UserSearchData::where('city', $userSearchData->city)->latest()->first();
            $rqstStatus->rqst_status = 'Failed';
            $rqstStatus->save();
            return response()->json(['status' => 'Failed',"Oops! Couldn't find any city with " .$request->city. ". Search again with correct keyword"], 422);
        }

        //Saving request status to the db
        $rqstStatus = UserSearchData::where('city', $userSearchData->city)->latest()->first();
        $rqstStatus->rqst_status = 'Success';
        $rqstStatus->save();

        //return response in json with status and status-code
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
