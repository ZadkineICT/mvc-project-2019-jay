@extends('layout.layout')

@section('content')

<h1 class="mt-5">Favorites</h1>

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
            <a class="nav-link active" href="{{ route('favorites.index') }}">List</a>
        </li>
    </ul>
</nav>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User</th>
            <th scope="col">Hotel</th>
        </tr>
    </thead>
    <tbody>
        @foreach($favorites as $favorite)
        <tr>
            <td scope="row">{{ $favorite->id }}</td>
            <td>{{ $favorite->user->name }}</td>
            <td>{{ $favorite->hotel->name_hotel }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection