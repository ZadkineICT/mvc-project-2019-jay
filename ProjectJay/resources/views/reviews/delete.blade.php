@extends('layout.layout')

@section('content')

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

@can('edit reviews', 'delete reviews')
<form action="{{ route('reviews.destroy', $review) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label>Message</label>
        <textarea type="text" class="form-control" name="message">{{ $review->date }}</textarea>
    </div>
    <div class="form-group">
        <label>Stars</label>
        <input type="number" class="form-control" min="1" max="5" steps="1" name="stars" value="{{ $review->stars }}">
    </div>
    <div class="form-group">
        <label>Hotel id</label>
        <input type="text" name="hotel_id" class="form-control" value="{{ $review->hotel_id }}">
    </div>
    <button type="submit" class="btn btn-danger">DELETE</button>
</form>
@endcan
@endsection