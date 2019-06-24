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
            @hasrole('owner|admin')
            <li class="nav-item">
                <a class="nav-link " href="{{ route('reservations.index') }}">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('reservations.create') }}">Add </a>
            </li>
            @endrole
        </ul>
    </nav>
    <form action="{{ route('reservations.index') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Date start</label>
            <input type="date" class="form-control" name="start" value="date">
        </div>
        <div class="form-group">
            <label>Date end</label>
            <input type="date" class="form-control" name="end" value="date">
        </div>
        <div class="form-group">
            <label>Number of persons</label>
            <input type="number" class="form-control" name="number_of_persons" min="1" max="6" step="1" value="">
        </div>
        @can('edit reservations')
        <div class="form-group">
            <label>Room</label>
            <input type="text" class="form-control" name="room_id" value="">
        </div>
        @endcan
        <div class="form-group">
            <label>Hotel</label>
            <select class="form-control" name="hotel_id">
                @if (isset($_GET['hotel']));
                @php
                    print_r($_GET['hotel']);
                @endphp
                @foreach ($hotels as $hotel)
                    @if ($hotel->id == $_GET['hotel'] )
                        <option readonly value="{{ $hotel->id }} ">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
                        @php
                            $current = $hotel->id;
                        @endphp
                        @break
                    @endif
                @endforeach
                @else
                    @php
                        $current = "";
                    @endphp
                    @foreach ($hotels as $hotel)
                        @if ($hotel->id != $current)
                            <option value="{{ $hotel->id }}">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
                        @endif
                    @endforeach
                @endif
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
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection