<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->


<!-- Latest compiled and minified JavaScript -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="app-header"><a href="/"> PeopleApp </a></h1> 
        <div class="row">
            <div class="center col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>