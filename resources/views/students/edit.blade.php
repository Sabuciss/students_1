<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf
    @method('PUT')
    ...
</form>
