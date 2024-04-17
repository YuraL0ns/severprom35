<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} - @yield('page_title')</title>
    @vite(['resources/sass/new.scss', 'resources/js/new.js'])
</head>
<body>
<div class="user-wrapper">
    <div class="user-login-page">

        <div class="logo">
            <img src="{{asset('images/logo/logo-new.svg')}}" alt="{{env('APP_NAME')}}">
        </div>

    </div>
    <div class="user-login">
        <h1>@yield('form_name')</h1>
@yield('content')
    </div>

</div>
</body>
</html>
