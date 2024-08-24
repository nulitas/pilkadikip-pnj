<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello {{ $username }}!
  </h1>

  <form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded">Sign Out</button>
  </form>
</body>
</html>
