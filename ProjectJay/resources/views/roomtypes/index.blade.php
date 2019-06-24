@extends('layout.layout')

@section('content')

<h1 class="mt-5">Roomtypes</h1>

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('roomtypes.index') }}">List</a>
        </li>
        @can('edit roomtypes')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roomtypes.create') }}">Add </a>
        </li>
       @endcan
    </ul>
</nav>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            {{-- @hasrole('admin') --}}
            <th scope="col lighter">Details</th>
            @can('edit roomtypes')
            <th scope="col lighter">Edit</th>
            @endcan
            @can('delete roomtypes')
            <th scope="col lighter">Delete</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($roomtypes as $roomtype)
        <tr>
            <td scope="row">{{ $roomtype->id }}</td>
            <td>{{ $roomtype->name }}</td>
            <td>{{ $roomtype->price }}</td>
            <td><a href="{{ route('roomtypes.show', $roomtype) }}">Details</a></td>
            @can('edit roomtypes')
            <td><a href="{{ route('roomtypes.edit', $roomtype) }}">Edit</a></td>
            @endcan
            @can('delete roomtypes')
            <td><a href="{{ route('roomtypes.delete', $roomtype) }}">Delete</a></td>
            @endcan
            {{-- @endhasrole --}}
        </tr>
        @endforeach
    </tbody>
</table>

@endsection