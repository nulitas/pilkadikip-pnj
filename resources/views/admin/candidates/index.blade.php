@extends('admin.layouts.dashboard')

@section('content')
    <h1>Candidates</h1>
    <a href="{{ route('candidates.create') }}" class="btn btn-primary">Add New Candidate</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Major</th>
                <th>Study</th>
                <th>Generation</th>
                <th>Vision</th>
                <th>Mission</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>
                        @if ($candidate->photo)
                            <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate Photo" width="100">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>{{ $candidate->major }}</td>
                    <td>{{ $candidate->study }}</td>
                    <td>{{ $candidate->generation }}</td>
                    <td>{{ $candidate->vision }}</td>
                    <td>{{ $candidate->mission }}</td>

                    <td>
                        <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
