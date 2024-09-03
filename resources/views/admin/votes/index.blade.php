@extends('admin.layouts.dashboard')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class=" py-2 text-xl font-bold text-[#383838]">Yang Sudah Memilih</h1>
    <div class="overflow-x-auto">
        <table class="table ">
            <thead>
                <tr class="bg-[#383838] ,">
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NIM
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Pemilih
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Jurusan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Program Studi
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Angkatan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Kandidat
                    </th>
                    {{-- <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Gelar
                    </th> --}}
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($votes as $index => $vote)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->voter->student_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->voter->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->voter->major }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->voter->study }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->voter->generation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->candidate->name }}</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $vote->candidate->position->name }} --}}
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
