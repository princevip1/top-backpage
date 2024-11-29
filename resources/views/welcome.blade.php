@extends('partials.headers.withLargeLogoAndDesc')

@section('home_content')
    <div id="geoListings">
        <div class="column">
            <div class="united-states geoBlock">
                <h2 id=unitedStates>United States</h2>
                <div class="inner">

                    @php
                        $usa = App\Models\Country::where('short_name', 'US')->first();
                    @endphp

                    @foreach ($usa->states as $itemStateUsa)
                        <div class="geoUnit">
                            <h3><a href="">{{ $itemStateUsa->name }}</a></h3>
                            <ul>
                                @foreach ($itemStateUsa->cities as $itemCityUsa)
                                    <li><a href="{{ route('city', [$itemCityUsa->slug]) }}">{{ $itemCityUsa->name }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="column">
            <div class="canada geoBlock">
                <h2 id="canada">Canada</h2>
                <div class="inner">

                     
                </div>
            </div>
            <div class="uk-au geoBlock">
                <h2>United Kingdom</h2>
                <div class="inner">
                    
                </div>
            </div>

            <div class="uk-au geoBlock">
                <h2>Australia</h2>
                <div class="inner">
                     
                </div>
            </div>

            <div class="uk-au geoBlock">
                <h2>Europe</h2>
                <div class="inner">
                     
            </div>
        </div>
    </div>
    @include('partials.common.footerSeoText')
    <br>
    </div>
@endsection('home_content')
