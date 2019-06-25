@extends('layout.layout')

@section('content')
    <h1 class="mt-5">Favorite Hotel</h1>

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
                <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
        </ul>
    </nav>

    <div class="hotel-list">
        <br>
        <div class="row">
            @foreach($favorites as $favorite)
                @foreach($hotels as $hotel)
                    @if($hotel->id == $favorite->hotel_id)
                        <div class="col-lg-4 col-md-6 col-12 justify-content-around">
                            <div class="hotel-item">
                                <ul>
                                    <a href="{{ route('hotels.show', $hotel) }}">
                                        <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                                        <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                                        <li class="hotel-item-country">{{ $hotel->country }}</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div> 
@endsection