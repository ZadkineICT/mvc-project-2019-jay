@extends('layout.layout')

@section('content')

<h1 class="mt-5">Hotel details</h1>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.index') }}">List</a>
        </li>
        {{-- @hasrole('admin') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
        {{-- @endhasrole --}}
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Hotel Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        <li class="list-group-item">
            Id
            <br>
            {{ $hotel->id }}
        </li>
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