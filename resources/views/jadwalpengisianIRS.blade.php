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
                            <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Keterangan</th>
                            <th class="px-4 py-2 w-1/2 border-r border-white">Jadwal Mulai</th>
                            <th class="px-4 py-2 w-1/2 border-r border-white">Jadwal Berakhir</th>
                            <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="px-8 mt-5 flex justify-end">
                <div class="rounded-lg py-2 px-5" style="background-color:#34803C">
                <a href="#" class="text-center block text-white"><strong>Set Jadwal</strong></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>