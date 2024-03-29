@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Edit reservation</h1>

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
                <a class="nav-link " href="{{ route('reservations.index') }}">List</a>
            </li>
            @can('create reservations')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.create') }}">Add </a>
            </li>
            @endcan
            @can('edit reservations')
            <li class="nav-item">
                <a class="nav-link active" href="">Edit </a>
            </li>
            @endcan
            {{-- @endhasrole --}}
        </ul>
    </nav>
    @can('edit reservations')
    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
        @csrf
        @method('PUT ')
        <div class="form-group">
            <label>Date start</label>
            <input type="text" class="form-control" name="start" value="{{ $reservation->start}}">
        </div>
        <div class="form-group">
            <label>Date end</label>
            <input type="text" class="form-control" name="end" value="{{ $reservation->end}}">
        </div>
        <div class="form-group">
            <label>Number of persons</label>
            <input type="text" class="form-control" name="number_of_persons" value="{{ $reservation->number_of_persons}}">
        </div>
        <div class="form-group">
            <label>User</label>
            <input type="text" class="form-control" name="user_id" value="{{ $reservation->user_id}}">
        </div>
        <div class="form-group">
            <label>Room</label>
            <input type="text" class="form-control" name="room_id" value="{{ $reservation->room_id}}">
        </div>
        <div class="form-group">
            <label>Hotel</label>
            <input type="text" name="hotel_id" class="form-control" value="{{ $reservation->hotel_id }}">
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