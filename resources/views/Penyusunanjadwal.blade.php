<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyusunan Jadwal</title>
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
            <div class="px-8 pt-5 flex justify-center items-center">
                <div class="w-full rounded-full border-yellow-500 border-2  px-4 py-2 flex justify-between items-center">
                    <div id="listjadwal" class="w-1/2 rounded-full bg-yellow-500  px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchjadwal('listjadwal')">
                        <h2 class="text-md font-bold">List Jadwal Kuliah</h2>
                    </div>
                    <div id="paketjadwal" class="w-1/2 rounded-full flex justify-center items-center  px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchjadwal('paketjadwal')">
                        <h2 class="text-md font-bold">Paket Jadwal Kuliah</h2>
                    </div>
                </div>
            </div>

            <!-- Pengajuan jadwal kuliah -->
            <div class="flex justify-center items-center mt-10">
                <div class="w-full max-w-md">
                    <h2 class="text-2xl font-bold text-white mb-6 text-center">Pengajuan Jadwal Kuliah</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="p-10 rounded-lg items-center" style="background-color: #2A2C33;">
                            <p class="text-yellow-500 text-sm mb-4 text-center">Jumlah Mata Kuliah yang diajukan</p>
                            <div class="box-border border-2 flex justify-center items-center rounded-lg w-20 h-20 mx-auto" style="border-color: #F0B90B;">
                                <span class="text-5xl font-bold">5</span>
                            </div>
                        </div>

                        <div class="p-10 rounded-lg items-center" style="background-color: #2A2C33;">
                            <p class="text-red-500 text-sm mb-4 text-center">Jumlah Mata Kuliah yang belum diajukan</p>
                            <div class="box-border border-2 flex justify-center items-center rounded-lg w-20 h-20 mx-auto" style="border-color: #CF3333;">
                                <span class="text-5xl font-bold">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Cari mata kuliah" class="w-full text-white p-3 pl-10 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #2A2C33;">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div id="contentpaketjadwal" class="hidden">
                <div class="px-8 pt-5 mt-5 mb-5">
                    <h2 class="text-center text-lg font-semibold mb-4">Jadwal Pengisian IRS</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="bg-[#878A91]">
                                <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Waktu</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Ruangan</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Jadwal data goes here -->
                        </tbody>
                    </table>
                </div>

                <div class="px-8 mt-5 flex justify-center">
                    <div class="rounded-lg py-2 px-28" style="background-color:#34803C">
                        <a href="#" class="text-center block text-white"><strong>Ajukan</strong></a>
                    </div>
                </div>
            </div>
            <div id="contentlistjadwal">
                <div class="px-8 pt-5 mt-5 mb-5">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="bg-[#878A91]">
                                <th class="px-4 py-2 w-auto border-r border-white rounded-tl-lg">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/8 rounded-tr-lg">Tambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Jadwal data goes here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function switchjadwal(selected) {
                    const listjadwal = document.getElementById('listjadwal');
                    const paketjadwal = document.getElementById('paketjadwal');

                    const contentlistjadwal = document.getElementById('contentlistjadwal');
                    const contentpaketjadwal = document.getElementById('contentpaketjadwal');

                    if (selected === 'listjadwal') {
                        listjadwal.classList.add('bg-yellow-500', 'border-[#17181C]');
                        paketjadwal.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        contentlistjadwal.classList.remove('hidden');
                        contentpaketjadwal.classList.add('hidden');
                    } else if (selected === 'paketjadwal') {
                        listjadwal.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        paketjadwal.classList.add('bg-yellow-500', 'border-[#17181C]');
                        contentlistjadwal.classList.add('hidden');
                        contentpaketjadwal.classList.remove('hidden');
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>