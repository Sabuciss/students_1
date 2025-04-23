<x-layout title="Pievienot skolēnu">
    <h1>Pievienot skolēnu</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <input type="text" name="first_name" placeholder="Vārds" value="{{ old('first_name') }}">
        <input type="text" name="last_name" placeholder="Uzvārds" value="{{ old('last_name') }}">

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
