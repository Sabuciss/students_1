<x-layout title="Skolēnu atzīmes">
    <h1>Skolēnu atzīmes</h1>

    {{-- Filtrēšanas forma --}}
 @can('isTeacher')
    {{-- Filtrēšanas forma --}} 
    <form method="GET" action="{{ route('grades.index') }}">
        {{-- Skolēnu izvēle --}}
        <select name="student_id">
            <option value="">Izvēlieties skolēnu</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>

        {{-- Priekšmeta izvēle --}}
        <select name="subject_id">
            <option value="">Izvēlieties priekšmetu</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->subject_name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filtrēt</button>
    </form>

    <hr>

    {{-- Atzīmju saraksts --}}
    @foreach ($grades as $grade)
        <h3>{{ $grade->student->first_name }} {{ $grade->student->last_name }} - {{ $grade->subject->subject_name }}</h3>
        <p>Atzīme: {{ $grade->grade }}</p>
        <a href="{{ route('grades.edit', $grade) }}">Rediģēt</a> | 
        <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Dzēst</button>
        </form>
        <hr>
    @endforeach
</x-layout>
