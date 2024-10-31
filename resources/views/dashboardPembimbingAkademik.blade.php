<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <style>
        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 0.5rem;
            color: white;
            border-right: 2px solid white;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }

        .welcome-message-static {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar_pa')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
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
                                    <p style="color: #F0B90B"><strong>Dosen Wali :</strong></p>
                                    <p>Luthfan Lazuardi, S.Kom, M.Cs</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>NIP Dosen Wali :</strong></p>
                                    <p class="mb-1">10101010101010</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>Semester Akademik :</strong></p>
                                    <p>2024/2025 Ganjil</p>
                                </div>
                            </div>
                            <div class="col-span-4 p-6 text-center rounded-tr-lg rounded-br-lg text-lg space-y-2 box-border border-black flex flex-col items-center gap-1.5">
                            </div>
                            <div class="content-center col-span-12 text-white text-center py-3 rounded-md mx-5 mb-5" style="background-color: #34803C">
                                <p class="text-2xl text-center "><strong>AKTIF</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Box Capaian Akademik -->
                    <div class="col-span-4 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Perwalian</h2>


                        <!-- Box Utama Capaian Akademik -->
                        <div class="p-6 rounded-tl-lg rounded-tr-lg text-lg space-y-4 flex-grow flex flex-col items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full mb-3">
                                <p style="color: #F0B90B">Semester Akademik</p>
                                <p style="color:#ffff"><strong>2024/2025 Ganjil</strong></p>
                            </div>

                            <div class="text-center w-full">
                                <p class="text-white"><strong>Mahasiswa Aktif</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #880000">
                                    <p class="font-semibold text-3xl text-gray-50">34</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #FFFFFF">
                            </div>
                        </div>
                        <div class="p-6 rounded-bl-lg rounded-br-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full">
                                <p class="text-white"><strong>Mahasiswa Cuti</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #C68E00">
                                    <p class="font-semibold text-3xl text-gray-50">16</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Mata Kuliah -->
            <div class="px-8 pt-5 mt-5 mb-5">
                <h2 class="text-center text-lg font-semibold mb-4">Jadwal Mata Kuliah</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#878A91]">
                            <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Waktu</th>
                            <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                            <th class="px-4 py-2 w-1/4 rounded-tr-lg">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>