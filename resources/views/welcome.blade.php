<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="top-right links">

        <li><a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('customer.login') }}">{{ __('Customer Login') }}</a></li>

    </div>

    <div class="top-left links">

        <li><a class="nav-link" href="{{  url("/ar") }}">Ar</a></li>
        <li><a class="nav-link" href="{{ url("/en")  }}">En</a></li>

    </div>


    <div class="content">
        <h3> {{ trans('main.homepage') }}</h3>
        <h3>{{ trans('main.aboutus') }}</h3>
        <h3>{{ trans('main.test') }}</h3>
        <h3> {{ trans('main.middlename') }}</h3>
        <h3> {{ trans('main.firstname') }} </h3>
        <h3> {{ trans('main.contactus') }} </h3>
        <br>
        <div class="title m-b-md">
            @if(app()->getLocale()=="en")
                {{ option('website_name_en') }}
            @else
                {{ option('website_name_ar') }}
            @endif
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
