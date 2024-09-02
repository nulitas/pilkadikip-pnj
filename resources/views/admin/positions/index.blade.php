@extends('admin.layouts.dashboard')

@section('content')
    <h1 class=" py-2 text-xl font-bold text-[#383838]">Gelar</h1>

    <div class="flex justify-between mb-3">
        <a href="{{ route('positions.create') }}" class="px-4 py-2 bg-[#383838] text-white rounded">Tambah Gelar Baru</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table" id="positions-table">
            <thead>
                <tr class="bg-[#383838]">
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Gelar
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Maksimal Pemilih
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Prioritas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($positions as $position)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $position->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $position->max_vote }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $position->priority }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
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
            $('#positions-table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true
            });
        });
    </script>
@endsection
