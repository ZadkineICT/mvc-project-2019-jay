@extends('layout.layout')

@section('content')

<h1 class="mt-5">Room details</h1>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rooms.index') }}">List</a>
        </li>
        {{-- @hasrole('admin') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rooms.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
        {{-- @endhasrole --}}
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Room Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        <li class="list-group-item">
            Id
            <br>
            {{ $room->id }}
        </li>
        <li class="list-group-item">
            Room Name
            <br>
            {{ $room->room_size }}
        </li>
        <li class="list-group-item">
            Hotel ID
            <br>
            {{ $room->hotel_id }}
        </li>
    </ul>
</div>
@endsection