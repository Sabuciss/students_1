<x-layout title="Skolēnu saraksts">
    <h1>Skolēni</h1>
    <ul>
        @foreach ($students as $student)
            <li>
                {{ $student->first_name }} {{ $student->last_name }}
                <a href="{{ route('students.edit', $student) }}">Labot</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Dzēst</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
