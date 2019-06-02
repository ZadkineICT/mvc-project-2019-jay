{{-- THIS IS A TEST FILE --}}

@section('nav')
<ul>
    <li><a class="nav-left" href="/frontpage">Home</a></li>
    <li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
    <li><a class="nav-left" href="{{ route('rooms.show', '') }}">Rooms</a></li>

    <li><form action=""><input class="nav-mid" type="text" placeholder="Search"></form></li>

    <li><a class="nav-right" href="">Register</a></li>
    <li><a class="nav-right" href="">Login</a></li>
</ul>
@endsection 