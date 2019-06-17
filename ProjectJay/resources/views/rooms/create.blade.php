@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add room</h1>

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
            <a class="nav-link " href="{{ route('rooms.index') }}">List</a>
        </li>
        @can('create rooms')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('rooms.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create rooms')
<form action="{{ route('rooms.index') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Room Size</label>
        <input type="number" class="form-control" name="room_size" min="1   " step="1" value="">
    </div>
    <div class="form-group">
        <label>Hotel</label>
        <select class="form-control" name="hotel_id">
            @foreach ($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Roomtypes</label>
        <select class="form-control" name="roomtype_id">
            @foreach ($roomtypes as $roomtype)
                <option value="{{ $roomtype->id }}">{{ $roomtype->id }} {{ $roomtype->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endcan
@endsection