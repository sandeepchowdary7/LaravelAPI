<?php

namespace App\Http\Controllers;

use App\CityData;
use App\UserSearchData;
use Gmopx\LaravelOWM\LaravelOWM;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\InputDataRequest;
use Sandeepchowdary7\Laratriposo\Triposo;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InputDataRequest $request)
    {
        //Validating the user input data
        $validated = $request->validated();

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

        //checking requested city details available in citydata table
        $existedCity = CityData::where('city', $request->city)->first();

        //requested city is not existed before goahead and save the city details
        if(!$existedCity) {
            $cityData = new CityData();
            $cityData->city = $location->city->name;
            $cityData->country = $location->city->country;
            $cityData->latitude = $location->city->lat;
            $cityData->longtitude = $location->city->lon;
            $cityData->save();
        }

        //return response in json with status and status-code
        return response()->json(['status' => 'success', 'data' => $location], 200);
    }
    
    public function getCityData()
    {
       $cityName = Input::get('city');

       if(empty($cityName))
        return "No data found for this city" . $cityName;

       $city = new Triposo();
       $data = $city->getCity($cityName);
    
       return response()->json(['status' => 'success', 'data' => $data], 200);
    }
}
