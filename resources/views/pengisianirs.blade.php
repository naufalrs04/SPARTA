<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian IRS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
              font-family: 'Roboto', sans-serif;
          }
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
                <div class="w-full rounded-full border-yellow-700 border-2 flex justify-between items-center">
                    <div id="pengisianIRS" class="w-1/2 rounded-full bg-yellow-700 border-[#17181C] cursor-pointer flex justify-center items-center px-4 transition ease-in-out duration-300" onclick="switchIRS('pengisianIRS')">
                        <h2 class="text-md font-bold">Pengisian IRS</h2>
                    </div>
                    <div id="irsMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 cursor-pointer transition ease-in-out duration-300" onclick="switchIRS('irsMahasiswa')">
                        <h2 class="text-md font-bold">IRS Mahasiswa</h2>
                    </div>                    
                </div>
            </div>
            <div id="contentPengisianIRS">
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
                        <div class="w-1/6 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800">
                            <p><strong>Ajukan</strong></p>
                        </div>
                        <div class="w-1/6 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#880000] hover:bg-red-500" >
                            <p><strong>Batal Ajukan</strong></p>
                        </div>
                    </div>
                </div>
    
                <div class="px-8 pt-5">
                    <h2 class="text-center text-lg font-semibold mb-4">List Mata Kuliah</h2>
                    <div class="flex justify-between items-center"> 
                        <!-- Dropdown Section -->
                        <div class="flex w-full rounded-lg relative">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" 
                                class="text-white bg-gray-800 hover:bg-gray-800 hover:opacity-70 focus:ring-4 focus:outline-none focus:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 w-full h-[3.40rem] flex justify-between items-center" 
                                type="button">
                                Mata Kuliah
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2">
                                <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li> 
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                
                        <!-- Search Section -->
                        <form class="w-full ml-4">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-white border border-gray-800 rounded-lg bg-gray-800 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari mata kuliah"/>
                            </div>
                        </form>                        
                    </div>
                </div>

                <div id="PopUpIRS" class="hidden">
                    <div class="px-8 pt-5 pb-10">
                        <div class="w-full h-full bg-[#878A91] rounded-lg">
                            <div class="container flex justify-between">
                                <div class="h-8 w-8 rounded-xl bg-white flex justify-center items-center ml-5 my-4">
                                    <button class="h-full w-full flex justify-center text-3xl text-black font-bold leading-none focus:outline-none">
                                        &lt;
                                    </button>
                                </div>
                                <div class="w-full h-full bg-white mx-5 my-4 rounded-xl">
                                    <div class="w-full space-y-4 px-6 md:px-8 text-center">
                                        <h1 class="mt-2 relative text-2xl font-bold inline-block underline-orange text-black">Mata Kuliah</h1>
                                        <div class="hidden h-0.5 w-full bg-black self-stretch md:block"></div>
                                        <div class="flex flex-wrap justify-center items-center text-center md:text-justify">
                                            <div class="w-full md:w-[49%] md:pr-4 lg:pr-8 text-black">
                                                <div class="mb-2">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                                <div class="mb-2 md:mb-5">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hidden w-0.5 bg-black self-stretch md:block"></div> 
                                            <div class="w-full md:w-[45%] md:ml-5 text-black">
                                                <div class="mb-2">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <h2 class="font-bold mb-1">Kode MK :</h2>
                                                    <div class="w-full h-10 bg-slate-300 rounded-xl flex items-center">
                                                        <h2 class="ml-5 text-black font-bold">PAIK 1012</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>                             
                            </div>
                            <div class="flex justify-center pb-5">
                                <div class="w-32 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800">
                                    <p><strong>Ajukan</strong></p>
                                </div>
                                <div class="w-32 ml-5 text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#880000] hover:bg-red-500" >
                                    <p><strong>Batal Ajukan</strong></p>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                
                <div class="px-8 pt-5 pb-10">
                    <table class="w-full text-center rounded-lg border-collapse" name="tabel_jadwal">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Waktu</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/4 border-white rounded-tr-lg">Ruangan</th>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <th class="px-4 py-2 w-1/4 border-r border-white">Waktu</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/4 border-white">
                                    <div class="h-8 w-8 mx-auto rounded-lg bg-white flex justify-center items-center">
                                        <button class="h-full w-full flex justify-center text-3xl text-black font-bold leading-none focus:outline-none">
                                            &gt;
                                        </button>
                                    </div>
                                </th>                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div id="contentIRSMahasiswa" class="hidden">
                <div class="px-4 sm:px-6 md:px-8 pt-5 pb-10">
                    <h2 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa</h2>
                    <div class="w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2"  >
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg cursor-pointer" id="semester-block">
                            <div class="w-full md:w-3/4 px-4 py-3 cursor-pointer" id="semester-block">
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

            <div id="details-modal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 class="text-center text-xl font-bold mb-4">IRS Mahasiswa (Sudah Disetujui Wali)</h2>
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white rounded-tl-lg">NO</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">KODE</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">MATAKULIAH</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">KELAS</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">SKS</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">RUANG</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white">STATUS</th>
                                <th class="px-4 py-2 border border-gray-300 bg-yellow-500 text-white rounded-tr-lg">NAMA DOSEN</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">1</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">PAIK6505</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Machine Learning<br><br>Selasa, 07.00 - 09.30</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">C</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">3</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">E102</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">Baru</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Dr. Retno Kusumaningrum, S. Si., M.Kom.<br>Rismiyati, B.Eng, M.Cs</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">2</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">PAIK6702</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Teori Bahasa Otomata<br><br>Selasa, 13.00 - 15.30</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">C</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">3</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">E101</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">Baru</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Dr. Yeva Fadhilah Ashari, S.Si., M.Si.<br>Priyo Sidik Sasongko, S.Si., M.Kom.<br>Etna Vianita, S.Mat., M.Mat.</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">3</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">PAIK6501</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Pemrograman Berbasis Platform<br><br>Rabu, 07.00 - 10.20</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">D</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">4</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">E101</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">Baru</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Sandy Kurniawan, S.Kom., M.Kom.<br>Adhe Setya Pramayoga, M.T.<br>Henry Tantyoko, S.Kom., M.Kom.</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">4</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">PAIK6503</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Sistem Informasi<br><br>Rabu, 15.40 - 18.10</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">D</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">3</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">E102</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">Baru</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Beta Noranita, S.Si., M.Kom.<br>Dr. Indra Waspada, S.T., M.T.I</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">5</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">PAIK6502</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Komputasi Tersebar Paralel<br><br>Kamis, 13.00 - 15.30</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">C</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">3</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">A303</td>
                                <td class="px-4 py-2 border border-gray-300 text-center align-top">Baru</td>
                                <td class="px-4 py-2 border border-gray-300 align-top">Guruh Aryotejo, S.Kom., M.Sc.<br>Adhe Setya Pramayoga, M.T.<br>Dr. Eng. Adi Wibowo, S.Si., M.Kom.</td>
                            </tr>
                        </tbody>
                    </table>
            
            <script>
                function switchIRS(selected) {
                    // Log which tab is selected
                    // console.log("Selected tab:", selected);

                    // Elements for tabs
                    const pengisianIRS = document.getElementById('pengisianIRS');
                    const irsMahasiswa = document.getElementById('irsMahasiswa');
                    
                    // Elements for content
                    const contentPengisianIRS = document.getElementById('contentPengisianIRS');
                    const contentIRSMahasiswa = document.getElementById('contentIRSMahasiswa');
                    
                    // Switch active tab and color
                    if (selected === 'pengisianIRS') {
                        // console.log("Switching to Pengisian IRS");
                        pengisianIRS.classList.add('bg-yellow-700', 'border-[#17181C]');
                        irsMahasiswa.classList.remove('bg-yellow-700', 'border-[#17181C]');
                        
                        // Show Pengisian IRS content and hide IRS Mahasiswa content
                        contentPengisianIRS.classList.remove('hidden');
                        contentIRSMahasiswa.classList.add('hidden');
                    } 
                    
                    else if (selected === 'irsMahasiswa') {
                        // console.log("Switching to IRS Mahasiswa");
                        irsMahasiswa.classList.add('bg-yellow-700', 'border-[#17181C]');
                        pengisianIRS.classList.remove('bg-yellow-700', 'border-[#17181C]');
                        
                        // Show IRS Mahasiswa content and hide Pengisian IRS content
                        contentIRSMahasiswa.classList.remove('hidden');
                        contentPengisianIRS.classList.add('hidden');
                    }
                }

                const popup = document.getElementById('PopUpIRS');
                const showButton = document.querySelector('th button'); // Button to show popup (&gt;)
                const hideButton = document.querySelector('#PopUpIRS button'); // Button to hide popup (&lt;)

                // Show the popup when the '>' button is clicked
                showButton.addEventListener('click', () => {
                    popup.classList.remove('hidden');
                    popup.classList.add('block');
                });

                // Hide the popup when the '<' button is clicked
                hideButton.addEventListener('click', () => {
                    popup.classList.remove('block');
                    popup.classList.add('hidden');
                });

                document.getElementById('semester-block').addEventListener('click', function() {
                    var modal = document.getElementById('details-modal');
                    modal.style.display = "block";
                });

                document.querySelector('.close').addEventListener('click', function() {
                    var modal = document.getElementById('details-modal');
                    modal.style.display = "none";
                });

                window.onclick = function(event) {
                    var modal = document.getElementById('details-modal');
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>