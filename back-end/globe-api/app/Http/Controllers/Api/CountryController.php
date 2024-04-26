<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries(){
        $countries = Country::all();
        return response($countries)->json();
    }

    public function getCitiesByCountry(Request $req){
        $cities = City::all()->where('country_id','=', $req->countryId);
        return response($cities)->json();
    }
}
