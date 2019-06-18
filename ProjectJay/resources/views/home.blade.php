@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>Hello {{ Auth::user()->name }}!</p>
                </div>
            </div>
            <br>
            @can('create hotels', 'create rooms')
            <div class="card">
                <div class="card-header">Tables</div>

                <div class="card-body">
                    <div class="links">
                        <ul>
                            <li><a href="{{ route('hotels.index') }}">Hotels</a></li>
                            <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
                            <li><a href="{{ route('reservations.index') }}">Reservations</a></li>
                            <li><a href="{{ route('employees.index') }}">Employees</a></li>
                            <li><a href="{{ route('roomtypes.index') }}">Roomtypes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
