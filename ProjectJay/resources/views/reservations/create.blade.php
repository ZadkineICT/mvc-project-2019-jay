@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Add reservation</h1>

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
            </li>\
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reservations.create') }}">Add </a>
            </li>
        </ul>
    </nav>
    <form action="{{ route('reservations.index') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Date start</label>
            <input type="text" class="form-control" name="start" value="">
        </div>
        <div class="form-group">
            <label>Date end</label>
            <input type="text" class="form-control" name="end" value="">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" value="">
        </div>
        <div class="form-group">
            <label>Number of persons</label>
            <input type="text" class="form-control" name="number_of_persons" value="">
        </div>
        <div class="form-group">
            <label>User</label>
            <input type="text" class="form-control" name="user_id" value="">
        </div>
        <div class="form-group">
            <label>Room</label>
            <input type="text" class="form-control" name="room_id" value="">
        </div>
        <div class="form-group">
            <label>Hotel</label>
            <input type="text" class="form-control" name="hotel_id" value="">
        </div>
        {{-- <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection