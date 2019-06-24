@extends('layout.layout')

@section('content')

<h1 class="mt-5">Delete room</h1>

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
                <a class="nav-link" href="{{ route('rooms.index') }}">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Delete </a>
            </li>
        </ul>
    </nav>

@can('edit rooms', 'delete rooms')
<form action="{{ route('rooms.destroy', $room) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label>Room Id</label>
        <input type="text" readonly class="form-control" name="id" value="{{ $room->id }}">
    </div>
    <div class="form-group">
        <label>Room size</label>
        <input type="text" readonly class="form-control" name="room_size" value="{{ $room->room_size }}">
    </div>
    <div class="form-group">
        <label>Hotel id</label>
        <input type="text" readonly name="hotel_id" class="form-control" value="{{ $room->hotel_id }}">
    </div>
    <div class="form-group">
        <label>Roomtype</label>
        <input type="text" readonly name="roomtype_id" class="form-control" value="{{ $room->roomtype_id }}">
    </div>
    <button type="submit" class="btn btn-danger">DELETE</button>
</form>
@endcan
@endsection