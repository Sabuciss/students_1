<x-layout>
  <x-slot:title>
    Sveikiņiii
  </x-slot:title>

  <h1>Sveiki, laipni lūgti!</h1>

  @auth
      <p>Čau, {{ auth()->user()->first_name }}!</p>

      @if(auth()->user()->role === 'teacher')
          <a href="{{ route('students.index') }}">Skatīt visus skolēnus</a><br>
          <a href="{{ route('subjects.index') }}">Skatīt priekšmetus</a><br>
          <a href="{{ route('grades.index') }}">Skatīt atzīmes</a><br>
      @elseif(auth()->user()->role === 'student')
          <a href="{{ route('students.show', auth()->user()->id) }}">Skatīt manu profilu un atzīmes</a><br>
      @endif

      <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
          @csrf
          <button type="submit">Izrakstīties</button>
      </form>

  @else
      <a href="{{ route('login') }}">Ieiet sistēmā</a><br><br>
      <a href="{{ route('register') }}">Reģistrēties</a>
  @endauth

</x-layout>
