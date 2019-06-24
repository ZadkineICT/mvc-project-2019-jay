@extends('layout.layout')

@section('content')

<h1 class="mt-5">Edit reviews</h1>

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
            <a class="nav-link " href="{{ route('reviews.index') }}">List</a>
        </li>
        @can('create reviews')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.create') }}">Add </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link active" href="">Edit </a>
        </li>
    </ul>
</nav>

@can('edit reviews')
<form method="POST" action="{{ route('reviews.update', $review) }}">
    @csrf
    @method('PUT ')
    <div class="form-group">
        <input type="hidden" class="form-control" name="date" value="{{ $review->date }}">
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea type="text" class="form-control" name="message">{{ $review->message }}</textarea>
    </div>
    <div class="form-group">
        <label>Stars</label>
        <input type="number" class="form-control" min="1" max="5" steps="1" name="stars" value="{{ $review->stars }}">
    </div>
    <div class="form-group">
        <label>Hotel id</label>
        <input type="text" readonly name="hotel_id" class="form-control" value="{{ $review->hotel_id }}">
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