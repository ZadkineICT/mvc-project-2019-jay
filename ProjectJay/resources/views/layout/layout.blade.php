@include('layout.nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('scss/main.scss') }}" rel="stylesheet">
    <title>Laravel Book project </title>
</head>
<body>
<nav>
    @yield('nav')
</nav>
<aside>
@yield('aside-filter')
</aside>
<main role="main">
    @yield('popular')
    @yield('hotel-list')
    @yield('content')
</main>      
</body>