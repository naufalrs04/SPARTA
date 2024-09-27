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
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            <!-- Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
            <div class="bg-gray-800 px-8 pt-5 flex justify-center items-center" style="background-color: #17181C;">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Box Status Akademik -->
                    <div class="col-span-8 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Akademik</h2>

                        <!-- Box Utama Status Akademik -->
                        <div class="grid grid-cols-12 w-full rounded-lg flex-grow" style="background-color: #2A2C33;">
                            <div class="col-span-8 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B"><strong>Nama :</strong></p>
                                    <p>Luthfan Lazuardi, S.Kom, M.Cs</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>NIP :</strong></p>
                                    <p class="mb-1">10101010101010</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>Status:</strong></p>
                                    <p>Dosen</p>
                                </div>
                            </div>
                            <div class="col-span-12 text-white text-center rounded-md mx-5 mb-5 flex justify-center items-center" style="background-color: #34803C;">
                                <p><strong>AKTIF</strong></p>
                            </div>

                        </div>
                    </div>

                    <!-- Box Capaian Akademik -->
                    <div class="col-span-4 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Departemen</h2>

                        <!-- Box Utama Capaian Akademik -->
                        <div class="p-6 rounded-tl-lg rounded-tr-lg text-lg space-y-4 flex-grow flex flex-col items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full mb-3">
                                <p style="color: #F0B90B">Ruangan</p>
                                <p style="color:#ffff"><strong>2024/2025 Ganjil</strong></p>
                            </div>

                            <div class="text-center w-full">
                                <p class="text-white"><strong>Departemen Sudah di Set</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #880000">
                                    <p class="font-semibold text-3xl text-gray-50">34</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33;">
                            <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #FFFFFF;">
                            </div>
                        </div>
                        <div class="p-7 rounded-bl-lg rounded-br-lg text-lg text-center space-y-4" style="background-color: #2A2C33;">
                            <p class="text-gray-300"><strong>Departemen Belum di Set</strong></p>
                            <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #C68E00;">
                                <p class="font-semibold text-3xl text-gray-50">42</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>