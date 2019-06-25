@extends('layout.layout')

@section('content')

@php
    $user = Auth::user();
@endphp
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
                <a class="nav-link active" href="{{ route('reservationUserShow') }}">List</a>
            </li>
        </ul>
    </nav>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Date start</th>
            <th scope="col">Date end</th>
            <th scope="col">Number of <br>persons</th>
            <th scope="col">Hotel</th>
            @can('delete reservations')
                <th scope="col lighter">Cancel</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->start}}</td>
                <td>{{ $reservation->end }}</td>
                <td>{{ $reservation->number_of_persons }}</td>
                <td>{{ $reservation->hotel->name_hotel }}</td>
                @can('delete reservations')
                    <td><a href="{{ route('reservationUserDelete', $reservation) }}">Cancel</a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection