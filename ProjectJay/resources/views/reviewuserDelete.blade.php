@extends('layout.layout')

@section('content')

@php
    $user = Auth::user();
@endphp
@if ($review->user_id == $user->id) 
    <h1 class="mt-5">Delete review</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('reviewUserDestroy', $review) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label>Review Id</label>
            <input disabled type="text" class="form-control" name="id" value="{{ $review->id }}">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input disabled type="text" class="form-control" name="start" value="{{ $review->date }}">
        </div>
        <div class="form-group">
            <label>Message</label>
            <input disabled type="text" class="form-control" name="end" value="{{ $review->message }}">
        </div>
        <div class="form-group">
            <label>Stars</label>
            <input disabled type="text" class="form-control" name="number_of_persons" value="{{ $review->stars}} stars">
        </div>
        <div class="form-group">
            <label>Hotel</label>
            <input disabled type="text" class="form-control" name="user_id" value="{{ $review->hotel_id }}">
        </div>
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
@else   
    <div class="alert alert-danger" role="alert">
        <ul>
            <li>You do not have acces to this review!</li>
        </ul>
    </div>
@endif
@endsection