<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
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
                <h2 class="text-center text-lg font-semibold mb-4">Input Nilai</h2>
                <!-- button Mata Kuliah dengan dropdown -->
                <div class="bg-[#23252A] w-full rounded-lg hover:bg-[#3A3B40] transition-colors duration-200 ease-in-out cursor-pointer mb-4 relative">
                    <button id="dropdownMataKuliahButton" data-dropdown-toggle="dropdownMataKuliah" class="w-full h-10 flex justify-between items-center px-5 text-[#94959A] font-semibold">
                        <span>Mata Kuliah</span>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownMataKuliah" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2 left-0 top-12">
                        <ul class="py-2 text-sm" aria-labelledby="dropdownMataKuliahButton">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Pengembangan Berbasis Platform</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Proyek Perangkat Lunak</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Struktur Data</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Jaringan Komputer</a></li>
                        </ul>
                    </div>
                </div>

                <div class="flex justify-between">
                    <!-- button urutkan dengan dropdown -->
                    <div class="bg-[#23252A] flex w-1/2 rounded-lg hover:bg-[#3A3B40] transition-colors duration-200 ease-in-out cursor-pointer relative">
                        <button id="dropdownUrutkanButton" data-dropdown-toggle="dropdownUrutkan" class="w-full h-10 flex justify-between items-center px-5 text-[#94959A] font-semibold">
                            <span>Urutkan</span>
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownUrutkan" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2 left-0 top-12">
                            <ul class="py-2 text-sm" aria-labelledby="dropdownUrutkanButton">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Nama Mahasiswa</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">NIM</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Mata Kuliah</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Input cari mahasiswa -->
                    <div class="bg-[#23252A] ml-5 flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative">
                        <div class="w-full h-10 flex items-center relative">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <!-- Input Pencarian -->
                            <input type="search" class="bg-transparent text-[#94959A] ml-10 pl-5 w-full h-full border-none outline-none font-semibold" placeholder="Cari Mahasiswa">
                        </div>
                    </div>                                    
                </div>
            </div>

                <!-- Table mahasiswa -->
                <div class="px-8 pt-2 mt-5 mb-5 rounded-tl-lg">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Nama Mahasiswa</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">NIM</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">Tugas</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">Quiz</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">UTS</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">UAS</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">Nilai</th>
                                <th class="px-4 py-2 w-1/4 ">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">1</td>
                                <td class="px-3 py-3 border-r border-white">
                                    <p>Muhamad Gunawan</p>
                                </td>                               
                                <td class="px-4 py-2 border-r border-white">24060122120016</td>
                                <td class="px-4 py-2 border-r border-white">Pengembangan Berbasis Platform - A</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2">
                                    <a href="/inputnilaiInfo" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>                                                               
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">2</td>
                                <td class="px-3 py-3 border-r border-white">
                                    <p>Muhamad Gunawan</p>
                                </td>                               
                                <td class="px-4 py-2 border-r border-white">24060122120016</td>
                                <td class="px-4 py-2 border-r border-white">Pengembangan Berbasis Platform - A</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2 border-r border-white">90</td>
                                <td class="px-4 py-2">
                                    <a href="/inputnilaiInfo" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <script>
        const dropdownUrutkan = document.getElementById('dropdownUrutkan');
        const dropdownUrutkanButton = document.getElementById('dropdownUrutkanButton');
        const dropdownMataKuliah = document.getElementById('dropdownMataKuliah');
        const dropdownMataKuliahButton = document.getElementById('dropdownMataKuliahButton');

        // Fungsi untuk toggle dropdown Urutkan
        dropdownUrutkanButton.addEventListener('click', function(event) {
            event.stopPropagation();  
            dropdownUrutkan.classList.toggle('hidden');
        });
    
        // Fungsi untuk menutup dropdown Urutkan
        window.addEventListener('click', function(event) {
            if (!dropdownUrutkan.contains(event.target) && !dropdownUrutkanButton.contains(event.target)) {
                dropdownUrutkan.classList.add('hidden');  // Menutup dropdown
            }
        });

        // Fungsi untuk toggle dropdown Mata Kuliah
        dropdownMataKuliahButton.addEventListener('click', function(event) {
            event.stopPropagation();  // Mencegah klik event bubbling
            dropdownMataKuliah.classList.toggle('hidden');
        });

        // Fungsi untuk menutup dropdown jika klik di luar elemen
        window.addEventListener('click', function(event) {
            if (!dropdownMataKuliah.contains(event.target) && !dropdownMataKuliahButton.contains(event.target)) {
                dropdownMataKuliah.classList.add('hidden');  
            }
        });
    </script>
</body>


</html>

