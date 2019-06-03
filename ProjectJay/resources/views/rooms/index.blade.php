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
        {{-- @hasrole('admin') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rooms.create') }}">Add </a>
        </li>
        {{-- @endhasrole --}}
    </ul>
</nav>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Room size</th>
            <th scope="col">Hotel id</th>
            <th scope="col">Hotel</th>
            {{-- @hasrole('admin') --}}
            <th scope="col lighter">Details</th>
            <th scope="col lighter">Edit</th>
            <th scope="col lighter">Delete</th>
            {{-- @endhasrole --}}
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td scope="row">{{ $room->id }}</td>
            <td>{{ $room->room_size }} personen</td>
            <td>{{ $room->hotel_id }}</td>
            <td>{{ $room->hotel->name_hotel }}</td>
            <td><a href="{{ route('rooms.show', $room) }}">Details</a></td>
            {{-- @hasrole('admin') --}}
            <td><a href="{{ route('rooms.edit', $room) }}">Edit</a></td>
            <td><a href="{{ route('rooms.delete', $room) }}">Delete</a></td>
            {{-- @endhasrole --}}
        </tr>
        @endforeach
    </tbody>
</table>

@endsection