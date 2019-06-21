@include('layout.nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
    crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Hotel Jay </title>
</head>
<body>
<nav>
    @yield('nav')
</nav>
{{--<aside>--}}
    {{--@yield('aside-filter')--}}
{{--</aside>--}}
<main role="main">
    @yield('popular')
    @yield('hotel-list')
    @yield('content')
</main>   
</body>