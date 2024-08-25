<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vote Login</title>
</head>

<body>
    <h1>Guest Login</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vote.login') }}" method="POST">
        @csrf
        <div>
            <label for="student_id">NIM:</label>
            <input type="number" name="student_id" id="student_id" value="{{ old('student_id') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>
