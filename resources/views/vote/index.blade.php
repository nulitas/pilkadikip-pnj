<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        Hello, User!
    </h1>

    <form action="{{ route('vote.logout') }}" method="POST">
        @csrf
        <button type="submit" class=" px-4 py-2 bg-[#00519c] text-white rounded">Sign Out</button>
    </form>

</body>

</html>
