@extends('admin.layouts.dashboard')

@section('content')
    <h1>Ubah Data Pemilih</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('voters.update', $voter->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="">
            <label for="student_id" class="block text-sm font-medium text-gray-700">NIM</label>
            <input type="number"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="student_id" name="student_id" value="{{ old('student_id', $voter->student_id) }}">
        </div>
        <div class="">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="password" name="password" value="{{ old('password', $voter->password) }}">
        </div>
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="name" name="name" value="{{ old('name', $voter->name) }}">
        </div>
        <div class="">
            <label for="major" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="major" name="major" value="{{ old('major', $voter->major) }}">
        </div>
        <div class="">
            <label for="study" class="block text-sm font-medium text-gray-700">Program Studi</label>
            <input type="text"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="study" name="study" value="{{ old('study', $voter->study) }}">
        </div>
        <div class="">
            <label for="generation" class="block text-sm font-medium text-gray-700">Angkatan</label>
            <input type="number"
                class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="generation" name="generation" value="{{ old('generation', $voter->generation) }}">
        </div>
        <button type="submit" class="bg-[#383838] text-white py-2 px-4 rounded-md ">Perbarui</button>
    </form>
@endsection
