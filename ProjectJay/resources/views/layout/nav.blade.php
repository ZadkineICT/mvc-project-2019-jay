{{-- THIS IS A TEST FILE --}}

@section('nav')
<li><a class="nav-left" href="/frontpage">Home</a></li>
<li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
@role('owner|admin')
<li><a class="nav-left" href="{{ route('rooms.show', '') }}">Rooms</a></li>
<li><a class="nav-left" href="{{ route('reservations.show', '') }}">Reservations</a></li>
<li><a class="nav-left" href="{{ route('employees.show', '') }}">Employees</a></li>
<li><a class="nav-left" href="{{ route('roomtypes.show', '') }}">Roomtypes</a></li>
<li><a class="nav-left" href="{{ route('reviews.show', '') }}">Reviews</a></li>
@endrole
@hasanyrole('admin|client')
<li><a class="nav-left" href="/home">User-home</a></li>
@endrole

<li><form action=""><input class="nav-mid" type="text" placeholder="Search"></form></li>

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
        <li class="nav-right nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
        </li>
        <li>
            <a class="nav-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest
@endsection 