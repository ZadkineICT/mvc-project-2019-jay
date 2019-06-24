@extends('layout.layout')

@section('content')

<h1 class="mt-5">Edit room</h1>

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
        @can('edit hotels')
        <li class="nav-item">
            <a class="nav-link active" href="">Edit </a>
        </li>
        @endcan
    </ul>
</nav>

@can('edit rooms')
<form method="POST" action="{{ route('rooms.update', $room) }}">
    @csrf
    @method('PUT ')
    <div class="form-group">
        <label>Room Size</label>
        <input type="text" class="form-control" name="room_size" value="{{ $room->room_size }}">
    </div>
    <div class="form-group">
        <label>Hotel</label>
        <select class="form-control" name="hotel_id">
            <?php $option = 0; ?>
            @foreach($hotels as $hotel);
                <option value="{{ $room->hotel_id }} "> >> {{ $room->hotel->id }} {{ $room->hotel->name_hotel }}</option>
                <?php $option++; 
                    $current = $room->hotel_id;
                ?>
                @if ($option > 0)
                    @break
                @endif
            @endforeach
    
            @foreach ($hotels as $hotel)
                @if ($hotel->id != $current) 
                <option value="{{ $hotel->id }}">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Roomtype</label>
        <select class="form-control" name="roomtype_id">
            <?php $option = 0; ?>
            @foreach($roomtypes as $roomtype);
                <option value="{{ $room->roomtype_id }} "> >> {{ $room->roomtype->id }} {{ $room->roomtype->name }}</option>
                <?php $option++; 
                    $current = $room->roomtype_id;
                ?>
                @if ($option > 0)
                    @break
                @endif
            @endforeach
    
            @foreach ($roomtypes as $roomtype)
                @if ($roomtype->id != $current) 
                <option value="{{ $roomtype->id }}">{{ $roomtype->id }} {{ $roomtype->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    {{-- <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div> --}}
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endcan
@endsection