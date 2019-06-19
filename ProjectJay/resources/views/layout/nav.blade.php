{{-- THIS IS A TEST FILE --}}

@section('nav')
<ul>
    <li><a class="nav-left" href="/frontpage">Home</a></li>
    <li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
    <li><a class="nav-left" href="{{ route('rooms.show', '') }}">Rooms</a></li>
    <li><a class="nav-left" href="{{ route('reservations.show', '') }}">Reservations</a></li>
    <li><a class="nav-left" href="{{ route('employees.show', '') }}">Employees</a></li>
    <li><a class="nav-left" href="{{ route('roomtypes.show', '') }}">Roomtypes</a></li>
    <li><a class="nav-left" href="{{ route('reviews.show', '') }}">Reviews</a></li>
    <li><a class="nav-left" href="/home">User-home</a></li>

        <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
            <li><form action="" method="GET"><input class="nav-mid" type="text" name="hotel" placeholder="Search" required/></form></li>
    </form>

    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group zoekbalk">
            <input type="text" class="form-control" name="q"
                   placeholder="Search for products by name or price..."> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
        </div>
    </form>





        <!-- Authentication Links -->
        @guest
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link nav-right" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link nav-right" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <div class="nav-right nav-item dropdown">
                <ul>
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}test
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>   
            </div>
        @endguest
</ul>
@endsection 