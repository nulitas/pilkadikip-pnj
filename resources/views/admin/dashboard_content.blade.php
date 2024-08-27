@extends('admin.layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('candidates.index') }}" class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Candidates</h3>
                <p class="text-2xl">{{ $totalCandidates }}</p>
            </a>
            <a href="{{ route('voters.index') }}" class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Voters</h3>
                <p class="text-2xl">{{ $totalVoters }}</p>
            </a>
            <a href="{{ route('positions.index') }}" class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Positions</h3>
                <p class="text-2xl">{{ $totalPositions }}</p>
            </a>
            <a href="{{ route('votes.index') }}" class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Votes</h3>
                <p class="text-2xl">{{ $totalVotes }}</p>
            </a>
        </div>
    </div>

    @foreach ($candidateVotes as $positionName => $candidates)
        <div class="my-8">
            <h3 class="text-xl font-semibold mb-4">{{ $positionName }} Votes</h3>
            <canvas id="chart-{{ $chartId = Str::slug($positionName) }}"></canvas>
        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const candidateVotes = @json($candidateVotes);

        Object.keys(candidateVotes).forEach(function(position) {
            const candidates = candidateVotes[position];
            const labels = candidates.map(candidate => candidate.name);
            const votesData = candidates.map(candidate => candidate.votes_count);

            const ctx = document.getElementById('chart-' + position.replace(/\s+/g, '-')).getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of Votes',
                        data: votesData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
