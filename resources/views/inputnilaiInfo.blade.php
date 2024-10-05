<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>
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
            <!-- back to pembagian kelas -->
            <div class="flex justify-start my-4 mb-6 ml-8 ">
                <a href="/inputnilai" class="text-white text-left underline-offset-2 hover:text-gray-300 cursor-pointer"><< Back to Input Nilai</a>
            </div>
            <div class="px-8 pt-5">
                <h2 class="text-center text-lg font-semibold mb-4">Input Nilai</h2>
            </div>
            <div class="flex justify-between my-3 mb-3 ml-5 mr-5">
                <!-- Kolom kiri -->
                <div class="flex flex-col">
                    <div class="px-4 py-2">Mata Kuliah : XX</div>
                    <div class="px-4 py-2">Kode MK : XX</div>
                </div>
                <div class="flex flex-col">
                    <div class="px-4 py-2">Nama Mahasiswa : Muhamad Gunawan</div>
                    <div class="px-4 py-2">NIM : 24060122120016</div>
                </div>
            </div>                         
                <!-- Table mahasiswa -->
                <div class="px-8 pt-2 mt-5 mb-5 rounded-tl-lg">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/6 border-r border-white">Nama Mahasiswa</th>
                                <th class="px-4 py-2 w-1/8 border-r border-white">NIM</th>
                                <th class="px-4 py-2 w-1/8 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/12 border-r border-white">Tugas</th>
                                <th class="px-4 py-2 w-1/12 border-r border-white">Quiz</th>
                                <th class="px-4 py-2 w-1/12 border-r border-white">UTS</th>
                                <th class="px-4 py-2 w-1/12 border-r border-white">UAS</th>
                                <th class="px-4 py-2 w-1/12 " >Nilai</th>
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
                                <!-- Input Data Nilai Mahasiswa -->
                                <td class="px-4 py-2 border-r border-white">
                                    <input type="text" class="bg-[#2A2C33] text-white text-center w-full px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 hover:bg-[#3A3B40]" placeholder="">
                                </td>
                                <td class="px-4 py-2 border-r border-white">
                                    <input type="text" class="bg-[#2A2C33] text-white text-center w-full px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 hover:bg-[#3A3B40]" placeholder="">
                                </td>
                                <td class="px-4 py-2 border-r border-white">
                                    <input type="text" class="bg-[#2A2C33] text-white text-center w-full px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 hover:bg-[#3A3B40]" placeholder="">
                                </td>
                                <td class="px-4 py-2 border-r border-white">
                                    <input type="text" class="bg-[#2A2C33] text-white text-center w-full px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 hover:bg-[#3A3B40]" placeholder="">
                                </td>
                                <td class="px-4 py-2">
                                    <input type="text" class="bg-[#2A2C33] text-white text-center w-full px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 hover:bg-[#3A3B40]" placeholder="">
                                </td>                                                     
                            </tr>                                                    
                        </tbody>
                    </table>
                </div>
                <div class="px-8 mt-5 flex justify-end space-x-4">
                    <div href="/inputnilai" class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] min-w-[120px]">
                        <a href="/inputnilai" class="text-center block text-white"><strong>Simpan</strong></a>
                    </div>
                    <div href="/inputnilai" class="rounded-lg py-2 px-5 bg-[#A00000] hover:bg-[#880000] min-w-[120px]">
                        <a href="/inputnilai" class="text-center block text-white"><strong>Batal</strong></a>
                    </div>
                </div>                
        </div>
    </div>
</body>

</html>

