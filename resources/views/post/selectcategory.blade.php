@extends('partials.headers.private')
<style>
    .category_item {
        background: #fff;
        border: 1px solid #c7c7c7;
        border-radius: 6px;
        width: 154px !important;
        /* height: 191px; */
        float: left;
        text-align: center;
        padding-top: 20px;
        color: #696969;
        font-weight: 700;
        margin: 5px;
        font-size: 14px;
    }
</style>
@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('select-city') }}">Select Location</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Select A Category</li>
                    </ol>
                </nav>

                <h3>Please select Ad Category:</h3>
                <p class="fs-5 col-md-8" style="margin-bottom: 30px">
                    Please select your cocation to continue. If you don't see your city, please contact us.
                </p>

                {{-- <div class="col-md-6 m-auto mb-4">
                    <div class="row" style="display: flex; justify-content: center">
                        @foreach ($categories as $item)
                            <a class="col-md-4 category_item"
                                href="{{ route('ad-details', ['city' => $city->slug, 'category' => $item->slug]) }}">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div> --}}

                <div class="col-md-8 m-auto mb-4">
                    <div class="row" style="display: flex; justify-content: center">
                        @foreach ($categories as $item)
                            <a class="card category_item"
                                href="{{ route('ad-details', ['city' => $city->slug, 'category' => $item->slug]) }}">
                                <img src="{{ asset('assets/img/categories/' . $item->image) }}" class="card-img-top"
                                    alt="Waterfall" style="width: 130px; height: 110px; object-fit: contain ">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

            @include('partials.common.footer')



        </div>
    @endsection
