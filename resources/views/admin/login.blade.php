<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-times {
            font-family: 'Times New Roman', Times, serif;
        }

        /* Mengatur transisi untuk semua elemen */
        * {
            transition: all 0.3s ease-in-out;
        }

        /* Hover profesional untuk input field dan ikonnya */
        .input-group:focus-within .input-icon {
            color: #4ED400;
        }

        .input-field:focus {
            box-shadow: 0 0 0 2px #4ED400;
        }

        /* Efek hover untuk kartu informasi */
        .info-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover untuk link di dalam kartu */
        .info-card-link {
            transition: color 0.3s ease;
        }

        .info-card:hover .info-card-link {
            color: #378E00;
            /* Warna hijau yang sedikit lebih gelap */
        }
    </style>
</head>

<body class="min-h-screen flex bg-gray-100">

    <div class="hidden md:flex flex-1 bg-white flex-col">
        <header class="flex items-center justify-between px-8 py-6">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/logo/amaliah.png') }}" alt="Logo Sekolah" class="w-12 h-12 object-contain">
                <div class="leading-tight">
                    <p class="text-black text-sm font-semibold font-times">
                        SMK <span class="font-bold font-times">AMALIAH 1&2 CIAWI</span>
                    </p>
                    <p class="text-xs italic text-black/70 font-times">Tauhid Is Our Fundament</p>
                </div>
            </div>
        </header>

        <div class="flex-1 flex flex-col justify-start items-center p-8 space-y-8">
            <div
                class="w-full max-w-2xl bg-gray-200 rounded-2xl h-[250px] shadow-lg overflow-hidden relative group cursor-pointer">
                <img class="w-full h-full object-cover transform scale-100 group-hover:scale-105 transition-transform duration-500"
                    src="{{ asset('assets/image/DroneView.jpg') }}" alt="Placeholder Main">
                <div
                    class="absolute bottom-0 left-0 p-4 w-full bg-gradient-to-t from-black/60 to-transparent text-white">
                    <p class="text-sm font-semibold group-hover:text-gray-200">Menuju Karir Impian Bersama</p>
                    <p class="text-xs font-light mt-1">SMK AMALIAH 1&2 CIAWI</p>
                    <a href="#" class="text-xs font-bold text-[#4ED400] flex items-center mt-2 group-hover:text-white">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex space-x-4 w-full max-w-2xl">
                <div
                    class="info-card flex-1 flex items-center p-6 bg-white border border-[#4ED400] rounded-2xl shadow-md space-x-4 cursor-pointer">
                    <i class="fas fa-globe text-3xl text-[#4ED400]"></i>
                    <div>
                        <p class="font-bold text-base">Web Page</p>
                        <p class="text-xs text-gray-600">
                            Kembali ke halaman utama website<br>
                            SMK Amaliah 1&2
                        </p>
                        <a href="#"
                            class="info-card-link text-xs font-bold text-[#4ED400] mt-2 inline-flex items-center">
                            Kembali
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 ml-1 transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div
                    class="info-card flex-1 flex items-center p-6 bg-white border border-[#4ED400] rounded-2xl shadow-md space-x-4 cursor-pointer">
                    <i class="fas fa-users-cog text-3xl text-[#4ED400]"></i>
                    <div>
                        <p class="font-bold text-base">Contact Admin</p>
                        <p class="text-xs text-gray-600">
                            Hubungi admin/tim IT SMK Amaliah<br>
                            1 & 2
                        </p>
                        <a href="#"
                            class="info-card-link text-xs font-bold text-[#4ED400] mt-2 inline-flex items-center">
                            Hubungi
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3 w-3 ml-1 transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between w-full max-w-2xl mt-8 space-x-4">
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/pplg.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/tjkt.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/animasi.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/dkv.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/mp.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/ak.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/lps.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/br.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
                <div
                    class="w-13 h-13 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-transform duration-300 cursor-pointer p-1">
                    <img src="{{ asset('assets/logo/Logo_Jurusan/dpb.png') }}" alt=""
                        class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-md bg-[#2D2D2D] flex flex-col justify-center px-10 py-16 mx-auto">
        <div class="text-center">
            <h1 class="text-white text-3xl font-extrabold mb-2">Login As <span class="text-[#4ED400]">Admin</span>
            </h1>
            <p class="text-white text-xs font-medium mb-8">Enter Your Email And Password Below To Log In</p>
        </div>

        <form id="loginForm" class="space-y-5" action="{{ route('login') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500 text-white text-xs rounded-lg p-2 font-medium">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="bg-[#4ED400] text-white text-xs rounded-lg p-2 font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="relative group input-group">
                <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 input-icon">
                    <i class="fas fa-user"></i>
                </span>
                <input id="emailField"
                    class="input-field w-full rounded-xl py-4 pl-12 pr-4 text-gray-200 bg-[#3A3A3A] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4ED400] transition-all duration-300"
                    placeholder="admin@examples.com" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="relative group input-group">
                <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 input-icon">
                    <i class="fas fa-lock"></i>
                </span>
                <input id="passwordField"
                    class="input-field w-full rounded-xl py-4 pl-12 pr-12 text-gray-200 bg-[#3A3A3A] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4ED400] transition-all duration-300"
                    placeholder="password" type="password" name="password" required>
            </div>

            <div class="flex items-center justify-between text-xs font-medium">
                <div class="flex items-center space-x-2 text-gray-300 cursor-pointer">
                    <input id="showPasswordToggle" type="checkbox"
                        class="form-checkbox h-4 w-4 text-[#4ED400] focus:ring-[#4ED400] rounded" name="show-password">
                    <span>Show Password</span>
                </div>
            </div>

            <button
                class="w-full py-3 rounded-xl bg-[#4ED400] text-white font-extrabold text-lg transition-transform duration-300 transform hover:scale-105 hover:bg-opacity-90 active:scale-95"
                type="submit">
                Login
            </button>
        </form>

    </div>

    <script>
        const passwordField = document.getElementById("passwordField");
        const showPasswordToggle = document.getElementById("showPasswordToggle");

        if (showPasswordToggle && passwordField) {
            showPasswordToggle.addEventListener("change", () => {
                passwordField.type = showPasswordToggle.checked ? "text" : "password";
            });
        }
    </script>
</body>

</html>