@extends('admin.layouts.dashboard')

@section('content')
    <h1>Create Position</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('positions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Position Name</label>
            <input type="text"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="name" name="name">
        </div>
        <div class="">
            <label for="max_vote" class="block text-sm font-medium text-gray-700">max_vote</label>
            <input type="number"
                class=" mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                id="max_vote" name="max_vote">
        </div>



        <button type="submit" class="bg-[#00519c] text-white py-2 px-4 rounded-md ">Create</button>
    </form>
@endsection
