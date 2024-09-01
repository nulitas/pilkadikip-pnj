@extends('admin.layouts.dashboard')

@section('content')
    <h1 class=" py-2 text-xl font-bold text-[#383838]">Voters</h1>

    <div class="flex justify-between mb-3">
        <a href="{{ route('voters.create') }}" class="px-4 py-2 bg-[#383838] text-white rounded">Add New Voter</a>

        <form action="{{ route('voters.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center">
            @csrf
            <div class="form-group mr-2">
                <input type="file" name="file" class="px-2 py-1 bg-[#383838] text-white rounded" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-[#383838] text-white rounded">Import Voters</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr class="bg-[#383838]">
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Student ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Major</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Study</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Generation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($voters as $voter)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $voter->student_id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $voter->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $voter->major }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $voter->study }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $voter->generation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a href="{{ route('voters.edit', $voter->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('voters.destroy', $voter->id) }}" method="POST" class="inline-block">
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
            $('.table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true
            });
        });
    </script>
@endsection
