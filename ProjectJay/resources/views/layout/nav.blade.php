{{-- THIS IS A TEST FILE --}}

@section('nav')
<ul>
    <li><a class="nav-left" href="/frontpage">Home</a></li>
    <li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
    <li><a class="nav-left" href="{{ route('rooms.show', '') }}">Rooms</a></li>
    <li><a class="nav-left" href="{{ route('reservations.show', '') }}">Reservations</a></li>
    <li><a class="nav-left" href="/home">User-home</a></li>

    <li><form action=""><input class="nav-mid" type="text" placeholder="Search"></form></li>

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
</ul>
@endsection 