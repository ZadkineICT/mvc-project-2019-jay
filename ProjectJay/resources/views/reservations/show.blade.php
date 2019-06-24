@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Reservation details</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            @hasrole('owner|admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.index') }}">List</a>
            </li>
            @can('edit reservations')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.create') }}">Add </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Details </a>
            </li>
            @endcan
            @endhasrole
        </ul>
    </nav>

    <div class="card" style="width: 100%;">
        <div class="card-header">
            Reservation Details
        </div>
        <ul class="list-group list-group-flush" style="list-style-type: none">
            <li class="list-group-item">
                ID
                <br>
                {{ $reservation->id }}
            </li>
            <li class="list-group-item">
                Date start
                <br>
                {{ $reservation->start }}
            </li>
            <li class="list-group-item">
                Date end
                <br>
                {{ $reservation->end }}
            </li>
            <li class="list-group-item">
                Number of persons
                <br>
                {{ $reservation->number_of_persons }}
            </li>
            <li class="list-group-item">
                User
                <br>
                {{ $reservation->user_id }}
            </li>
            <li class="list-group-item">
                Room
                <br>
                {{ $reservation->room_id }}
            </li>
            <li class="list-group-item">
                Hotel
                <br>
                {{ $reservation->hotel_id }}
            </li>
        </ul>
    </div>
@endsection