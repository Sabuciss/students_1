<x-layout title="Labot priekšmetu">
    <h1>Labot priekšmetu</h1>
    <form method="POST" action="{{ route('subjects.update', $subject) }}">
        @csrf
        @method('PUT')
        <input type="text" name="subject_name" value="{{ $subject->subject_name }}" required>
        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
