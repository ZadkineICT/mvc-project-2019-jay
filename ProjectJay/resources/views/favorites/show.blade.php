@extends('layout.layout')

@section('content')

<h1 class="mt-5">Favorite details</h1>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('favorites.index') }}">List</a>
        </li>
        @can('edit favorites')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('favorites.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details</a>
        </li>
       @endcan
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Favorite Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        <li class="list-group-item">
            Id
            <br>
            {{ $favorite->id }}
        </li>
        <li class="list-group-item">
            User
            <br>
            {{ $favorite->user->name }}
        </li>
        <li class="list-group-item">
            Hotel
            <br>
            {{ $favorite->hotel->name_hotel }}
        </li>
    </ul>
</div>
@endsection