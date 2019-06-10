@extends('layout.layout')

@section('content')

<h1 class="mt-5">Roomtype details</h1>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roomtypes.index') }}">List</a>
        </li>
        @can('edit roomtypes')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roomtypes.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
       @endcan
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Roomtype Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        <li class="list-group-item">
            Id
            <br>
            {{ $roomtype->id }}
        </li>
        <li class="list-group-item">
            Name
            <br>
            {{ $roomtype->name }}
        </li>
        <li class="list-group-item">
            Price
            <br>
            {{ $roomtype->price }}
        </li>
    </ul>
</div>
@endsection