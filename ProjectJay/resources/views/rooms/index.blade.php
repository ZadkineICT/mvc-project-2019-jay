@extends('layout.layout')

@section('content')

<h1 class="mt-5">Rooms</h1>

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('rooms.index') }}">List</a>
        </li>
        @can('edit rooms')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rooms.create') }}">Add </a>
        </li>
       @endcan
    </ul>
</nav>

<div class="table-responsive-sm">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr class="">
                <th>ID</th>
                <th>Room size</th>
                <th>Hotel id</th>
                <th>Hotel</th>
                <th>Roomtype</th>
                {{-- @hasrole('admin') --}}
                <th scope="lighter">Details</th>
                @can('edit rooms')
                <th scope="lighter">Edit</th>
                @endcan
                @can('delete rooms')
                <th scope="lighter">Delete</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->room_size }} personen</td>
                <td>{{ $room->hotel_id }}</td>
                <td>{{ $room->hotel->name_hotel }}</td>
                <td>{{ $room->roomtype->name }}</td>
                <td><a href="{{ route('rooms.show', $room) }}">Details</a></td>
                @can('edit rooms')
                <td><a href="{{ route('rooms.edit', $room) }}">Edit</a></td>
                @endcan
                @can('delete rooms')
                <td><a href="{{ route('rooms.delete', $room) }}">Delete</a></td>
                @endcan
                {{-- @endhasrole --}}
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection