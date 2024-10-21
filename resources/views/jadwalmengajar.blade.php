<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            <!-- Navbar -->
            @include('components.navbar')
            <!-- Main Content -->
            <div class="px-8 pt-5">
                <h2 class="text-center text-lg font-semibold mb-4">Jadwal Mengajar</h2>
                <!-- Dropdown Hari -->
                <div class="bg-[#23252A] w-full rounded-lg hover:bg-[#3A3B40] transition-colors duration-200 ease-in-out cursor-pointer relative mt-3">
                    <button id="dropdownHariButton" class="w-full h-10 flex justify-between items-center px-5 text-[#94959A] font-semibold">
                        <span>Pilih Hari</span>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHari" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2">
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
            <div class="px-8 pt-2 mt-5 mb-5 rounded-tl-lg">
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr style="background-color: rgba(135, 138, 145, 0.37);">
                            <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Waktu</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Mata Kuliah</th>
                            <th class="px-4 py-2 w-1/4">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #23252A;">
                            <td class="px-4 py-2 border-r border-white">Senin, 07.00-08.30</td>
                            <td class="px-3 py-3 border-r border-white">
                                <p>Proyek Perangkat Lunak</p>
                            </td>
                            <td class="px-4 py-2">E101</td>
                        </tr>
                        <tr style="background-color: #23252A;">
                            <td class="px-4 py-2 border-r border-white">Senin, 07.00-08.30</td>
                            <td class="px-3 py-3 border-r border-white">
                                <p>Proyek Perangkat Lunak</p>
                            </td>
                            <td class="px-4 py-2">E101</td>
                        </tr>
                    </tbody>
                </table>
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

