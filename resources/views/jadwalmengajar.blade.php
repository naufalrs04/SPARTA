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
                    <!-- Dropdown Hari dengan ukuran full -->
                    <div class="flex justify-center mt-3 mb-3">
                        <div class="w-full relative">
                            <select id="hariSelect" class="w-full text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:bg-[#3A3B40] transition-colors duration-200 ease-in-out appearance-none">
                                <option value="" class="text-white">Pilih Hari</option>
                                <option value="senin" class="text-white">Senin</option>
                                <option value="selasa" class="text-white">Selasa</option>
                                <option value="rabu" class="text-white">Rabu</option>
                                <option value="kamis" class="text-white">Kamis</option>
                                <option value="jumat" class="text-white">Jumat</option>
                                <option value="sabtu" class="text-white">Sabtu</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
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

        <script>
                    const jadwalBtn = document.getElementById('jadwalBtn');
                    const jadwalDropdown = document.getElementById('jadwalDropdown');

                    jadwalBtn.addEventListener('click', () => {
                        // Toggle visibility of dropdown
                        if (jadwalDropdown.classList.contains('hidden')) {
                            jadwalDropdown.classList.remove('hidden');
                        } else {
                            jadwalDropdown.classList.add('hidden');
                        }
                    });
        </script>
</body>

</html>

