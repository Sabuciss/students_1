<x-layout>
  <x-slot:title>
    Login
  </x-slot:title>

  <h1>Logins</h1>

  <form method="POST" action="{{ route('login.store') }}">
    @csrf

    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <label for="email">E-pasts</label>
    <input name="email" type="email" required><br>

    <label for="password">Parole</label>
    <input name="password" type="password" required><br>

    <button type="submit">Pieteikties</button>
  </form>

</x-layout>
