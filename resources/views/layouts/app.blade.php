<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Times+New+Roman&display=swap"
        rel="stylesheet" />
    {{-- Bootstrap CSS & JS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }

        .times {
            font-family: 'Times New Roman', serif;
        }

        .sidebar-link-active {
            color: #6CF600 !important;
            font-weight: 600;
            background-color: #333;
            position: relative;
        }

        .sidebar-link-active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            bottom: 20%;
            width: 4px;
            border-radius: 0 3px 3px 0;
            background-color: #6CF600;
        }
    </style>
</head>

<body class="text-black flex">

    <aside id="sidebar"
        class="sidebar bg-[#292929] w-72 fixed top-0 left-0 bottom-0 z-50 flex flex-col justify-between p-6 transition-transform duration-300 md:translate-x-0 -translate-x-full">
        <div class="flex flex-col h-full">
            <div class="mb-6 flex items-center space-x-3">
                <img alt="Logo SMK Amaliah" class="w-11 h-11"
                    src="{{ asset('assets/image/amaliah2.png') }}" />
                <div class="text-white text-xs leading-tight times">
                    <div>
                        <span class="font-bold">SMK</span> Amaliah 1 &amp; 2 CIAWI
                    </div>
                    <div class="italic font-light text-[10px]">Tauhid Is Our Fundament</div>
                </div>
            </div>

            <div class="mb-6 relative">
                <input
                    class="w-full rounded-full bg-[#D9D9D9] text-xs text-black placeholder-black px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#6CF600] pl-10"
                    placeholder="Search..." type="search" />
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-xs"></i>
            </div>

            <nav class="text-white text-sm space-y-1 flex-1 overflow-y-auto pr-2">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Home</span>
                </a>

                <a class="relative flex items-center space-x-3 p-2 rounded-md transition hover:bg-gray-700"
                    href="#">
                    <i class="fas fa-pen-alt w-5 text-center"></i>
                    <span>Editor</span>
                </a>
                
                <div class="pl-8 space-y-1">
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Main Page</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Discover Amaliah</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Facilities</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Education Preview</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Major Competency</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Discover News</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Testimonials</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Statistics</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Industry Partners</a>
                    <a class="block p-2 text-xs rounded-md transition hover:bg-gray-700" href="#">Curator.io</a>
                </div>
            </nav>
            
            <div class="mt-auto pt-6 space-y-1">
                <a class="relative flex items-center space-x-3 p-2 rounded-md transition hover:bg-gray-700" href="#">
                    <i class="fas fa-comments w-5 text-center"></i>
                    <span>Feedback</span>
                </a>
                <a class="relative flex items-center space-x-3 p-2 rounded-md transition hover:bg-gray-700" href="#">
                    <i class="fas fa-cog w-5 text-center"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer space-y-3 pt-6">
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full bg-[#6CF600] text-white text-sm font-semibold rounded-lg px-4 py-2.5 flex items-center justify-center space-x-2 hover:bg-[#5bd300] transition">
                    <span>Log Out</span>
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
            <a href="{{ url('/') }}"
                class="w-full bg-[#6CF600] text-white text-sm font-semibold rounded-lg px-4 py-2.5 flex items-center justify-center space-x-2 hover:bg-[#5bd300] transition">
                <span>Go to Web</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>
    </aside>

    <button id="toggleSidebar" class="md:hidden fixed top-4 left-4 z-50 bg-[#6CF600] text-white p-2 rounded-lg shadow">
        <i class="fas fa-bars"></i>
    </button>

    <main class="main-content flex-1 md:ml-72 p-6 w-full">
        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("toggleSidebar");
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
        });
    </script>
</body>

</html>