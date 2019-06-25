@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add favorite</h1>

@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('favorites.index') }}">List</a>
        </li>
        @can('create favorites')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('favorites.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create favorites')
<form action="{{ route('favorites.index') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>User</label>
        <select class="form-control" name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Hotel</label>
        <select class="form-control" name="hotel_id">
            @foreach ($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endcan
@endsection