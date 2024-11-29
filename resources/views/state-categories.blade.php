@extends('partials.headers.private')


@section('private_content')
    <style>
        .indexSectionList a,
        .indexForumList a {
            color: #136367 !important;
            text-decoration: none;
            font-size: 20px;
            font-family: sans-serif;
            font-weight: 500;
        }

        .indexSectionButtons {
            padding: 0 2px 2px 10px;
            background-color: #1877F2;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        .indexSectionButtons p.head {
            color: #fff;
            font-size: 23px;
            text-decoration: none;
            font-weight: 700;
            letter-spacing: .75px;
            padding: 0;
            margin: 0;
        }

        .category_item {
            background: #fff;
            border: 1px solid #c7c7c7;
            border-radius: 6px;
            width: 154px;
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
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $state->name }}
                        </li>
                    </ol>
                </nav>

                <div class="row " style="margin: 0px;padding: 5px 0px 0px 0px; margin-bottom: 30px;">
                    <div class="col-sm-12" style="padding: 0px 5px;">
                        <h1 style="font-size: 18px;text-align: center;font-weight: bold;">Welcome to the Backpage
                            {{ $state->name }}
                            alternative, {{ config()->get('services.application.slugName') }} {{ $state->name }}
                            classifieds section.</h1>
                        <p style="text-align: justify;">Your search for the backpage {{ $state->name }} classified website
                            ends here at
                            {{ config()->get('services.application.slugName') }} {{ $state->name }} website. To start
                            exploring the new <b>{{ $state->name }}
                                backpage</b> classified
                            section, select a category from below and find real backpage {{ $state->name }} calssified
                            advertisements
                            posted by the users of {{ $state->name }} {{ config()->get('services.application.slugName') }}
                            classifed website.
                        </p>
                    </div>
                </div>

                <div class="col-md-8 m-auto mb-4">
                    <div class="row" style="display: flex; justify-content: center">
                        @foreach ($categories as $item)
                            <a class="card category_item"
                                href="{{ route('statePosts', ['state' => $state->slug, 'category' => $item->slug]) }}">
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
        </div>
    </div>



    @include('partials.common.category-seo-footer', ['location' => $state])
    @include('partials.common.footer')
    </div>
@endsection
