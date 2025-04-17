<x-layout title="Pievienot atzīmi">
    <h1>Pievienot atzīmi</h1>
    <form method="POST" action="{{ route('grades.store') }}">
        @csrf

        <label>Skolēns:</label>
        <select name="student_id" required>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
            @endforeach
        </select>

        <label>Priekšmets:</label>
        <select name="subject_id" required>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
            @endforeach
        </select>

        <label>Atzīme:</label>
        <input type="number" name="grade" min="1" max="10" required>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
