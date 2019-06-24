@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add review</h1>

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
            <a class="nav-link active" href="{{ route('reviews.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create reviews')
<form action="{{ route('reviews.index') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message"></textarea>
    </div>
    <div class="form-group">
        <label>Stars</label>
        <input type="number" class="form-control" min="1" max="5" steps="1" name="stars">
    </div>
    <div class="form-group">
        <label>Hotel_id</label>
        <input type="text" class="form-control" name="hotel_id">
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
@endcan
@endsection