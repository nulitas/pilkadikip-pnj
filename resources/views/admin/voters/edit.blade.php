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
            <div class="relative">
                <input type="password"
                    class="form-control mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="password" name="password" value="{{ old('password', $voter->password) }}">
                <button type="button" onclick="togglePassword('password')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        class="h-5 w-5" viewBox="0 0 256 256" xml:space="preserve">

                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                            <path
                                d="M 45 73.264 c -14.869 0 -29.775 -8.864 -44.307 -26.346 c -0.924 -1.112 -0.924 -2.724 0 -3.836 C 15.225 25.601 30.131 16.737 45 16.737 c 14.868 0 29.775 8.864 44.307 26.345 c 0.925 1.112 0.925 2.724 0 3.836 C 74.775 64.399 59.868 73.264 45 73.264 z M 6.934 45 C 19.73 59.776 32.528 67.264 45 67.264 c 12.473 0 25.27 -7.487 38.066 -22.264 C 70.27 30.224 57.473 22.737 45 22.737 C 32.528 22.737 19.73 30.224 6.934 45 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path
                                d="M 45 62 c -9.374 0 -17 -7.626 -17 -17 s 7.626 -17 17 -17 s 17 7.626 17 17 S 54.374 62 45 62 z M 45 34 c -6.065 0 -11 4.935 -11 11 s 4.935 11 11 11 s 11 -4.935 11 -11 S 51.065 34 45 34 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                </button>
            </div>
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
        <button type="submit" class="bg-[#383838] text-white py-2 px-4 rounded-md">Simpan Perubahan</button>
    </form>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById('togglePasswordIcon');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeOpen.style.display = "none";
                eyeClosed.style.display = "block";
            } else {
                passwordField.type = "password";
                eyeOpen.style.display = "block";
                eyeClosed.style.display = "none";
            }
        }
    </script>
@endsection
