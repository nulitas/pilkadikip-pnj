@extends('admin.layouts.dashboard')

@section('content')
    <h1>Menambahkan Pemilih</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('voters.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="">
            <label for="student_id" class="block text-sm font-medium text-gray-700">NIM</label>
            <input type="number"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="student_id" name="student_id">
        </div>
        <div class="">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="password" name="password">
        </div>
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="name" name="name">
        </div>
        <div class="">
            <label for="major" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="major" name="major">
        </div>
        <div class="">
            <label for="study" class="block text-sm font-medium text-gray-700">Program Studi</label>
            <input type="text"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="study" name="study">
        </div>
        <div class="">
            <label for="generation" class="block text-sm font-medium text-gray-700">Angkatan</label>
            <input type="number"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="generation" name="generation">
        </div>
        <button type="submit" class="bg-[#383838] text-white py-2 px-4 rounded-md ">Tambahkan</button>
    </form>
@endsection
