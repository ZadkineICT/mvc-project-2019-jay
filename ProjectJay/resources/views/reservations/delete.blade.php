@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Delete reservation</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('edit reservations', 'delete reservations')
    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label>Reservation Id</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->id }}">
        </div>
        <div class="form-group">
            <label>Date start</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->start }}">
        </div>
        <div class="form-group">
            <label>Date end</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->end }}">
        </div>
        <div class="form-group">
            <label>Number of persons</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->number_of_persons }}">
        </div>
        <div class="form-group">
            <label>User id</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->user_id }}">
        </div>
        @can('edit reservations')
        <div class="form-group">
            <label>Room</label>
            <input type="text" class="form-control" name="id" value="{{ $reservation->room_id }}">
        </div>
        @endcan
        <div class="form-group">
            <label>Hotel</label>
            <input type="text" name="hotel_id" class="form-control" value="{{ $reservation->hotel_id }}">
        </div>
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
@endcan
@endsection