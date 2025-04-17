<x-layout title="Priekšmeti">
    <h1>Priekšmetu saraksts</h1>
    <ul>
        @foreach ($subjects as $subject)
            <li>
                {{ $subject->subject_name }}
                <a href="{{ route('subjects.edit', $subject) }}">Labot</a>
                <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Dzēst</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
