@extends('partials.headers.private')

<style>
    .list {
        list-style: disc !important;
        padding: 0;
        margin: 0;
        margin-left: 20px !important;

    }

    .list-item {
        margin-bottom: 15px !important;
    }
</style>

@section('private_content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Disclaimer</h1>
                </div>
                <form method="POST" onsubmit="return mySubmitFunction(event)">

                    <div class="modal-body">
                        <p>
                            {{ config('services.application.domain') }} was started to provide businesses with legitimate
                            services a safe venue for their classified ads. However, there are certain individuals who are
                            promoting illegal {{ config('services.application.domain') }} will not condone any classified
                            ads relating to human trafficking and will prosecute those promoting such ads to the full extent
                            of the law. Any ad and business found to be in violation of our Terms and Conditions will be
                            reported to the proper authorities.
                        </p>
                        </br>


                        <p>You can report trafficking <a href="{{ route('contact-us') }}">Here</a>.</p>

                        <p><label><input type="checkbox" id="acceptDisclaimer" required> I have read and agree to this
                                disclaimer as well as the <a title="Terms Of Use" href="{{ route('terms') }}">Terms of
                                    Use</a> and i am <a title="Privacy Policy" href="{{ route('privacy') }}">aware of
                                    Privacy Policy</a>.</label></p>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="{{ route('home') }}">Exit</a>
                        <button type="submit" class="btn btn-success">I agree</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="mainCellWrapper" style="padding: 0px 5px;">
        <nav aria-label="breadcrumb" class="bg-light">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('state', $state->slug) }}">{{ $state->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
        <p
            style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 18px;font-weight: 600;padding: 5px 5px;margin: 30px 0px;">
            Please follow our <a href="{{ route('terms') }}">Terms and Conditions</a> and <a
                href="{{ route('privacy') }}">Privacy Policy</a> before you see or reply an ad.</p>
        </p>

        <div class="" style="margin-top:-5px;">
            <div id="superRegionNavMenu" style="margin-top:1em; font-size:14px; text-align: justify;">
                <b>Find {{ $category->name }} ads in:</b>

                @foreach ($cities as $key => $item)
                    {{ $key === 0 ? '' : '|' }}

                    <a href="{{ route('cityPosts', [$state->slug, $item->slug, $category->slug]) }}"
                        class="inactive">{{ $item->name }}</a>
                @endforeach

            </div>
            @include('partials.common.ads-promotional-links')

        </div>

        @if (count($posts) === 0)
            <div class="alert alert-info alert-dismissible fade show" role="alert">

                Sorry there is no ad founded in <a class="text-red-700"
                    href="{{ route('state', $state->slug) }}">{{ $state->name }}</a> {{ $category->name }}
                section.
            </div>
        @else
            @foreach ($posts as $key => $itemPost)
                <div class="post-list">

                    <div class="post-inner">
                        <div class="datehead">{{ date_format(date_create($key), 'l jS \of F Y') }}
                        </div>
                        <ol class="list">
                            @foreach ($itemPost as $itemPostOriginal)
                                @php
                                    //find the city
                                    $city = $cities->where('id', $itemPostOriginal['city_id'])->first();
                                @endphp

                                <li class="list-item">
                                    <a class="post-item"
                                        href="{{ route('single', ['state' => $state->slug, 'city' => $city->slug, 'category' => $category->slug, 'post' => $itemPostOriginal['slug']]) }}">{{ $itemPostOriginal['title'] === '' ? 'NO TITLE' : $itemPostOriginal['title'] }}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>


               
            @endforeach
            
             @if (count($pageNumbers) > 1)
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="{{ $page == 1 ? ' disabled' : '' }} page-item">
                                <a class="page-link"
                                    href="{{ route('statePosts', ['state' => $state->slug, 'category' => $category->slug, 'page' => 1]) }}">Previous</a>
                            </li>
                            @foreach ($pageNumbers as $item)
                                <li class="{{ $page == $item ? ' active' : '' }} page-item">
                                    <a class="page-link"
                                        href="{{ route('statePosts', ['state' => $state->slug, 'category' => $category->slug, 'page' => $item]) }}">{{ $item }}</a>
                                </li>
                            @endforeach


                            <li class="{{ $page == count($pageNumbers) ? ' disabled' : '' }} page-item">
                                <a class="page-link"
                                    href="{{ route('statePosts', ['state' => $state->slug, 'category' => $category->slug, 'page' => $page + 1]) }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                @endif
        @endif



    </div>
    <br />
    @include('partials.common.footer')

    <script>
        function mySubmitFunction(e) {
            e.preventDefault();
            $('#exampleModal').modal('toggle');
            localStorage.setItem('termsAccepted', 'true');
        }
    </script>

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 900 || document.documentElement.scrollTop > 900) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script type="text/javascript">
        $(window).on('load', async function() {

            const status = await localStorage.getItem('termsAccepted');

            if (status === 'true') {

            } else {
                $('#exampleModal').modal('show');
            }


        });
    </script>

@endsection('private_content')
