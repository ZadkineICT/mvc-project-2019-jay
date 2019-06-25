@extends('layout.layout')

@section('content')

    <div class="hotel-list">
        <h1>Zoekresultaten</h1>
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Hotels</h2>
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-lg-4 col-md-6 col-12 justify-content-around">
                    <div class="hotel-item">
                        <ul>
                                <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                                <a href="{{ route('hotels.show', $hotel) }}">
                                <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                                </a>
                                <li class="hotel-item-country">{{ $hotel->country }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
                @if (count ( $hotels  ) == 0)
                    <div class="alert alert-danger" role="alert">
                       <p>Cannot find hotels</p>
                    </div>
                @endif
        </div>
    </div>

@endsection