@extends('admin.layouts.dashboard')

@section('content')
<h1>Voters</h1>
<a href="{{ route('voters.create') }}" class="btn btn-primary">Add New Voter</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Major</th>
            <th>Study</th>
            <th>Generation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($voters as $voter)
            <tr>
                <td>{{ $voter->student_id }}</td>
                <td>{{ $voter->name }}</td>
                <td>{{ $voter->major }}</td>
                <td>{{ $voter->study }}</td>
                <td>{{ $voter->generation }}</td>
                <td>
                    <a href="{{ route('voters.edit', $voter->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('voters.destroy', $voter->id) }}" method="POST" style="display:inline;">
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
