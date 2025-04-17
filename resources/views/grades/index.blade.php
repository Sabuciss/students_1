<x-layout title="Atzīmes">
    <h1>Atzīmes</h1>
    <table>
        <thead>
            <tr>
                <th>Skolēns</th>
                <th>Priekšmets</th>
                <th>Atzīme</th>
                <th>Datums</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->student->first_name }} {{ $grade->student->last_name }}</td>
                    <td>{{ $grade->subject->subject_name }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>{{ $grade->date }}</td>
                    <td>
                        <a href="{{ route('grades.edit', $grade) }}">Labot</a>
                        <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
