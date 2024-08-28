@extends('admin.layouts.dashboard')

@section('content')
    <h1>Voters</h1>

    <div class="d-flex justify-content-between mb-3">

        <a href="{{ route('voters.create') }}" class="btn btn-primary">Add New Voter</a>

        <form action="{{ route('voters.import') }}" method="POST" enctype="multipart/form-data"
            class="d-flex align-items-center">
            @csrf
            <div class="form-group mr-2">
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Import Voters</button>
        </form>
    </div>


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
