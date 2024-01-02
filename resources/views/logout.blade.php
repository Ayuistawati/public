<!-- logout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <div>
        <h1>Logout</h1>
        <p>{{ session('message') }}</p>
        <form action="{{ url('/') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <p>or</p>
        <a href="{{ url('/') }}">Login</a>
    </div>
</body>
</html>
