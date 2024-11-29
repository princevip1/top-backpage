@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <p
                    style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 18px;font-weight: 600;padding: 5px 5px;margin: 30px 0px;">
                    Your current balance is <strong
                        style="color:red;font-size: 30px;letter-spacing: 2px">${{ auth()->user()->balance }}</strong> </br>
                    From <a href="{{ route('reload-balance') }}">here</a> you can reload balance if you need
                    more. We take a manual verification before we approve your transaction.</br> So please allow few minutes
                    after you complete your transaction.</p>

                <p
                    style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 18px;font-weight: 600;padding: 5px 5px;margin: 30px 0px;">
                    Please follow our <a href="{{ route('terms') }}">Terms and Conditions</a> and <a
                        href="{{ route('privacy') }}">Privacy Policy</a> before you post an ad.</p>
                </p>

                <div class="row" style="margin-bottom: 120px">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Today Live Ads
                            </div>
                            <div class="card-body">
                                {{ $todayLiveAds }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Total Live Ads
                            </div>
                            <div class="card-body">
                                {{ $totalLiveAds }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Total Free Ads
                            </div>
                            <div class="card-body">
                                {{ $totalFreeAds }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Total Paid Ads
                            </div>
                            <div class="card-body">
                                {{ $totalPaidAds }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
