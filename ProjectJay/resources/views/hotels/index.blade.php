@extends('layout.layout')

@section('content')

<h1 class="mt-5">Hotels</h1>

@if (session('message'))
    <div class="alert alert-succes" role="alert">
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

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Zip code</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scope="col">Rooms</th>
            <th scope="col lighter">Details</th>
            @can('edit hotels')
            <th scope="col lighter">Edit</th>
            @endcan
            @can('delete hotels')
            <th scope="col lighter">Delete</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        <div class="admin-list">
            <ul class="row">
                @foreach($hotels as $hotel)
                <td class="ustify-content-around hotel-item-admin">
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->name_hotel }}</td>
                        <td>{{ $hotel->zip_code }}</td>
                        <td>{{ $hotel->address }}</td>
                        <td>{{ $hotel->city }}</td>
                        <td>{{ $hotel->country }}</td>
                        <td>{{ $rooms }}</td>
                        <td><a href="{{ route('hotels.show', $hotel) }}">Details</a></td>
                        @can('edit hotels')
                        <td><a href="{{ route('hotels.edit', $hotel) }}">Edit</a></td>
                        @endcan
                        @can('delete hotels')
                        <td><a href="{{ route('hotels.delete', $hotel) }}">Delete</a></td>
                        @endcan
                    </tr>
                </td>
                @endforeach
            </ul>
        </div>  
    </tbody>
</table>

@endsection