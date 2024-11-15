<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')

    <style>
        #main-content{
            min-height: 100vh;
        }
    </style>
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-900' }}">
    <div class="flex min-h-screen backdrop-blur-sm" style="{{ $theme == 'light' ? 'background-color: #17181C;' : 'background-color: #eeeeee;' }}">
        <!-- Efek latar belakang -->
        <div class="absolute inset-0 z-[-1]">
            <div class="absolute inset-0 flex justify-center">
                <div class="bg-shape1 bg-teal opacity-50 bg-blur"></div>
                <div class="bg-shape2 bg-primary opacity-50 bg-blur"></div>
                <div class="bg-shape1 bg-purple opacity-50 bg-blur"></div>
            </div>
        </div> 
        <!-- Sidebar -->
        @include('components.sidebar', ['theme' => $theme])

        <!-- Content -->
        <div class="flex-grow">
            <!-- Navbar -->
            @include('components.navbar', ['theme' => $theme])
            <!-- Main Content -->
            <div id="main-content" class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
            <div class="px-8 pt-5 h-full">
                <div class="text-center">
                    <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Jadwal Mengajar</h2>
                </div>
                <!-- Dropdown Hari -->
                <div class="bg-[#23252A] w-full rounded-2xl hover:bg-[#3A3B40] transition-colors duration-200 ease-in-out cursor-pointer relative mt-3">
                    <button id="dropdownHariButton" class="w-full h-10 flex justify-between items-center px-5 py-7 rounded-2xl cursor-pointer transition duration-100 ease-in-out flex justify-between items-center
                        text-gray-400 {{ $theme == 'light' ? 'bg-[#2A2C33] hover:bg-zinc-800 border-transparent focus:ring-gray-800 outline outline-1 outline-zinc-900' : 'bg-gray-200 hover:bg-zinc-300 border-gray-300 focus:ring-gray-300 outline outline-1' }} shadow-[4px_6px_1px_1px_rgba(0,_0,_0,_0.8)]">
                        <span>Pilih Hari</span>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHari" class="w-full absolute z-10 mt-2 hidden {{ $theme == 'light' ? 'bg-gray-700 border border-black' : 'bg-gray-50 outline outline-1' }} {{ $theme == 'light' ? 'text-gray-200' : 'text-gray-700' }} {{ $theme == 'light' ? 'divide-gray-600' : 'divide-gray-100' }} rounded-xl shadow w-full absolute z-10 mt-3" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                        <ul class="py-2 text-sm">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Senin</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Selasa</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Rabu</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Kamis</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Jumat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Table mahasiswa -->
            <div class="px-8 pt-2 mt-5 mb-5">
                <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Waktu</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/4">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Senin, 07.00-08.30</td>
                                <td class="px-3 py-3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                    <p>Proyek Perangkat Lunak</p>
                                </td>
                                <td class="px-4 py-2">E101</td>
                            </tr>
                            <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Senin, 07.00-08.30</td>
                                <td class="px-3 py-3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                    <p>Proyek Perangkat Lunak</p>
                                </td>
                                <td class="px-4 py-2">E101</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Script untuk menampilkan dropdown Hari dan menutup ketika klik di luar dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownHariButton = document.getElementById('dropdownHariButton');
            const dropdownHari = document.getElementById('dropdownHari');

            // Fungsi untuk toggle dropdown Hari
            function toggleDropdownHari() {
                dropdownHari.classList.toggle('hidden');
            }

            // Event listener untuk tombol dropdown Hari
            dropdownHariButton.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event dari bubble ke document
                toggleDropdownHari();
            });

            // Menutup dropdown ketika klik di luar dropdown
            document.addEventListener('click', function(event) {
                if (!dropdownHari.contains(event.target) && !dropdownHariButton.contains(event.target)) {
                    dropdownHari.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>

