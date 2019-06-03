@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reservations</h1>

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
                <a class="nav-link active" href="{{ route('reservations.index') }}">List</a>
            </li>
            {{-- @hasrole('admin') --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.create') }}">Add </a>
            </li>
            {{-- @endhasrole --}}
        </ul>
    </nav>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date start</th>
            <th scope="col">Date end</th>
            <th scope="col">Price</th>
            <th scope="col">Number of persons</th>
            <th scope="col">User</th>
            <th scope="col">Room</th>
            <th scope="col">Hotel</th>

            {{-- @hasrole('admin') --}}
            <th scope="col lighter">Details</th>
            <th scope="col lighter">Edit</th>
            <th scope="col lighter">Delete</th>
            {{-- @endhasrole --}}
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td scope="row">{{ $reservation->id }}</td>
                <td>{{ $reservation->start}}</td>
                <td>{{ $reservation->end }}</td>
                <td>{{ $reservation->price }}</td>
                <td>{{ $reservation->number_of_persons }}</td>
                <td>{{ $reservation->user_id}}</td>
                <td>{{ $reservation->room_id }}</td>
                <td>{{ $reservation->hotel_id }}</td>


                <td><a href="{{ route('reservations.show', $reservation) }}">Details</a></td>
                {{-- @hasrole('admin') --}}
                <td><a href="{{ route('reservations.edit', $reservation) }}">Edit</a></td>
                <td><a href="{{ route('reservations.delete', $reservation) }}">Delete</a></td>
                {{-- @endhasrole --}}
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection