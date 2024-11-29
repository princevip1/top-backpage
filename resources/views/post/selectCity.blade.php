@extends('partials.headers.private')
<style>
    .countryHeader {
        background-color: #AFBED8;
        padding: 4px 8px 4px 22px;
        clear: both;
        border-radius: 4px;
        position: relative;
        margin-top: 1px;
    }

    .stateHeader {
        background-color: #E3E9F2;
        padding: 4px 8px 4px 22px;
        margin-left: 12px;
        clear: both;
        border-radius: 4px;
        position: relative;
        margin-top: 1px;
    }

    .stateCont .stateSub {
        clear: both;
        float: left;
        padding: 4px 24px;
    }

    input#continueButton {
        display: block;
        clear: both;
        margin: 2em 0 1em !important;
    }

    .cityofstate {
        list-style-type: disc;
        list-style: disc;
        list-style-position: inside;
        margin-top: 10px !important;
        margin-bottom: 10px !important;
        -webkit-column-count: 4;
        -moz-column-count: 4;
        column-count: 4;
    }

    @media (max-width:860px) {
        .cityofstate {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }
    }

    @media (max-width:500px) {
        .cityofstate {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }

    .stateContainer {
        padding-left: 25px;
    }

    .iscityselectedcode {
        opacity: 0.05;
    }

    .hideme {
        display: none;
    }

    .showme {
        display: block;
    }

    .arrow {
        content: "";
        position: absolute;
        border-width: 8px;
        display: block;
        width: 0;
        border-style: solid;
        border-color: transparent transparent transparent #FFF;
        top: 6px;
        left: 7px;
    }

    .button {
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
    }

    #sidr {
        display: none;
    }
</style>
@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Select A Location</li>
                    </ol>
                </nav>

                <h3>Please select Ad Location:</h3>
                <p class="fs-5 col-md-8">
                    Please select your location to continue. If you don't see your city, please contact us.
                </p>

                <div class="mainBody">

                    @foreach ($countires as $itemCountry)
                        <div class="countryHeader countryheader{{ $itemCountry->id }}">
                            <a class="a4countryopen a4countryopen231" onclick="openshowstates('{{ $itemCountry->id }}');">
                                <div class="arrow showarrow" style="display: block;"></div>
                                <div class="arrow hidearrow downArrow inthide" style="display: none;"></div>
                            </a>
                            <input onclick="selectallstateofcountry('{{ $itemCountry->id }}');"
                                class="hideme iscountryselected iscountryselected{{ $itemCountry->id }}" value="0"
                                type="checkbox">
                            <a style="display: inline-block;" onclick="openshowstates('{{ $itemCountry->id }}');">
                                {{ $itemCountry->name }}
                            </a>
                        </div>
                        <div class="countryContainer countrycont{{ $itemCountry->id }} hideme">

                            @foreach ($itemCountry->states as $itemState)
                                <div class="stateHeader">
                                    <a class="a4stateopen a4stateopen{{ $itemState->id }}"
                                        onclick="showcities('{{ $itemState->id }}');">
                                        <div class="arrow showarrow"></div>
                                        <div class="arrow hidearrow downArrow inthide"></div>
                                    </a>
                                    <a onclick="showcities('{{ $itemState->id }}');">{{ $itemState->name }}</a>
                                </div>
                                <div class="stateContainer statecont{{ $itemState->id }} hideme">
                                    <ul class="cityofstate">
                                        @foreach ($itemState->cities as $itemCity)
                                            <li><a
                                                    href="{{ route('select-category', $itemCity->slug) }}">{{ $itemCity->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>

            @include('partials.common.footer')



        </div>

        <script>
            function openshowstates(idcountry) {

                var classes = $('.countrycont' + idcountry).attr('class').split(' ');
                if (classes[2] == 'hideme') {
                    $('.countrycont' + idcountry).removeClass('hideme');
                    $('.countrycont' + idcountry).addClass('showme');
                } else {
                    $('.countrycont' + idcountry).removeClass('showme');
                    $('.countrycont' + idcountry).addClass('hideme');
                }
            }

            function showcities(idstate) {
                var classes = $('.statecont' + idstate).attr('class').split(' ');
                if (classes[2] == 'hideme') {
                    $('.statecont' + idstate).removeClass('hideme');
                    $('.statecont' + idstate).addClass('showme');
                } else {
                    $('.statecont' + idstate).removeClass('showme');
                    $('.statecont' + idstate).addClass('hideme');
                }
            }
        </script>
    @endsection
