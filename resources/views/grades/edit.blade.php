<x-layout title="Labot atzīmi">
    <h1>Labot atzīmi</h1>
    <form method="POST" action="{{ route('grades.update', $grade) }}">
        @csrf
        @method('PUT')

        <label>Skolēns:</label>
        <select name="student_id" required>
            @foreach ($students as $student)
                <option value="{{ $student->id }}" @selected($student->id === $grade->student_id)>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>

        <label>Priekšmets:</label>
        <select name="subject_id" required>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" @selected($subject->id === $grade->subject_id)>
                    {{ $subject->subject_name }}
                </option>
            @endforeach
        </select>

        <label>Atzīme:</label>
        <input type="number" name="grade" value="{{ $grade->grade }}" min="1" max="10" required>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
