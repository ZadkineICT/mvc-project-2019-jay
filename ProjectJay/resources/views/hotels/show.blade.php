@extends('layout.layout')

@section('content')

<h1 class="mt-5">Hotel details</h1>

<style>
    body {
        color:black;
    }
</style>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.index') }}">List</a>
        </li>
        @can('edit hotels')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
        @endcan
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Hotel Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        @hasrole('owner|admin')
        <li class="list-group-item">
            Id
            <br>
            {{ $hotel->id }}
        </li>
        @endhasrole
        <li class="list-group-item">
            Hotel Name
            <br>
            {{ $hotel->name_hotel }}
        </li>
        <li class="list-group-item">
            Address
            <br>
            {{ $hotel->address }}
        </li>
        <li class="list-group-item">
            City
            <br>
            {{ $hotel->city}}
        </li>
        <li class="list-group-item">
            Country
            <br>
            {{ $hotel->country}}
        </li>
        <li class="list-group-item">
            Phone Number
            <br>
            {{ $hotel->phone_number}}
        </li>
    </ul>
</div>
@endsection