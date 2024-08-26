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

    <div class="container mx-auto">
        <h1 class="text-center text-4xl font-bold my-8">Candidates</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($candidates as $candidate)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}"
                        class="w-full h-48 object-cover rounded-md mb-4">
                    <h2 class="text-lg font-medium text-gray-900 text-center">{{ $candidate->name }}</h2>

                    <form action="{{ route('vote.store') }}" method="POST" class="text-center mt-4">
                        @csrf
                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                        <button type="submit" class="px-4 py-2 bg-[#00519c] text-white rounded">Vote</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <form action="{{ route('vote.logout') }}" method="POST" class="text-center mt-8">
        @csrf
        <button type="submit" class="px-4 py-2 bg-[#00519c] text-white rounded">Sign Out</button>
    </form>

</body>

</html>
