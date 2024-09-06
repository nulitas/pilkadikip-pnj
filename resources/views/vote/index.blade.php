<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilkadikip PNJ</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans bg-white flex flex-col min-h-screen">
    <header
        class="bg-white text-[#ff4689] py-4 flex flex-col md:flex-row items-center justify-between px-4 md:px-8 space-y-4 md:space-y-0">
        <div class="text-center md:text-left">
            <h1 class="text-lg md:text-xl font-bold">Pemilihan Ketua Umum KIP Kuliah Politeknik Negeri Jakarta</h1>
        </div>
        <div
            class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 justify-center md:justify-end">
            <div class="flex space-x-4">
                <img src="{{ asset('logo_pnj.png') }}" alt="Logo 1" class="h-8 md:h-10">
                <img src="{{ asset('logo_pilkadiksi.png') }}" alt="Logo 2" class="h-8 md:h-10">
                <img src="{{ asset('logo_formadiksi.png') }}" alt="Logo 3" class="h-8 md:h-10">
            </div>
            <form action="{{ route('vote.logout') }}" method="POST" class="md:ml-4">
                @csrf
                <button type="submit" class="bg-[#ff4689] text-white px-4 py-2 rounded-full font-bold">Sign
                    Out</button>
            </form>
        </div>
    </header>

    <main class="container mx-auto mt-8 px-4 flex-grow">
        <h1 class="text-center text-2xl font-bold rounded-md py-2 bg-[#ff4689] text-white">
            Calon Ketua UMUM KIP-Kuliah & Campaign Manager
        </h1>

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
            <div class="my-8 flex justify-center">
                <div class="flex flex-wrap justify-center gap-6">
                    @php
                        $hasVotedForPosition = in_array($candidates[0]->position->id, $votedPositions);
                    @endphp

                    @if ($hasVotedForPosition)
                        <div class="p-4 flex justify-center items-center">
                            <h3 class="text-lg font-medium text-gray-900">Terima kasih sudah memilih!</h3>
                        </div>
                    @else
                        @foreach ($candidates as $candidate)
                            @php
                                $currentVoteCount = $voteCountsByPosition[$candidate->position->id] ?? 0;
                                $maxVoteReached = $currentVoteCount >= $candidate->position->max_vote;
                            @endphp

                            <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:translate-y-[-5px] hover:shadow-lg cursor-pointer candidate-card"
                                data-candidate="{{ json_encode($candidate) }}">
                                <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}"
                                    class="w-full h-96 object-cover rounded-md mb-4">
                                <h3 class="text-lg font-medium text-gray-900 text-center">{{ $candidate->name }}</h3>

                                <form action="{{ route('vote.store') }}" method="POST" class="text-center mt-4">
                                    @csrf
                                    <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                    <input type="hidden" name="position_id" value="{{ $candidate->position->id }}">

                                    @if ($maxVoteReached)
                                        <button type="button"
                                            class="px-4 py-2 text-white bg-[#771d3e] rounded cursor-not-allowed"
                                            disabled>Jumlah Pemilih Sudah Maksimal</button>
                                    @else
                                        <button type="submit"
                                            class="px-4 py-2 text-white bg-[#ff4689] rounded ">Vote</button>
                                    @endif
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach

    </main>

    <footer
        class="bg-white text-[#ff4689] py-4 flex flex-col md:flex-row items-center justify-between px-4 md:px-8 space-y-4 md:space-y-0">
        <button class="bg-[#ff4689] text-white px-4 py-2 rounded-full font-bold">FIND US</button>

        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 text-center md:text-left">
            <a href="https://instagram.com/pilkadikippnj" target="_blank"
                class="flex items-center justify-center md:justify-start">
                <img class="h-8 md:h-10 " src="https://img.icons8.com/ios-glyphs/30/F25081/instagram-circle.png"
                    alt="instagram-circle" />
                <span class="ml-2">@pilkadikippnj</span>
            </a>
            <a href="mailto:pilkadikippnj@gmail.com" class="flex items-center justify-center md:justify-start">
                <img class="h-8 md:h-10 " src="https://img.icons8.com/ios-filled/50/F25081/circled-envelope.png"
                    alt="circled-envelope" />
                <span class="ml-2">pilkadikippnj@gmail.com</span>
            </a>
        </div>
    </footer>

    <!-- Modal -->
    <div id="candidateModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-1/3 p-6">
            <h2 class="text-2xl font-bold mb-4" id="modalCandidateName"></h2>

            <h4 class="text-lg font-bold mt-4">Visi:</h4>
            <p id="modalCandidateVision"></p>
            <h4 class="text-lg font-bold">Misi:</h4>
            <p id="modalCandidateMission"></p>
            <button id="closeModal" class="mt-6 px-4 py-2 bg-[#ff4689] text-white rounded ">Close</button>
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
