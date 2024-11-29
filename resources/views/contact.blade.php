@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact US</li>
                    </ol>
                </nav>
                <div class="mainBody" style="margin-top:-5px;">
                    <center>
                        <h1 style="color:red">Need Help? Contact us</h1> <br>
                        <br>
                        <h1>Email: <a href="mailto: {{ 'Help@' . config('services.application.slugNameDomain') }}"><strong
                                    style="font-size:20px">
                                    {{ 'Help@' . config('services.application.slugNameDomain') }}</strong></a>
                        </h1>
                    </center>

                </div>

            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
