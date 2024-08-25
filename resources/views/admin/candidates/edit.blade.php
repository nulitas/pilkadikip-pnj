@extends('admin.layouts.dashboard')

@section('content')
    <h1>Edit Candidate</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')
        <div class="">
            <label for="position_id" class="block text-sm font-medium text-gray-700">Position</label>
            <select id="position_id" name="position_id"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $candidate->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Candidate Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $candidate->name) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            @if ($candidate->photo)
                <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate Photo" width="100" class="mb-2">
            @endif
            <input type="file" id="photo" name="photo"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="">
            <label for="major" class="block text-sm font-medium text-gray-700">Major</label>
            <input type="text" id="major" name="major" value="{{ old('major', $candidate->major) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="">
            <label for="study" class="block text-sm font-medium text-gray-700">Study</label>
            <input type="text" id="study" name="study" value="{{ old('study', $candidate->study) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="">
            <label for="generation" class="block text-sm font-medium text-gray-700">Generation</label>
            <input type="text" id="generation" name="generation" value="{{ old('generation', $candidate->generation) }}"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="">
            <label for="vision" class="block text-sm font-medium text-gray-700">Vision</label>
            <textarea id="vision" name="vision"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('vision', $candidate->vision) }}</textarea>
        </div>
        <div class="">
            <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
            <textarea id="mission" name="mission"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('mission', $candidate->mission) }}</textarea>
        </div>
        <button type="submit" class="bg-[#00519c] text-white py-2 px-4 rounded-md">Update</button>
    </form>
@endsection
