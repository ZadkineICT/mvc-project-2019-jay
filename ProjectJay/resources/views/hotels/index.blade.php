@extends('layout.layout')

@section('content')

<h1 class="mt-5">Hotels</h1>

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
            <a class="nav-link active" href="{{ route('hotels.index') }}">List</a>
        </li>
        @can('edit hotels')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>

<div class="table-responsive-lg">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Hotel Name</th>
                <th >Zip code</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                @can('create rooms')
                <th>Rooms</th>
                @endcan
                <th>Details</th>
                @can('edit hotels')
                <th>Edit</th>
                @endcan
                @can('delete hotels')
                <th>Delete</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name_hotel }}</td>
                    <td>{{ $hotel->zip_code }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->country }}
                    @can('create rooms')
                    <td><a href="{{ route('rooms.create', ['hotel'=>$hotel->id]) }}">Add Room</a></td>
                    @endcan
                    <td><a href="{{ route('hotels.show', $hotel) }}">Details</a></td>
                    @can('edit hotels')
                    <td><a href="{{ route('hotels.edit', $hotel) }}">Edit</a></td>
                    @endcan
                    @can('delete hotels')
                    <td><a href="{{ route('hotels.delete', $hotel) }}">Delete</a></td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection