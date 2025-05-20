<header>
    <nav>
        <ul class="nav-list">
            <li><a href="{{ route('home') }}">Sākums</a></li>

            @auth
                @if(auth()->user()->isTeacher())
                    {{-- Skolotājiem pieejamās saites --}}
                    <li><a href="{{ route('students.index') }}">Skolēni</a></li>
                    <li><a href="{{ route('students.create') }}">➕ Pievienot skolēnu</a></li>
                    <li><a href="{{ route('subjects.index') }}">Priekšmeti</a></li>
                    <li><a href="{{ route('subjects.create') }}">➕ Pievienot priekšmetu</a></li>
                    <li><a href="{{ route('grades.index') }}">Atzīmes</a></li>
                    <li><a href="{{ route('grades.create') }}">➕ Pievienot atzīmi</a></li>

                @elseif(auth()->user()->isStudent())
                    {{-- Skolēniem pieejamās saites --}}
                    <li><a href="{{ route('subjects.index') }}">Mani priekšmeti</a></li>
                    <li><a href="{{ route('grades.index') }}">Manas atzīmes</a></li>
                @endif

                {{-- Kopīga poga visiem lietotājiem --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Izrakstīties</button>
                    </form>
                </li>
            @else
                {{-- Viesiem --}}
                <li><a href="{{ route('login') }}">Pieslēgties</a></li>
                <li><a href="{{ route('register') }}">Reģistrēties</a></li>
            @endauth
        </ul>
    </nav>
</header>
