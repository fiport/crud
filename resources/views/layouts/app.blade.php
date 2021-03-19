<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>CRUD | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}" />
</head>
<body>
    <div id="app">
        <index></index>
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
