<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengisian IRS</title>
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
            <div class="px-8 pt-5 mt-5 mb-5">
                <h2 class="text-center text-lg font-semibold mb-4">Jadwal Pengisian IRS</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#878A91]">
                            <th class="px-4 py-2 w-1/6 border-r border-white rounded-tl-lg">Keterangan</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Jadwal Mulai</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Jadwal Berakhir</th>
                            <th class="px-4 py-2 w-1/6 rounded-tr-lg">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #23252A;">
                            <td class="px-4 py-2 border-r border-white">Pengisian IRS</td>
                            <td class="px-4 py-2 border-r border-white">10 Juli 2024</td>
                            <td class="px-4 py-2 border-r border-white">1 Agustus 2024</td>                              
                            <td class="px-5 py-2 text-center">
                                <button onclick="window.location.href='#'" class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                    <strong>Edit</strong>
                                </button>
                            </td>
                        </tr>
                        <tr style="background-color: #23252A;">
                            <td class="px-4 py-2 border-r border-white">Pembatalan</td>
                            <td class="px-4 py-2 border-r border-white">1 Agustus 2024</td>
                            <td class="px-4 py-2 border-r border-white">7 Agustus 2024</td>                              
                            <td class="px-5 py-2 text-center">
                                <button onclick="window.location.href='#'" class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                    <strong>Edit</strong>
                                </button>
                            </td>
                        </tr>
                        <tr style="background-color: #23252A;">
                            <td class="px-4 py-2 border-r border-white">Perubahan</td>
                            <td class="px-4 py-2 border-r border-white">7 Agustus 2024</td>
                            <td class="px-4 py-2 border-r border-white">14 Agustus 2024</td>                              
                            <td class="px-5 py-2 text-center">
                                <button onclick="window.location.href='#'" class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                    <strong>Edit</strong>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-8 mt-5 flex justify-end">
                <div class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] min-w-[120px]">
                <a href="#" class="text-center block text-white"><strong>Set Jadwal</strong></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>