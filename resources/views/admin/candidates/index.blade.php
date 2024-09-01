@extends('admin.layouts.dashboard')

@section('content')
    <h1 class=" py-2 text-xl font-bold text-[#383838]">Candidates</h1>

    <div class="flex justify-between mb-3">
        <a href="{{ route('candidates.create') }}" class="px-4 py-2 bg-[#383838] text-white rounded">Add New Candidate</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table" id="candidates-table">
            <thead>
                <tr class="bg-[#383838]">
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Major</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Study</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Generation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Vision</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Mission</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($candidates as $candidate)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $candidate->position->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if ($candidate->photo)
                                <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate Photo" width="100">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->major }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->study }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->generation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->vision }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $candidate->mission }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#candidates-table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true
            });
        });
    </script>
@endsection
