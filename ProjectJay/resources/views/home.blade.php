@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">

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
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>Hello {{ Auth::user()->name }}!</p>
                    <p><a href="{{ route('changePassword') }}">Change password</a></p>
                    @hasrole('client')
                    <a href="{{ route('reservationUserShow') }}">Reservations</a><br>
                    <a href="{{ route('reviewUserShow') }}">Reviews</a><br>
                    <a href="{{ route('favoriteUserShow') }}">Favorites</a>
                    @endhasrole
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
                            <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
