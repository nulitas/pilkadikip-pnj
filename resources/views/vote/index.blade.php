<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilkadikip PNJ</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans bg-gray-100">
    <header class="bg-blue-900 text-white py-4">
        <h1 class="text-3xl font-bold text-center">Selamat datang di tempat voting</h1>
    </header>


    <main class="container mx-auto mt-8">
        <h1 class="text-center text-4xl font-bold my-8">Candidates</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($candidatesByPosition as $positionName => $candidates)
            <div class="my-8">
                <h2 class="text-2xl font-bold mb-4">{{ $positionName }}</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($candidates as $candidate)
                        @php
                            $currentVoteCount = $voteCountsByPosition[$candidate->position->id] ?? 0;
                            $maxVoteReached = $currentVoteCount >= $candidate->position->max_vote;
                        @endphp
                        <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:translate-y-[-5px] hover:shadow-lg cursor-pointer candidate-card"
                            data-candidate="{{ json_encode($candidate) }}">
                            <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}"
                                class="w-full h-48 object-cover rounded-md mb-4">
                            <h3 class="text-lg font-medium text-gray-900 text-center">{{ $candidate->name }}</h3>

                            <form action="{{ route('vote.store') }}" method="POST" class="text-center mt-4">
                                @csrf
                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                <input type="hidden" name="position_id" value="{{ $candidate->position->id }}">

                                @if (in_array($candidate->position->id, $votedPositions) || $maxVoteReached)
                                    <button type="button"
                                        class="px-4 py-2 text-white bg-gray-500 rounded cursor-not-allowed"
                                        disabled>{{ $maxVoteReached ? 'Max Votes Reached' : 'Voted' }}</button>
                                @else
                                    <button type="submit"
                                        class="px-4 py-2 text-white bg-blue-900 rounded hover:bg-blue-800 transition-colors">Vote</button>
                                @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </main>

    <footer class="text-center mt-8">
        <form action="{{ route('vote.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600 transition-colors">Sign Out</button>
        </form>
    </footer>

    <!-- Modal -->
    <div id="candidateModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3 p-6">
            <h2 class="text-2xl font-bold mb-4" id="modalCandidateName"></h2>
            <h4 class="text-lg font-bold">Mission:</h4>
            <p id="modalCandidateMission"></p>
            <h4 class="text-lg font-bold mt-4">Vision:</h4>
            <p id="modalCandidateVision"></p>
            <button id="closeModal"
                class="mt-6 px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-800 transition-colors">Close</button>
        </div>
    </div>

    <script>
        const modal = document.getElementById('candidateModal');


        document.querySelectorAll('.candidate-card').forEach(card => {
            card.addEventListener('click', function() {
                const candidate = JSON.parse(this.getAttribute('data-candidate'));
                document.getElementById('modalCandidateName').innerText = candidate.name;
                document.getElementById('modalCandidateMission').innerText = candidate.mission;
                document.getElementById('modalCandidateVision').innerText = candidate.vision;

                modal.classList.remove('opacity-0', 'pointer-events-none');
            });
        });


        document.querySelectorAll('.candidate-card form button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });


        document.getElementById('closeModal').addEventListener('click', function() {
            modal.classList.add('opacity-0', 'pointer-events-none');
        });
    </script>

</body>

</html>
