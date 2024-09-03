@extends('admin.layouts.dashboard')

@section('content')
    <h1>Ubah Data Gelar</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Gelar</label>
            <input type="text"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="name" name="name" value="{{ old('name', $position->name) }}">
        </div>
        <div class="">
            <label for="max_vote" class="block text-sm font-medium text-gray-700">Maksimal Pemilih</label>
            <input type="max_vote"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="max_vote" name="max_vote" value="{{ old('max_vote', $position->max_vote) }}">
        </div>
        <div class="">
            <label for="priority" class="block text-sm font-medium text-gray-700">Prioritas</label>
            <input type="text"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="priority" name="priority" value="{{ old('name', $position->priority) }}">
        </div>
        <button type="submit" class="bg-[#383838] text-white py-2 px-4 rounded-md ">Perbarui</button>
    </form>
@endsection
