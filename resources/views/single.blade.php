@extends('partials.headers.private')

<style>
    /* hide on small device css */
    @media (max-width: 900px) {
        .hide-on-small-device {
            display: none !important;
        }
    }

    /* hide on large device css */
    @media (min-width: 900px) {
        .hide-on-big-device {
            display: none !important;
        }
    }
</style>

@section('private_content')
    <div id="mainCellWrapper" style="padding: 0px 5px;">
        <nav aria-label="breadcrumb" class="bg-light">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('statePosts', [$state->slug, $category->slug]) }}">{{ $state->name }}</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('cityPosts', [$state->slug, $city->slug, $category->slug]) }}">{{ $city->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        @include('partials.common.bAlert')

        <p
            style="border-radius: 10px;border-style: dashed;border-color: #090;text-align: center;font-size: 15px;font-weight: 500;color: #940303;padding: 5px 5px;">
            Please use common sense before sending money or making any payments. Make sure the person you’re sending money is real and never pay with gift cards, pre-paid cards, or things of that nature. We try to filter our classifieds the best we can but we will NOT be responsible for any financial losses.
        </p>

        <div class="post-list">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" width="100%" border="0" align="left">
                        <tbody>
                            <tr>
                                <td style="padding: 0;" valign="top">
                                    <table class="table" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 0;">
                                                    <div align="center" style="padding:5px 0">

                                                        <a class="btn btn-sm btn-danger"
                                                            href="javascript:confirmAbuseReport();">Report Abuse</a>
                                                        @if ($post->email !== null || $post->email !== '')
                                                            <a class="btn btn-sm btn-success"
                                                                href="mailto:{{ $post->email }}">Email this
                                                                Ad</a>
                                                        @endif


                                                    </div>
                                                    Post# {{ $post->random_post_id }}<br>
                                                    <br>
                                                    <div class="posttitle" style="word-break: break-all;">
                                                        <h3 style="font-size:1.75rem;font-weight:500;line-height: 1.2">
                                                            {{ $post->title }}</h3>
                                                        <br>
                                                        <span
                                                            class="adarea">({{ $post->location === null ? $city->name : $post->location }}
                                                            )</span>
                                                    </div>
                                                    <br>
                                                    <div class="row mb-4">
                                                        <div class="col-sm-12">
                                                            <b>Posted on</b>:
                                                            {{ date_format($post->created_at, 'l jS \of F Y h:i:s A') }}<br>
                                                            <b>Expires On</b>:
                                                            {{ date_format($post->created_at, 'l jS \of F Y h:i:s A') }}
                                                            <br>
                                                            <b>Reply to</b>:
                                                            @if ($post->email !== null || $post->email !== '')
                                                                <a
                                                                    href="mailto:{{ $post->email }}">{{ $post->email }}</a>
                                                            @endif
                                                            <br>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="col-sm-12 hide-on-big-device">
                        <div class="row">
                            @foreach ($post->images as $item)
                                <div class="col-md-6">
                                    <img src="{{ $post->image_source === 'local_hosting' ? asset('post_images/' . $item->image): $item->image }}" style="border: 1px solid #1877F2"
                                        class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-7">
                                    <table class="table" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Name</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ $post->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Sex</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->gender) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Age</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ $post->age }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Incall</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->incall) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Outcall</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->outcall) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Phone Number</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">: {{ $post->phone }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Services Provided For</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->service_for) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Email Address</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ $post->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Specific Location</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ $post->location === null ? $city->name : $post->location }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Height</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->height) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Weight</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->weight) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Breast</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->breast) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0.15rem;"><b>Ethnicity</b></td>
                                                <td style="padding: 0.15rem; word-break: break-all;">:
                                                    {{ strtoupper($post->ethnicity) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="border-bottom:1px solid #E0E0E0;">&nbsp;</div>
                            <table class="table" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="wrap">

                                                <p>{!! $inCodedDescription !!}</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        @if ($post->images->count() !== 0)
                            <div class="col-sm-5 hide-on-small-device">
                                <div class="row">
                                    @foreach ($post->images as $item)
                                        <div class="col-md-6">
                                            <img src="{{  $post->image_source === 'local_hosting' ? asset('post_images/' . $item->image): $item->image }}"
                                                style="border: 1px solid #1877F2" class="w-100 shadow-1-strong rounded mb-4"
                                                alt="Waves at Sea" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
    <br />
    @include('partials.common.footer')
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
@endsection('private_content')
