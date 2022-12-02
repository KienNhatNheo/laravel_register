<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($edit as $item)
    <form action="{{ route('handleedit') }}" method="POST">
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="text" name="name" value="{{ $item->name }}"><br>
        <input type="text" name="class" value="{{ $item->class }}"><br>
        <input type="text" name="age" value="{{ $item->age }}"><br>
        <input type="submit">
        @csrf  
    </form>
    @endforeach
</body>
</html>