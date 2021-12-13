<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WeatherController extends Controller
{
    public function show(Request $request)
    {
        $postcode = $request->get('postcode');

        $responsePostcode = Http::get(sprintf('api.geonames.org/postalCodeSearchJSON?username=test1&postalcode=%s',$postcode));
        $jsonPostcode = json_decode($responsePostcode, true);

        $responsePlace = Http::get(sprintf('https://www.metaweather.com/api/location/search/?lattlong=%s,%s',$jsonPostcode['postalCodes'][0]['lat'],$jsonPostcode['postalCodes'][0]['lng']));
        $jsonPlace = json_decode($responsePlace, true);

        $responseWeather = Http::get(sprintf('https://www.metaweather.com/api/location/%s/',$jsonPlace[0]['woeid']));
        $jsonWeather = json_decode($responseWeather, true);

        return view('welcome', [
            'weathers' => $jsonWeather['consolidated_weather'],
            'info'     => $jsonPostcode['postalCodes'][0]
        ]);
    }
}