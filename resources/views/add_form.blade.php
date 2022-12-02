<form action="{{ route('handleadd') }}" method="POST">
    <input type="text" name="name"><br>
    <input type="text" name="class"><br>
    <input type="text" name="age"><br>
    <input type="submit">
    @csrf
</form>