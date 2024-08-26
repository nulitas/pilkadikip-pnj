@extends('admin.layouts.dashboard')

@section('content')
    <h1>Votes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <strong>Total Votes: </strong> {{ $totalVotes }}
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Voter Name</th>
                <th>Candidate Name</th>
                <th>Position Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($votes as $index => $vote)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $vote->voter->name }}</td>
                    <td>{{ $vote->candidate->name }}</td>
                    <td>{{ $vote->candidate->position->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
