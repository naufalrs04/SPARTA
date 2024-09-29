<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            @include('components.navbar')

            {{-- Main Content --}}
            <div class="px-8 pt-5 flex justify-center items-center">
                <div class="w-full rounded-full border-yellow-700 border-2 flex justify-between items-center cursor-pointer" onclick="switchIRS('pengisianIRS')">
                    <div id="pengisianIRS" class="w-1/2 rounded-full bg-yellow-700 border-[#17181C] border-2 flex justify-center items-center px-4">
                        <h2 class="text-md font-bold">Pengisian IRS</h2>
                    </div>
                    <div id="irsMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 cursor-pointer" onclick="switchIRS('pengisianIRS')"">
                        <h2 class="text-md font-bold">IRS Mahasiswa</h2>
                    </div>
                </div>
            </div>
            <div id="contentPengisianIRS" class="content-section hidden">
                <div class="px-8 pt-5">
                    <h2 class="text-center text-lg font-semibold mb-4">Ringkasan Mata Kuliah yang diambil</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/5 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Kode MK</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Waktu</th>
                                <th class="px-4 py-2 w-1/5 rounded-tr-lg">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">1</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK101</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PBO - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">07.30 - 09.30</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">2</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK102</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PBP - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">09.30 - 12.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">3</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK103</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PPL - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">13.00 - 15.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">4</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK104</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">SI - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">17.30 - 20.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="py-5 flex">
                        <div class="w-3/5 flex justify-between">
                            <p class="text-xs">Notes : Jika mata kuliah ingin diproses oleh dosen wali, klik tombol di sebelah kanan</p>
                        </div>
                        <div class="w-1/6 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md" style="background-color: #34803C">
                            <p><strong>Ajukan</strong></p>
                        </div>
                        <div class="w-1/6 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md" style="background-color: #880000">
                            <p><strong>Batal Ajukan</strong></p>
                        </div>
                    </div>
                </div>
    
                <div class="px-8 pt-5">
                    <h2 class="text-center text-lg font-semibold mb-4">List Mata Kuliah</h2>
                    <div class="flex justify-between">
                        <div class="bg-[#23252A] flex w-4/6 rounded-lg">
                            <div class="w-1/2 h-10 items-center flex justify-between">
                                <h2 class="text-[#94959A] ml-5 text-left font-semibold">Mata Kuliah</h2>
                            </div>
                            <div class="w-1/2 flex items-center justify-end mr-5">
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="bg-[#23252A] ml-5 flex w-2/6 rounded-lg">
                            <div class="w-full h-10 items-center flex justify-between">
                                <h2 class="text-[#94959A] ml-5 text-left font-semibold">Cari Mata Kuliah</h2>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="px-8 pt-5 pb-10">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/5 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Kode MK</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">Waktu</th>
                                <th class="px-4 py-2 w-1/5 rounded-tr-lg">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">1</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK101</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PBO - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">07.30 - 09.30</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">2</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK102</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PBP - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">09.30 - 12.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">3</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK103</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PPL - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">13.00 - 15.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                            <tr style="background-color: #23252A">
                                <th class="px-4 py-2 w-1/5 border-r border-white">4</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">PAIK104</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">SI - A</th>
                                <th class="px-4 py-2 w-1/5 border-r border-white">17.30 - 20.00</th>
                                <th class="px-4 py-2 w-1/5 ">Info</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div id="contentIRSMahasiswa" class="content-section">
                <div class="px-4 sm:px-6 md:px-8 pt-5 pb-10">
                    <h2 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa</h2>
                    <div class="w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2">
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <script>
                function switchIRS(selected) {
                    // Elements for tabs
                    const pengisianIRS = document.getElementById('pengisianIRS');
                    const irsMahasiswa = document.getElementById('irsMahasiswa');
                    
                    // Elements for content
                    const contentPengisianIRS = document.getElementById('contentPengisianIRS');
                    const contentIRSMahasiswa = document.getElementById('contentIRSMahasiswa');
                    
                    // Check which tab is clicked and toggle classes
                    if (selected == 'pengisianIRS') {
                        pengisianIRS.classList.add('bg-yellow-700', 'border-[#17181C]');
                        irsMahasiswa.classList.remove('bg-yellow-700', 'border-[#17181C]');
                        
                        contentPengisianIRS.classList.remove('hidden');
                        contentIRSMahasiswa.classList.add('hidden');
                    } else if (selected == 'irsMahasiswa') {
                        irsMahasiswa.classList.add('bg-yellow-700', 'border-[#17181C]');
                        pengisianIRS.classList.remove('bg-yellow-700', 'border-[#17181C]');
                        
                        contentIRSMahasiswa.classList.remove('hidden');
                        contentPengisianIRS.classList.add('hidden');
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>