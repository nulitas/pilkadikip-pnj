<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <style>
        #sidebar {
            transition: transform ease-in-out 0.3s;
        }

        .sidebar-closed #sidebar {
            transform: translateX(-100%);
        }

        #main-content {
            transition: margin-left ease-in-out 0.3s;
            margin-left: 14rem;
        }

        .sidebar-closed #main-content {
            margin-left: 0;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="h-screen flex overflow-hidden bg-gray-200">
        <!-- Sidebar -->
        <div class="absolute bg-[#00519c] text-white w-56 min-h-screen overflow-y-auto" id="sidebar">
            <!-- Sidebar Content -->
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Pilkadikip PNJ</h1>
                <ul class="mt-4">
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="block">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('votes.index') }}" class="block">Votes</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('voters.index') }}" class="block ">Voters</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('positions.index') }}" class="block ">Positions</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('candidates.index') }}" class="block ">Candidates</a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div id="main-content" class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <div class="bg-white shadow">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center py-4 px-2">
                        <button class="text-gray-500 hover:text-gray-600" id="toggle-sidebar">
                            {{-- hamburger button --}}
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class=" px-4 py-2 bg-[#00519c] text-white rounded">Sign Out</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        const toggleSidebarButton = document.getElementById('toggle-sidebar');

        toggleSidebarButton.addEventListener('click', () => {
            document.body.classList.toggle('sidebar-closed');
        });
    </script>
</body>

</html>
