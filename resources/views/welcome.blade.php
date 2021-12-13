@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <form action="http://127.0.0.1:8000/postcode" method="GET">
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="postcode">Post Code</label>&nbsp;
                                <input type="text" id="postcode" name="postcode" placeholder="160-0022" required>
                                <button id="btn-submit"> Submit </button>
                            </div>
                        </div>
                    </form>
                    @isset($weathers)
                    <div id="bodyForecast">
                        <h2 style="text-align: left">{!!$info['adminName1'].", ".$info['placeName'].", ".$info['adminName2'] !!}</h2>
                        <p style="text-align: left"> 3 Days Forecast </p>
                        <div id="contain">
                            @foreach(array_slice($weathers, 0, 3) as $weather)
                                <div id="first">
                                    <img class="weatherImage" src={{ url('https://www.metaweather.com//static/img/weather/png/' . $weather['weather_state_abbr'] . '.png') }} alt="alternatetext">
                                    <p>{!! date('Y-m-d D', strtotime($weather['applicable_date'])) !!}</p>
                                    <h3> {!! $weather['weather_state_name'] !!}</p> </h3>
                                    <p> {{ "Max ".round($weather['max_temp'],0)."°"." Min ".round($weather['min_temp'],0)."°" }}
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    <div id="bodyExtra">
                        <div id="contain">
                            <div id="extra">
                                <p style="text-align: left"> Map </p>
                                <iframe id="iframeMap"src={{ url('https://www.google.com/maps/embed/v1/place?key=' . env( 'GOOGLE_MAP_KEY' ) .'&center=' . $info['lat'] . ',' . $info['lng'] .'&q='. $info['adminName2'] ) }}></iframe>
                            </div>
                            <div id="extra">
                                <p style="text-align: left"> Street view </p>
                                <iframe id="iframeMap"src={{ url('https://www.google.com/maps/embed/v1/streetview?key=' . env( 'GOOGLE_MAP_KEY' ) .'&location=' . $info['lat'] . ',' . $info['lng'] ) }}></iframe>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection