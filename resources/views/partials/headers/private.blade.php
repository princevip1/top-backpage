<!doctype html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    @php
        $myTitle = config('services.application.slugName') . ' | Backpage.com Alternative for Escorts, Body Rubs, Adult Jobs, Strippers & more!';
        $metaDesc = config('services.application.slugName') . ' is a backpage.com alternative site since 2018. Like backpage, find escorts ads, adult jobs, body rubs, strippers, dating services etc in the ' . config('services.application.domain') . ' classifieds.';
        
        if (isset($title)) {
            $myTitle = $title;
        }
        
        if (\Request::route()->getName() === 'login') {
            $myTitle = ' Login | ' . config('services.application.slugName') . ' | Backpage.com Alternative for Escorts, Body Rubs,  Adult  Jobs, Strippers & more!';
        }
        
        if (\Request::route()->getName() === 'register') {
            $myTitle = ' Register | ' . config('services.application.slugName') . ' | Backpage.com Alternative for Escorts, Body Rubs,  Adult  Jobs, Strippers & more!';
        }
        
        if (isset($metaDescription)) {
            $metaDesc = $metaDescription;
        }
        
    @endphp

    <title>{{ $myTitle }}</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <base href="{{ route('home') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="description" content="{{ $metaDesc }}">
    <meta name="theme-color" content="#0a0c22">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-567WXVGLYL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-567WXVGLYL');
    </script>

    <style>
        a {
            text-decoration: none !important;
            color: #0661d9;
        }

        .mr-2 {
            margin-right: 10px
        }

        .post-inner {
            margin-bottom: 20px
        }

        .datehead {
            background-color: #f5f5f5;
            font-weight: 700;
            border-bottom: 0;
            margin-bottom: 15px
        }

        .list-item {
            margin-bottom: 10px
        }

        .post-item {
            font-weight: 600;
            color: #106fec;
            text-decoration: none;
        }

        .list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .text-bg-green {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
        }

        .footer_backpage {
            text-align: center
        }
    </style>

</head>

<body>


    @guest
        <header class="p-1 text-bg-green">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                    <a href="/"><img src="{{ asset('assets/img/logo.png') }}" width="260" height="45"
                            alt="{{ config()->get('services.application.slugNameDomain') }}"></img></a>
                    <div class="text-end">
                        <a href="{{ route('login') }}" class="btn btn-dark me-2 btn-sm">Login/Signup</a>
                        <a href="{{ route('select-city') }}" class="btn btn-success btn-sm">Post Add</a>
                    </div>
                </div>

            </div>

        </header>
    @else
        <header class="p-1 text-bg-green">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                    <a href="/"><img src="{{ asset('assets/img/logo.png') }}" width="260" height="45"
                            alt="{{ config()->get('services.application.slugNameDomain') }}"></img></a>
                    <div class="text-end">
                        <a href="{{ route('myaccount') }}" class="btn btn-dark me-2 btn-sm">My account</a>
                        <a href="{{ route('select-city') }}" class="btn btn-success btn-sm">Post Add</a>
                    </div>
                </div>

            </div>

        </header>
        <header class="p-1 bg-dark">
            <div class="px-1">
                <div class="container d-flex flex-wrap justify-content-center">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('dashboard') }}"
                                class="nav-link px-2   {{ \Request::route()->getName() === 'dashboard' ? 'text-secondary' : 'text-white' }}  ">Dashboard
                            </a></li>
                        <li><a href="{{ route('select-city') }}"
                                class="nav-link px-2 {{ \Request::route()->getName() === 'select-city' || \Request::route()->getName() === 'ad-details' ? 'text-secondary' : 'text-white' }} ">Post
                                Free Ads</a></li>
                        <li><a href="{{ route('my-ads') }}"
                                class="nav-link px-2 {{ \Request::route()->getName() === 'my-ads' ? 'text-secondary' : 'text-white' }}">My
                                Ads</a></li>
                        <li><a href="{{ route('reload-balance') }}"
                                class="nav-link px-2 {{ \Request::route()->getName() === 'reload-balance' ? 'text-secondary' : 'text-white' }}">Balance/Credit</a>
                        </li>
                        <li>

                            <a class="nav-link px-2 text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </header>
    @endguest


    <div class="container mt-4">
        @yield('private_content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': ''
            }
        });
    </script>

</body>

</html>
