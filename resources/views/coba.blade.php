<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    ini halaman coba

    <form action="{{ route('coba.store') }}" method="post">
        @csrf
        <input type="text" name="coba" required>
        <input type="submit" value="simpan">
    </form>

    <ul>
        @foreach ($coba as $c)
            <li>{{ $c->coba }}</li>
        @endforeach
    </ul>
</body>

</html>
