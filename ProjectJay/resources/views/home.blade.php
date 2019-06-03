@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
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
                        </ul>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
