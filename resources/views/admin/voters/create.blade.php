@extends('admin.layouts.dashboard')

@section('content')
<h1>Create Voter</h1>

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
        <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
        <input type="number" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="student_id" name="student_id">
    </div>
    <div class="">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="password" name="password">
    </div>
    <div class="">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="name" name="name">
    </div>
    <div class="">
        <label for="major" class="block text-sm font-medium text-gray-700">Major</label>
        <input type="text" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="major" name="major">
    </div>
    <div class="">
        <label for="study" class="block text-sm font-medium text-gray-700">Study Program</label>
        <input type="text" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="study" name="study">
    </div>
    <div class="">
        <label for="generation" class="block text-sm font-medium text-gray-700">Generation</label>
        <input type="number" class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="generation" name="generation">
    </div>
    <button type="submit" class="bg-[#00519c] text-white py-2 px-4 rounded-md ">Create</button>
</form>
@endsection