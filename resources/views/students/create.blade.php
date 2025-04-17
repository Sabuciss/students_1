<x-layout title="Pievienot skolēnu">
    <h1>Pievienot skolēnu</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <input type="text" name="first_name" placeholder="Vārds">
        <input type="text" name="last_name" placeholder="Uzvārds">
        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
