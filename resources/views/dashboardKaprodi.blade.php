<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
         @include('assets/sidebar')
        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            <!-- Navbar Atas-->
            @include('assets/header', ['data' => $data])

            <!-- Main Content -->
            <div class="bg-gray-800 px-8 pt-5 flex justify-center items-center" style="background-color: #17181C;">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Box Status Akademik -->
                    <div class="col-span-8 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Dosen</h2>

                        <!-- Box Utama Status Akademik -->
                        <div class="grid grid-cols-12 w-full rounded-lg flex-grow" style="background-color: #2A2C33;">
                            <div class="col-span-8 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>Nama :</strong></p>
                                    <p style="font-size: 20px;">Dr. Kusworo Adi, S.Kom, M.Cs</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>NIP :</strong></p>
                                    <p class="mb-1">1980122042387</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>Status :</strong></p>
                                    <p>Dekan/Dosen</p>
                                </div>
                            </div>
                            <div class="col-span-12 text-white flex items-center justify-center py-3 rounded-md mx-5 mb-5" style="background-color: #34803C">
                                <p><strong>AKTIF</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Box Capaian Akademik -->
                    <div class="col-span-4 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Mahasiswa Perwalian</h2>

                        <!-- Box Utama Capaian Akademik -->

                        <div class="pt-6 pr-6 pl-6 pb-2 rounded-tl-lg rounded-tr-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full">
                                <p style="color: #F0B90B; font-size: 20px;"><strong>Semester Akademik :</strong></p>
                                <p style="font-size: 17px;"><strong>2024/2025 Ganjil</strong></p>
                            </div>
                        </div>
                        <div class="p-6 text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full">
                                <p class="text-gray-300"><strong>Mahasiswa Aktif</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #486AAD">
                                    <p class="font-semibold text-3xl text-gray-50">670</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #FFFFFF">
                            </div>
                        </div>
                        <div class="p-6 rounded-bl-lg rounded-br-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full">
                                <p class="text-gray-300"><strong>Mahasiswa Cuti</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #C55959">
                                    <p class="font-semibold text-3xl text-gray-50">9</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Pengajuan Departemen -->
            <div class="px-8 pt-5 mt-7 mb-5">
                <h2 class="text-center text-lg font-semibold mb-4">Status Pengajuan Departemen</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#878A91]">
                            <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                            <th class="px-4 py-2 w-1/8 border-r border-white">Kode MK</th>
                            <th class="px-4 py-2 w-1/8 border-r border-white">Mata Kuliah</th>
                            <th class="px-4 py-2 w-1/8 border-r border-white">Jam</th>
                            <th class="px-4 py-2 w-1/8 border-r border-white">Ruang</th>
                            <th class="px-4 py-2 w-1/8 rounded-tr-lg">Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-4 border-r border-white">1</td>
                            <td class="px-4 py-4 border-r border-white">PAIK101</td>
                            <td class="px-4 py-4 border-r border-white">Pengembangan Berbasis Platform</td>
                            <td class="px-4 py-4 border-r border-white">19.00 - 20.00</td>
                            <td class="px-4 py-4 border-r border-white">E101</td>
                            <td class="px-4 py-4 justify-center">
                                <a class="px-4 py-1.5 bg-green-500 text-black rounded-md text-center"><strong>Terverifikasi</strong></a>
                            </td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-4 border-r border-white">2</td>
                            <td class="px-4 py-4 border-r border-white">PAIK102</td>
                            <td class="px-4 py-4 border-r border-white">Proyek Perangkat Lunak</td>
                            <td class="px-4 py-4 border-r border-white">07.00 - 09.30</td>
                            <td class="px-4 py-4 border-r border-white">E104</td>
                            <td class="px-4 py-4 justify-center">
                                <a class="px-9 py-1.5 text-black rounded-md text-center" style="background-color: #CDE440"><strong>Proses</strong></a>
                            </td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-4 border-r border-white">3</td>
                            <td class="px-4 py-4 border-r border-white">PAIK108</td>
                            <td class="px-4 py-4 border-r border-white">Pembelajaran Mesin</td>
                            <td class="px-4 py-4 border-r border-white">13.00 - 14.30</td>
                            <td class="px-4 py-4 border-r border-white">E304</td>
                            <td class="px-4 py-4 justify-center">
                                <a class="px-4 py-1.5 bg-green-500 text-black rounded-md text-center"><strong>Terverifikasi</strong></a>
                            </td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-4 border-r border-white rounded-bl-lg">4</td>
                            <td class="px-4 py-4 border-r border-white">PAIK109</td>
                            <td class="px-4 py-4 border-r border-white">Teori Bahasa dan Otomata</td>
                            <td class="px-4 py-4 border-r border-white">19.00 - 20.00</td>
                            <td class="px-4 py-4 border-r border-white">A304</td>
                            <td class="px-4 py-4 justify-center rounded-br-lg">
                                <a class="px-8 py-1.5 bg-red-600 text-black rounded-md text-center inline-block"><strong>Ditolak</strong></a>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="mt-5 flex justify-end">
                    <div class="rounded-lg py-2 px-5" style="background-color:#F0B90B">
                        <a href="#" class="text-center block text-white"><strong>Selengkapnya >></strong></a>
                    </div>
                </div>
            </div>

            <!-- Jadwal Mata Kuliah -->
            <div class="px-8 pt-5 mt-7 mb-5">
                <h2 class="text-center text-lg font-semibold mb-4">Jadwal Mengajar</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#878A91]">
                            <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Waktu</th>
                            <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                            <th class="px-4 py-2 w-1/4 rounded-tr-lg">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-3 border-r border-white">Senin, 07.00 - 09.30</td>
                            <td class="px-4 py-3 border-r border-white">Pengembangan Berbasis Platform - C</td>
                            <td class="px-4 py-3">E101</td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-3 border-r border-white">Senin, 10.00 - 12.00</td>
                            <td class="px-4 py-3 border-r border-white">Sistem Informasi - C</td>
                            <td class="px-4 py-3">A304</td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-3 border-r border-white">Rabu, 07.00 - 09.30</td>
                            <td class="px-4 py-3 border-r border-white">Manajemen Basis Data - B</td>
                            <td class="px-4 py-3">E304</td>
                        </tr>
                        <tr class="bg-[#2A2C33]">
                            <td class="px-4 py-3 border-r border-white rounded-bl-lg">Sabtu, 09.40 - 12.10</td>
                            <td class="px-4 py-3 border-r border-white">Proyek Perangkat Lunak - C</td>
                            <td class="px-4 py-3 rounded-br-lg">A302</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-5 flex justify-end">
                    <div class="rounded-lg py-2 px-5" style="background-color:#F0B90B">
                        <a href="#" class="text-center block text-white"><strong>Selengkapnya >></strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>