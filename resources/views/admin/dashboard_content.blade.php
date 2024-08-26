@extends('admin.layouts.dashboard')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Candidates</h3>
                <p class="text-2xl">{{ $totalCandidates }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Voters</h3>
                <p class="text-2xl">{{ $totalVoters }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Positions</h3>
                <p class="text-2xl">{{ $totalPositions }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold">Total Votes</h3>
                <p class="text-2xl">{{ $totalVotes }}</p>
            </div>
        </div>
    </div>
@endsection
