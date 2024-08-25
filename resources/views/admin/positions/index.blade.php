@extends('admin.layouts.dashboard')

@section('content')
    <h1>Positions</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-primary">Add New Position</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Position Name</th>
                <th>Max Vote</th>
                <th>Priority</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
                <tr>
                    <td>{{ $position->name }}</td>
                    <td>{{ $position->max_vote }}</td>
                    <td>{{ $position->priority }}</td>

                    <td>
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
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
