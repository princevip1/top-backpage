<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <title>{{ config()->get('services.application.slugName') }} | Backpage.com Alternative for Escorts, Body Rubs, Adult
        Jobs,
        Strippers & more!</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <meta name="description"
        content="{{ config()->get('services.application.slugName') }} is a backpage.com alternative site since 2018. Like backpage, find escorts ads, adult jobs, body rubs, strippers, dating services etc in the {{ config()->get('services.application.slugNameDomain') }} classifieds." />
    <meta name=keywords
        content="{{ config()->get('services.application.slugName') }}, Backpage, similar to Backpage, Backpage.com, new Backpage, Backpage Replacement, Backpage personals, alternative to backpage, backpage escorts, dating services" />
    <meta name="theme-color" content="#0a0c22">
    <link rel="canonical" href="{{ route('home') }}" />
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-567WXVGLYL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-567WXVGLYL');
    </script>

    <style>
        #header {
            padding: 6px
        }

        #header-home {
            text-align: center;
            line-height: 1.2
        }

        #header-home h1 {
            font-weight: 400;
            font-size: 17px;
            color: #000;
            margin: 0
        }

        #header-home p {
            font-weight: 400;
            font-size: 17px;
            color: #000;
            margin: 0
        }

        #header-home h2 {
            font-weight: 400;
            font-size: 18px;
            padding-top: 10px;
            color: #352e2e;
            margin: 0
        }

        b {
            font-weight: 700
        }

        body {
            background-color: #fff;
            font-family: sans-serif, arial;
            font-size: 12.5px;
            text-align: center
        }

        #mainWrapper {
            width: 100%;
            margin: 0 auto;
            text-align: left
        }

        .column {
            -webkit-column-count: 4;
            -moz-column-count: 4;
            column-count: 4;
            background: #ddd;
            padding: 10px
        }

        @media screen and (max-width:500px) {
            .column {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2
            }
        }

        #postAnAd {
            float: right;
            padding-bottom: 1em;
            font-size: 18px;
            font-weight: 700
        }

        #footer {
            clear: both;
            margin-top: 1em;
            padding-top: 1em
        }

        #geoListings {
            position: relative;
            clear: both;
            margin: 0
        }

        a {
            color: #000
        }

        a:hover {
            color: #000;
            text-decoration: none
        }

        h3 {
            margin: 0;
            color: #000;
            font-size: 14px
        }

        h3 a {
            color: #000;
            text-decoration: none
        }

        h3 a:hover {
            color: #666
        }

        ul {
            margin: 0;
            padding: 0
        }

        li {
            padding-left: .5em;
            line-height: 1.2
        }

        .geoUnit {
            overflow: hidden;
            margin-bottom: .75em
        }

        .geoUnit {
            -webkit-column-break-inside: avoid;
            -moz-column-break-inside: avoid;
            -o-column-break-inside: avoid;
            -ms-column-break-inside: avoid;
            column-break-inside: avoid;
            page-break-inside: avoid
        }

        .geoUnit li {
            text-transform: capitalize
        }

        body#home[class] {
            background-color: #fff;
            font-family: sans-serif, verdana, arial, helvetica, helv, swiss, trebuchet ms;
            font-size: 1rem;
            text-align: center
        }

        #home[class] #mainWrapper {
            max-width: 980px;
            margin: 0 auto 12px;
            text-align: left
        }

        #home[class] #header {
            margin-bottom: 1em;
            padding-bottom: .5em;
            border-bottom: 2px solid #3563a8;
            font-weight: 700
        }

        #home[class] #postAnAd {
            float: right;
            padding-bottom: 1em;
            font-size: 18px
        }

        #home[class] #postAnAd a {
            color: #3563a8
        }

        #home[class] #footer {
            clear: both;
            margin-top: 1em;
            padding-top: 1em
        }

        #home[class] #footer div {
            padding-bottom: 1em;
            border-bottom: 2px solid #3563a8;
            color: #3563a8;
            font-size: 11px;
            font-weight: 700;
            text-align: center
        }

        #home[class] a {
            color: #0661d9;
            text-decoration: none
        }

        #home[class] a:hover {
            color: #b59a28;
            text-decoration: none
        }

        #home[class] h3 {
            margin: 0;
            font-size: 22px;
            text-decoration: underline
        }

        #home[class] h3 a {
            color: #0a0c22;
            text-decoration: none
        }

        #home[class] h3 a:hover {
            color: #666
        }

        #home[class] ul {
            margin: 5px 5px;
            padding: 0
        }

        #home[class] li {
            padding-left: .5em;
            margin: 0 0 0 1em;
            padding: 3px 0 2px 0;
            color: #136367;
            list-style-type: circle;
            font-size: 18px;
            font-weight: 600;
        }

        .geoUnit ul li a {
            font-size: 16px;
            font-weight: 500
        }

        #home[class] .geoUnit {
            overflow: hidden;
            margin-bottom: .75em;
            max-width: 150px;
            padding: 8px 0
        }

        #home[class] #geoListings:after,
        #home[class] #geoListings:before {
            content: "";
            display: table
        }

        #home[class] #geoListings:after {
            clear: both
        }

        #home[class] #geoListings {
            zoom: 1
        }

        #home[class] .column {
            width: 50%;
            float: left;
            background: #fff;
            box-sizing: border-box;
            zoom: 1;
            overflow: hidden;
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
            padding: 0;
            display: grid
        }

        #home[class] .geoBlock {
            padding: 2px 7px
        }

        #home[class] .geoBlock .geoUnit {
            min-width: 100%;
            -webkit-column-break-inside: avoid;
            -moz-column-break-inside: avoid;
            -o-column-break-inside: avoid;
            -ms-column-break-inside: avoid;
            column-break-inside: avoid;
            page-break-inside: avoid
        }

        #home[class] .geoBlock h2 {
            max-width: 100%;
            margin-top: 8px;
            margin-bottom: 8px;
            background-color: #1877F2;
            padding: 7.5px 10px;
            color: #fff;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px
        }

        #home[class] .geoBlock .inner {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            overflow: hidden
        }

        #home[class] .geoBlock .inner.showing {
            display: block
        }

        @media (max-width:860px) {
            #home[class] .geoBlock .inner {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2
            }
        }

        @media (max-width:600px) {
            .tab-content {
                max-height: 0
            }

            #home[class] .column {
                width: 100%;
                margin-left: 0
            }

            #home[class] #geoListings .united-states {
                position: static;
                margin-left: 0
            }

            #home[class] .geoBlock .inner {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2
            }
        }

        @media (max-width:480px) {
            #home[class] .column {
                width: 100%
            }

            #home[class] #geoListings .united-states {
                position: static;
                margin-left: 0
            }

            #home[class] .geoBlock .inner {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
                display: none;
                padding: 8px 4px
            }

            #home[class] .geoBlock h2 {
                margin-top: 2px;
                margin-bottom: 2px
            }

            #home[class] #geoListings {
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                background-color: #eae9fe
            }
        }

        @media (max-width:320px) {
            #home[class] .geoBlock .inner h3 {
                padding: 10px 0 5px 0
            }

            #home[class] .column {
                width: 100%
            }

            #home[class] .geoBlock .inner {
                -webkit-column-count: auto;
                -moz-column-count: auto;
                column-count: auto;
                padding: 8px 4px;
                display: none
            }

            #home[class] #geoListings .united-states {
                position: static;
                margin-left: 0
            }

            #home[class] .geoBlock h2 {
                margin-top: 2px;
                margin-bottom: 2px
            }

            #home[class] #geoListings {
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                background-color: #eae9fe
            }
        }

        #footer,
        #textNavFooter {
            clear: both;
            margin: 15px 5px;
            font-weight: 700;
            text-align: center;
            font-size: 15px
        }

        .footerDisclaimer {
            padding: 10px 10px;
            font-size: 14px;
            text-align: center;
            font-weight: 400
        }

        #home[class] .ie7 .geoBlock .inner ul li,
        #home[class] .ie8 .geoBlock .inner ul li,
        #home[class] .ie9 .geoBlock .inner ul li {
            padding-left: 1%;
            width: 30%;
            float: left;
            box-sizing: border-box
        }

        #home[class] .ie7 .column,
        #home[class] .ie8 .column,
        #home[class] .ie9 .column {
            width: 49.5%
        }

        #home[class] .ie9 #geoListings {
            min-width: 400px
        }

        #home[class] .ie7 #geoListings,
        #home[class] .ie8 #geoListings {
            min-width: 800px
        }

        .{{ config()->get('services.application.slugName') }}History {
            padding: 0 5px;
            margin: 20px 0
        }

        .historyBorder {
            border-radius: 10px;
            border-style: double;
            border-color: #136367
        }

        .ybp-article {
            background: beige;
            transition: max-height .25s;
            border-radius: 10px;
            font-family: sans-serif;
            max-height: 100%
        }

        .BP2019 {
            padding: 15px 0
        }

        .BP2019 p {
            margin: 10px 15px;
            line-height: 1.3
        }

        .BP2019H1 {
            font-size: 24px;
            padding: 5px 10px
        }

        .BP2019H3 {
            padding: 5px 10px;
            font-size: 20px
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 16px;
            font-weight: 700;
            border: none;
            outline: 0;
            background-color: rgba(245, 236, 64, .9);
            color: #c93939;
            cursor: pointer;
            padding: 10px;
            border-radius: 10px
        }

        #myBtn:hover {
            background-color: rgba(245, 236, 64, .8)
        }
    </style>
</head>

<body id="home" class="backpage">
    <div id="mainWrapper">
        <div id="header">
            <div id="header-home">
                <a href="/" style="margin-bottom: 20px; display: block"><img
                        src="{{ asset('assets/img/logo.png') }}"
                        alt="{{ config()->get('services.application.slugNameDomain') }}" width="300" /></a>
                <p>We are a backpage alternative where you can post classifieds for escorts, strippers, adult jobs,
                    body rubs, and more.</p>

                <br>
            </div>
            <div id="postAnAd">
                <a href="" rel="nofollow">Post Ad</a>
            </div>
            <div>Choose a location:</div>
        </div>
        @yield('home_content')
    </div>
    @include('partials.common.footer')

</body>

</html>
