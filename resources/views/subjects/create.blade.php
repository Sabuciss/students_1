<x-layout title="Pievienot priekšmetu">
    <h1>Pievienot priekšmetu</h1>
    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf
        <input type="text" name="subject_name" placeholder="Priekšmeta nosaukums" required>
        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
