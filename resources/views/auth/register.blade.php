<x-layout>
  <x-slot:title>
    Register
  </x-slot:title>

  <h1>Register</h1>

  <form method="POST" action="{{ route('register.store') }}">
    @csrf

    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <label for="first_name">Vārds</label>
    <input name="first_name" required><br>

    <label for="last_name">Uzvārds</label>
    <input name="last_name" required><br>

    <label for="email">E-pasts</label>
    <input name="email" type="email" required><br>

    <label for="password">Parole</label>
    <input name="password" type="password" required><br>

    <!-- Piešķiram lomu -->
    <label for="role">Loma</label>
    <select name="role" required>
      <option value="student">Student</option>
      <option value="teacher">Teacher</option>
    </select><br>

    <button type="submit">Saglabāt</button>
  </form>
</x-layout>
