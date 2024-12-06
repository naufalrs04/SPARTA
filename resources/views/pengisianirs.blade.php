@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian IRS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* .sksDragButton {
            height: 48px;
            width: 48px;
            background: #ffc919;
            border-radius: 50%;
            box-shadow: 2px 2px 1px 1px rgba(0, 0, 0, 2.5);
            position: absolute;
            top: 48px;
            right: 100px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .sksDragButton.active .btn {
            transform: rotateZ(45deg);
        }

        .sksDragButton .btn {
            color: #ffffff;
            font-size: 36px;
            font-weight: bold;
            user-select: none;
            transition: all 500ms;
        }

        .sksDragButton .sksSidebar{
            position: absolute;
            color: #ffffff;
            left: -440%;
            top: -50%;
            background: #e0be11;
            box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5);
            transform: translateX(50px);
            opacity: 0;
            pointer-events: none;
            transition: all 500ms;
        }

        .sksDragButton.active .sksSidebar {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto;
        } */

        /* .custom-btn-container .btn-options a {
            display: block;
            padding: 8px 32px;
            background: #909000;
            text-decoration: none;
            font-weight: bold;
            font-family: "Poppins", sans-serif;
            font-size: 15px;
            color: #000000;
            transition: all 500ms;
        } */


        /* #sksSidebar {
            opacity: 0;
            transition: left 0.3s ease-in-out, opacity 0.3s ease-in-out;
            top: 40%;
            left: -300px;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            animation: slide 3s infinite;
        }

        .hidden {
            display: none;
        }

        #sksSidebar.show {
            left: 0 ;
            opacity: 1;
        }  */

        /* #toggleSidebar {
            top: 40%;
            left: 0;
            color: white;
            padding: 10px;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        #toggleSidebar.rotated {
            transform: rotate(180deg);
        } */

        /* Update collision-overlay jika diperlukan */
        .collision-overlay {
            position: absolute;
            left: 0;
            right: 65px;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 10;
        }

        .course-row {
            position: relative;
        }

        /* Tambahkan di bagian style yang sudah ada */
        .cancel-course:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        #contentPengisianIRS{
            min-height:100vh;
        }

        #contentIRSMahasiswa{
            min-height:100vh;
        }
    </style>
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-900' }} relative">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="flex min-h-screen backdrop-blur-sm" style="{{ $theme == 'light' ? 'background-color: #17181C;' : 'background-color: #eeeeee;' }}">
        <!-- Efek latar belakang -->
        <div class="absolute inset-0 z-[-1]">
            <div class="absolute inset-0 flex justify-center">
                <div class="bg-shape1 bg-teal opacity-50 bg-blur"></div>
                <div class="bg-shape2 bg-primary opacity-50 bg-blur"></div>
                <div class="bg-shape1 bg-purple opacity-50 bg-blur"></div>
            </div>
        </div> 

        <!-- Sidebar -->
        @include('components.sidebar', ['theme' => $theme])

        <!-- Content -->
        <div class="flex-grow">
            @include('components.navbar', ['theme' => $theme])

            {{-- Main Content --}}
            <div class="px-8 pt-5 flex justify-center items-center {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="w-full rounded-full border-yellow-500 border-2 px-4 py-2 flex justify-between items-center">
                    <div id="pengisianIRS"
                    
                        class="w-1/2 rounded-full bg-yellow-500 px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300"
                        onclick="switchIRS('pengisianIRS')">
                        <h2 class="text-md font-bold">Pengisian IRS</h2>
                    </div>
                    <div id="irsMahasiswa"
                        class="w-1/2 rounded-full flex justify-center items-center px-4 py-1 cursor-pointer transition ease-in-out duration-300"
                        onclick="switchIRS('irsMahasiswa')">
                        <h2 class="text-md font-bold">IRS Mahasiswa</h2>
                    </div>
                </div>
            </div>
            <div id="contentPengisianIRS" class="min-h-screen px-10 pt-5 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="h-full">
                    <div class="text-center">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Daftar Mata Kuliah yang diambil</h2>
                    </div>
                    <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)"> 
                        <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" id="summaryTable">
                            <thead>
                                <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                    <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                    <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Kode MK</th>
                                    <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Mata Kuliah</th>
                                    <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Kelas</th>
                                    <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Waktu</th>
                                    <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">SKS</th>
                                    <th class="px-4 py-2 batalkan-column">Batalkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($irs_rekap as $rekap)
                                <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                    <td class="px-4 py-4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $rekap->kode_mk }}</td>
                                    <td class="px-4 py-3 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $rekap->nama_mk }}</td>
                                    <td class="px-4 py-3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $rekap->kelas }}</td>
                                    <td class="px-4 py-3 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                        {{ $rekap->hari }},
                                        {{ \Carbon\Carbon::parse($rekap->jam_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($rekap->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-3 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $rekap->sks }}</td>
                                    <td class="px-4 py-3 batalkan-column {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                        <button class="cancel-course px-2 py-1 font-semibold rounded-xl bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                            data-id="{{ $rekap->kode_mk }}"
                                            data-mahasiswa-id="{{ $rekap->mahasiswa_id }}"
                                            data-semester="{{ $rekap->semester }}">
                                            Batalkan
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="sksSidebar block sticky top-1 w-full bg-yellow-500 p-2 pl-10 mt-4 text-sm rounded-2xl
                    {{ $theme == 'light' ? 'text-gray-200 border border-black' : ' text-gray-800 border border-black' }}" 
                    style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); z-index: 100; display: flex; justify-content: space-around; align-items: center;">
                        <div class="flex items-center space-x-4">
                            <div>
                                <h2 class="text-xl font-bold">Total SKS Diambil</h2>
                            </div>
                            <div>
                                <div id="totalSks" class="text-2xl font-semibold">0</div>
                            </div>
                        </div>                    
                        <div class="text-center text-lg">
                            <p class="my-1">IPS semester lalu : <strong>{{ $ips }}</strong></p>
                        </div>
                        <div class="text-center text-lg">
                            <p class="my-1">Maksimum SKS : <strong>{{ $maxSKS }}</strong></p>
                        </div>
                    </div>
                    <div class="pt-5 pb-3 flex">
                        <div class="w-3/5 flex justify-between">
                            <div>
                                <p class="pl-1 text-sm italic rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Notes : Jika mata kuliah ingin diproses oleh dosen wali, klik tombol di sebelah</p>
                            </div>
                        </div>
                        <div id="ajukanButton" class="w-1/6 ml-auto flex text-center cursor-pointer font-bold items-center justify-center py-3 rounded-xl bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                            <button onclick="ajukanIRS()"
                            @if(is_null($mahasiswa->status) || $mahasiswa->status == 0) disabled @endif>
                            Ajukan</button>
                        </div>
                        <div id="batalAjukanButton" class="w-1/6 ml-auto flex text-center cursor-pointer font-bold items-center justify-center py-3 rounded-xl bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white" @if($rekap->status_pengajuan == 'disetujui') style="display: none;" @endif>
                            <button onclick="batalAjukanIRS()">
                                Batal Ajukan
                            </button>
                        </div>
                    </div>

                    {{-- <!--SKS SIDEBAR DRAGGABLE-->
                    <div class="sksDragButton">
                        <div class="btn">+
                        </div>
                        <div class="sksSidebar rounded-3xl p-3">
                            <h2 class="text-xl text-right font-bold mb-4">Total SKS Diambil</h2>
                            <div id="totalSks" class="text-right text-4xl font-semibold">0</div>
                            <p class="text-right text-sm mt-2">IPS semester lalu <strong>{{ $ips }}</strong></p>
                            <p class="text-right text-sm mt-2">Maksimum SKS: <strong>{{ $maxSKS }}</strong></p>
                        </div>
                    </div> --}}
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/jquery-ui.min.js" integrity="sha512-MSOo1aY+3pXCOCdGAYoBZ6YGI0aragoQsg1mKKBHXCYPIWxamwOE7Drh+N5CPgGI5SA9IEKJiPjdfqWFWmZtRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

                    {{-- <!-- SKS Sidebar -->
                    <div id="sksSidebar" class="fixed bg-opacity-85 bg-yellow-600 h-auto w-64 text-white transition-all duration-300 p-4 shadow-lg rounded-lg">
                        <h2 class="text-xl text-right font-bold mb-4">Total SKS Diambil</h2>
                        <div id="totalSks" class="text-right text-4xl font-semibold">0</div>
                        <p class="text-right text-sm mt-2">IPS semester lalu <strong>{{ $ips }}</strong></p>
                        <p class="text-right text-sm mt-2">Maksimum SKS: <strong>{{ $maxSKS }}</strong></p>
                    </div> 
                    <!-- Tombol untuk memperlihatkan sidebar -->
                    <button id="toggleSidebar" class="fixed bg-opacity-85 left-0 bg-yellow-500 text-white p-3 rounded-r-lg shadow-lg focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>  --}}
                
                

                    <div id="listMataKuliah" class="py-7">
                        <div class="text-center">
                            <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">List Mata Kuliah</h2>
                        </div>
                        <div class="flex justify-between items-center pb-7">
                            <!-- Search Section -->
                            <form class="w-full">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search"
                                        class="block w-full p-4 pl-10 text-sm rounded-2xl
                                        {{ $theme == 'light' ? 'bg-[#2A2C33] text-gray-200 border border-black hover:bg-gray-600 hover:text-white' : 'bg-[#eeeeee] text-gray-800 border border-black hover:bg-gray-300 hover:text-black' }}" 
                                        style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5);"
                                        placeholder="Cari mata kuliah" />
                                </div>
                            </form>
                        </div>
                        <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)"> 
                            <table class="w-full text-center rounded-lg border-collapse" name="tabel_jadwal">
                                <thead>
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                        <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                        <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Kode Mata Kuliah</th>
                                        <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Mata Kuliah</th>
                                        <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Waktu</th>
                                        <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Kapasitas</th>
                                        <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Pengambilan</th>
                                        <th class="px-4 py-2">Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_mata_kuliah as $index => $mk)
                                        <tr class="course-row {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}"
                                            data-course-id="{{ $mk->id }}"
                                            data-course-time="{{ $mk->hari }}, {{ \Carbon\Carbon::parse($mk->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($mk->jam_selesai)->format('H:i') }}"
                                            data-ruangan-id="{{ $mk->ruang }}">
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mk->kode_mk }}
                                            </td>
                                            <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mk->nama_mk }} - {{ $mk->kelas }}
                                            </td>
                                            <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                {{ $mk->hari }},
                                                {{ \Carbon\Carbon::parse($mk->jam_mulai)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($mk->jam_selesai)->format('H:i') }}
                                            </td>
                                            <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mk->jumlah_pendaftar }} / {{ $mk->kapasitas }}
                                            </td>
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                <form action="{{ route('irs-rekap.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="kode_mk" value="{{ $mk->kode_mk }}">
                                                    <input type="hidden" name="ruang" value="{{ $mk->ruang}}">
                                                    <input type="hidden" name="sks_mk" id="input-sks" value="{{ $mk->sks_mk }}">
                                                    <input type="hidden" name="id" value="{{ $mk->id }}">
                                                    <input type="hidden" name="nama_mk" value="{{ $mk->nama_mk }}">
                                                    <input type="hidden" name="kelas" value="{{ $mk->kelas }}">
                                                    <input type="hidden" name="kapasitas" value="{{ $mk->kapasitas }}">
                                                    
                                                    <div
                                                        class="text-center items-center justify-center mx-2 my-1 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                                                        <button class="ambil-mata-kuliah"
                                                            data-kode="{{ $mk->kode_mk }}"
                                                            data-nama="{{ $mk->nama_mk }}"
                                                            data-jadwal="{{ $mk->id }}"
                                                            data-ruang="{{ $mk->ruang }}"
                                                            data-kelas="{{ $mk->kelas }}"
                                                            data-kapasitas="{{ $mk->kapasitas }}"
                                                            data-hari-jam="{{ $mk->hari }}, {{ \Carbon\Carbon::parse($mk->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($mk->jam_selesai)->format('H:i') }}"
                                                            data-sks="{{ $mk->sks_mk }}" type="submit"
                                                            @if(is_null($mahasiswa->status) || $mahasiswa->status == 0) disabled @endif>
                                                            Ambil
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="px-4 py-2 {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                                <div class="h-7 w-7 mx-auto rounded-lg border flex justify-center items-center transition-colors duration-200 hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out
                                                {{ $theme == 'light' ? 'bg-white border-transparent hover:bg-gray-400' : 'bg-gray-300 border-gray-500 hover:bg-gray-400' }}">
                                                    <button class="show-details text-center text-3xl font-bold focus:outline-none 
                                                        {{ $theme == 'light' ? 'text-black' : 'text-white' }}" data-index="{{ $index }}"
                                                        @if(is_null($mahasiswa->status) || $mahasiswa->status == 0) disabled @endif>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contentIRSMahasiswa" class="hidden {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                @foreach($groupedData as $mahasiswaId => $semesterGroups)
                <div class="mahasiswa-container px-4 sm:px-6 md:px-8 pt-5 h-full ">
                    <div class="text-center">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">IRS Mahasiswa</h2>
                    </div>

                    <div class="w-full rounded-2xl">
                        <div class="m-2 rounded-3xl">
                            @for($semester = 1; $semester <= $semesterMahasiswa; $semester++)
                                @if(isset($semesterGroups[$semester]))
                                <div class="w-full rounded-2xl mb-4 {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                                <div class="w-full flex justify-between items-center px-4 py-3">
                                    <div>
                                        <div class="text-center">
                                            <h3 class="font-bold text-md sm:text-lg mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">IRS Semester {{ $semester }}</h3>
                                        </div>
                                        <p class="text-md sm:text-lg px-2">Jumlah SKS: {{ $semesterGroups[$semester]->sum('sks') }}</p>
                                    </div>
                                    <button type="button"
                                        class="toggle-semester p-2 hover:bg-[#666666] rounded-full transition-colors">
                                        <svg class="plus-icon w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        <svg class="minus-icon w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="semester-content hidden px-4 pb-6 overflow-x-auto" id="semester">
                                    <h4 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa {{$rekap->status_pengajuan}} ! </h4>
                                    <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" > 
                                    <table class="w-full bg-white rounded-2xl">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-black rounded-tl-lg">NO</th>
                                                <th class="px-4 py-2 text-left text-black">KODE</th>
                                                <th class="px-4 py-2 text-left text-black">MATA KULIAH</th>
                                                <th class="px-4 py-2 text-left text-black">KELAS</th>
                                                <th class="px-4 py-2 text-left text-black">SKS</th>
                                                <th class="px-4 py-2 text-left text-black">RUANG</th>
                                                <th class="px-4 py-2 text-left text-black">STATUS</th>
                                                <th class="px-4 py-2 text-left text-black rounded-tr-lg">NAMA DOSEN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($semesterGroups[$semester] as $rekap)
                                            @if($rekap->semester == $semester)
                                            <tr class="border-t">
                                                <td class="px-4 py-2 text-black">{{ $loop->iteration }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->kode_mk }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->nama_mk }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->kelas }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->sks }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->ruang }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->status_pengambilan }} </td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->nama_dosen }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>

                                @if($rekap->status_pengajuan == 'disetujui')
                                    <div class="flex justify-end mb-4 pr-5 pb-5">
                                        <button onclick="generatePDF()" class="px-4 py-2 rounded-3xl font-bold bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                                            Cetak PDF
                                        </button>
                                    </div>
                                @endif
                        </div>
                        @else
                        <div class="w-full rounded-2xl mb-4 px-4 py-3 {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="">
                                <h3 class="font-bold text-md sm:text-lg mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">IRS Semester {{ $semester }}: Tidak ada data</h3>
                            </div>
                        </div>
                        @endif
                        @endfor
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <script>
        // $('.sksDragButton').draggable();

        // $('.sksDragButton').click(function(){
        //     $(this).toggleClass('active');
        // })
    </script> --}}

    <!-- search bar -->
    <script>
        document.getElementById('default-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('table[name="tabel_jadwal"] tbody tr');

            rows.forEach(row => {
                const courseName = row.querySelector('td:nth-child(3)').innerText
                    .toLowerCase(); // Assuming 3rd column has course name
                const courseCode = row.querySelector('td:nth-child(2)').innerText
                    .toLowerCase(); // Assuming 2nd column has course code

                if (courseName.includes(searchTerm) || courseCode.includes(searchTerm)) {
                    row.style.display = ''; // Show the row if it matches
                } else {
                    row.style.display = 'none'; // Hide the row if it doesn't match
                }
            });
        });
    </script>

    <!-- change content irs mahasiswa -->
    <script>
        // switch pengisian irs - irs mahasiswa
        function switchIRS(selected) {
            // Elements for tabs
            const pengisianIRS = document.getElementById('pengisianIRS');
            const irsMahasiswa = document.getElementById('irsMahasiswa');

            // Elements for content
            const contentPengisianIRS = document.getElementById('contentPengisianIRS');
            const contentIRSMahasiswa = document.getElementById('contentIRSMahasiswa');

            // Switch active tab and color
            if (selected === 'pengisianIRS') {
                // console.log("Switching to Pengisian IRS");
                pengisianIRS.classList.add('bg-yellow-500', 'border-[#17181C]');
                irsMahasiswa.classList.remove('bg-yellow-500', 'border-[#17181C]');

                // Show Pengisian IRS content and hide IRS Mahasiswa content
                contentPengisianIRS.classList.remove('hidden');
                contentIRSMahasiswa.classList.add('hidden');
            } else if (selected === 'irsMahasiswa') {
                // console.log("Switching to IRS Mahasiswa");
                irsMahasiswa.classList.add('bg-yellow-500', 'border-[#17181C]');
                pengisianIRS.classList.remove('bg-yellow-500', 'border-[#17181C]');

                // Show IRS Mahasiswa content and hide Pengisian IRS content
                contentIRSMahasiswa.classList.remove('hidden');
                contentPengisianIRS.classList.add('hidden');
            }
        }
    </script>

    <!-- show details info matkul -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const courseDetails = @json($list_mata_kuliah);

            document.querySelectorAll('.show-details').forEach((button) => {
                button.addEventListener('click', () => {
                    const index = button.getAttribute('data-index');
                    const details = courseDetails[index];

                    Swal.fire({
                        title: `<strong>Detail Mata Kuliah</strong>`,
                        html: `
                                        <div class="text-left space-y-4">
                                            <div>
                                                <h2 class="font-bold mb-1">Mata Kuliah :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.nama_mk} - ${details.kelas} </h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Kode Mata Kuliah :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.kode_mk}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">SKS :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.sks_mk}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Jadwal :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.hari}, ${details.jam_mulai} - ${details.jam_selesai}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Ruangan :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.ruang}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Kapasitas:</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.kapasitas}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Dosen Pengampu :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.dosen}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    `,
                        confirmButtonText: 'Tutup',
                        focusConfirm: false,
                        didOpen: () => {
                            const confirmButton = Swal.getConfirmButton();
                            confirmButton.style.backgroundColor = '#4CAF50'; 
                            confirmButton.style.color = '#fff';               
                            confirmButton.style.borderRadius = '8px';         
                            confirmButton.style.padding = '10px 20px';        
                            confirmButton.style.fontWeight = 'bold';          
                        }
                    });
                });
            });
        });
    </script>


    <script>
        // Update the event listener for form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Get the button that was clicked
                const button = event.submitter;
                const kode = button.getAttribute('data-kode');
                const jadwal = button.getAttribute('data-jadwal');
                const ruang = button.getAttribute('data-ruang');
                const kelas = button.getAttribute('data-kelas');
                const kapasitas = button.getAttribute('data-kapasitas');
                const nama = button.getAttribute('data-nama');
                const hariJam = button.getAttribute('data-hari-jam');
                const sks = parseInt(button.getAttribute('data-sks'));

                // Show confirmation dialog
                if (hasConflict(kode, hariJam)) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Anda sudah mengambil mata kuliah ini dalam kelas lain!',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded'
                        }
                    });
                    return;
                }

                Swal.fire({
                    title: 'Konfirmasi Pengambilan Mata Kuliah',
                    html: `
                            <div class="bg-white rounded-lg shadow p-4 mb-4">
                                <h2 class="text-xl font-bold mb-4">Detail Mata Kuliah</h2>
                                <p class="mb-2"><strong class="text-gray-700">Kode:</strong> <span class="text-gray-900">${kode}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">Mata Kuliah:</strong> <span class="text-gray-900">${nama}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">Jadwal:</strong> <span class="text-gray-900">${hariJam}</span></p>
                                <p class="mb-2"><strong class="text-gray-700">SKS:</strong> <span class="text-gray-900">${sks}</span></p>
                            </div>
                            <p class="mt-4">Apakah Anda yakin ingin mengambil mata kuliah ini?</p>
                        `,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#34803C',
                    cancelButtonColor: '#880000',
                    confirmButtonText: 'Ya, Ambil',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData(form);

                        // Send the form data using fetch API
                        fetch(form.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                            })
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(err => Promise.reject(err));
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    // Add the course to the summary table
                                    addCourseToSummary({
                                        kode: kode,
                                        nama: nama,
                                        kelas: kelas,
                                        waktu: hariJam,
                                        sks: sks
                                    });

                                    // Update total SKS
                                    //updateTotalSKS(sks);

                                    // Show success message
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Mata kuliah berhasil ditambahkan',
                                        icon: 'success',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                } else {
                                    throw new Error(data.message || 'Terjadi kesalahan');
                                }
                            })
                            .catch((error) => {
                                console.error('Error:', error);

                                let errorMessage =
                                    'Terjadi kesalahan saat menambahkan mata kuliah';

                                if (error.errors) {
                                    errorMessage = Object.values(error.errors).flat().join(
                                        '\n');
                                } else if (error.message) {
                                    errorMessage = error.message;
                                }

                                if (errorMessage.toLowerCase().includes('duplicate') ||
                                    errorMessage.toLowerCase().includes('already exists')) {
                                    errorMessage = 'Mata kuliah ini sudah diambil sebelumnya';
                                }

                                Swal.fire({
                                    title: 'Peringatan',
                                    text: errorMessage,
                                    icon: 'warning',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded'
                                    }
                                });
                            });
                    }
                });
            });
        });

        // Function to add a course to the summary table
        function addCourseToSummary(course) {
            const summaryTable = document.querySelector('table:first-of-type tbody');

            const newRow = document.createElement('tr');
            newRow.classList.add('{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}');

            // Calculate the new row number
            const rowNumber = summaryTable.rows.length + 1;

            // Create the row content
            newRow.innerHTML = `
                        <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${rowNumber}</td>
                        <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${course.kode}</td>
                        <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${course.nama}</td>
                        <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${course.kelas}</td>
                        <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${course.waktu}</td>
                        <td class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">${course.sks}</td>
                        <td class="px-4 py-2 {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                            <button class="cancel-course px-2 py-1 font-semibold rounded-xl bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">Batalkan</button>
                        </td>
                    `;

            summaryTable.appendChild(newRow);
            updateTotalSKS(course.sks); // Update total SKS
        }

        function hasConflict(newKode, newHariJam) {
            const summaryTable = document.querySelector('table:first-of-type tbody');
            for (let row of summaryTable.rows) {
                const existingKode = row.cells[1].textContent;
                const existingHariJam = row.cells[3].textContent;

                if (existingKode === newKode) {
                    return true; // Duplicate course
                }

                if (isTimeConflict(existingHariJam, newHariJam)) {
                    return true; // Time conflict
                }
            }
            return false;
        }

        function isTimeConflict(time1, time2) {
            // Remove any leading/trailing whitespace
            time1 = time1.trim();
            time2 = time2.trim();

            // Parse the day and time range
            const [day1, timeRange1] = time1.split(',').map(s => s.trim());
            const [day2, timeRange2] = time2.split(',').map(s => s.trim());

            // If days are different, there's no conflict
            if (day1 !== day2) {
                return false;
            }

            // Parse time ranges
            const [start1, end1] = timeRange1.split('-').map(t => t.trim());
            const [start2, end2] = timeRange2.split('-').map(t => t.trim());

            // Convert times to minutes for easier comparison
            const toMinutes = (timeStr) => {
                const [hours, minutes] = timeStr.split(':').map(Number);
                return hours * 60 + minutes;
            };

            const start1Min = toMinutes(start1);
            const end1Min = toMinutes(end1);
            const start2Min = toMinutes(start2);
            const end2Min = toMinutes(end2);

            // Check for overlap
            return (start1Min < end2Min && start2Min < end1Min);
        }
        // Function to update total SKS display
        function updateTotalSKS(newSks) {
            const totalSksElement = document.getElementById('totalSks');
            const currentTotal = parseInt(totalSksElement.textContent || '0');
            const newTotal = currentTotal + newSks;
            totalSksElement.textContent = newTotal;

            // Show the SKS sidebar if it's not already visible
            // const sksSidebar = document.getElementById('sksSidebar');
            // sksSidebar.classList.add('show');
        }

        // Function to calculate initial total SKS
        function calculateInitialTotalSKS() {
            const summaryTable = document.querySelector('#summaryTable tbody');
            let total = 0;

            Array.from(summaryTable.rows).forEach(row => {
                const sks = parseInt(row.cells[5].textContent); // Assuming SKS is in the 6th column
                if (!isNaN(sks)) {
                    total += sks;
                }
            });

            document.getElementById('totalSks').textContent = total;
        }


        // Calculate initial total SKS when page loads
        document.addEventListener('DOMContentLoaded', calculateInitialTotalSKS);


        // Function to update the summary table
        function updateSummaryTable(course) {
            const summaryTable = document.querySelector('table:first-of-type tbody');
            const rowCount = summaryTable.rows.length + 1;

            const newRow = document.createElement('tr');

            newRow.classList.add('{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}');

            // Insert cells
            const cellNo = newRow.insertCell();
            const cellKode = newRow.insertCell();
            const cellNama = newRow.insertCell();
            const cellKelas = newRow.insertCell();
            const cellWaktu = newRow.insertCell();
            const cellSks = newRow.insertCell();

            // Add classes and content
            [cellNo, cellKode, cellNama, cellKelas, cellWaktu, cellSks].forEach(cell => {
                cell.className = 'px-4 py-2 border-r border-white';
            });

            cellNo.textContent = rowCount;
            cellKode.textContent = course.kode;
            cellNama.textContent = course.nama;
            cellKelas.textContent = course.kelas;
            cellWaktu.textContent = course.waktu;
            cellSks.textContent = course.sks;
        }

        

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const maxSKS = {{ $maxSKS }}; // Get max SKS from PHP

    function updateTotalSKS(newSks) {
        const totalSksElement = document.getElementById('totalSks');
        const currentTotal = parseInt(totalSksElement.textContent || '0');
        const newTotal = currentTotal + newSks;

        // Check if new total exceeds max SKS
        if (newTotal > maxSKS) {
            Swal.fire({
                title: 'Peringatan',
                text: `Total SKS melebihi maksimum yang diperbolehkan (${maxSKS} SKS). Silakan kurangi mata kuliah.`,
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return; // Stop further actions
        }

        totalSksElement.textContent = newTotal; // Update total if within limit

        // Show the SKS sidebar if it's not already visible
        const sksSidebar = document.getElementById('sksSidebar');
        sksSidebar.classList.add('show');
    }

});
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Initialize listeners for cancel buttons
            calculateInitialTotalSKS(); // Initialize total SKS
            initializeCancelButtons();  // Set up cancel button event listeners
            initializeSKSSidebar();     // Set up the SKS sidebar toggle functionality

            function initializeCancelButtons() {
                document.querySelectorAll('.cancel-course').forEach(button => {
                    button.addEventListener('click', handleCancelClick);
                });
            }

            function handleCancelClick(event) {
                const button = event.currentTarget;
                const row = button.closest('tr');
                const courseId = button.getAttribute('data-id');
                const kelas = button.getAttribute('data-kelas');
                const mahasiswaId = button.getAttribute('data-mahasiswa-id');
                const semester = button.getAttribute('data-semester');
                const sks = parseInt(button.getAttribute('data-sks'));

                Swal.fire({
                    title: 'Konfirmasi Pembatalan',
                    text: 'Apakah Anda yakin ingin membatalkan mata kuliah ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        cancelCourse(courseId, mahasiswaId, semester, row, sks);
                    }
                });
            }

            function cancelCourse(courseId, mahasiswaId, semester, row, sks) {
                fetch('/irs-rekap/destroy', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            id: courseId, // mata_kuliah_id
                            mahasiswa_id: mahasiswaId, // Tambahkan mahasiswa_id
                            semester: semester // Tambahkan semester
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            row.remove();
                            calculateInitialTotalSKS();
                            //updateTotalSKSAfterCancel(sks);
                            reorderTableRows();

                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Mata kuliah berhasil dibatalkan',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    })
            }

            function updateTotalSKSAfterCancel(canceledSKS) {
                const totalSksElement = document.getElementById('totalSks');
                const currentTotal = parseInt(totalSksElement.textContent || '0');
                const newTotal = Math.max(0, currentTotal - canceledSKS); // Ensure total doesn't go below 0
                totalSksElement.textContent = newTotal;

                if (newTotal === 0) {
                    document.getElementById('sksSidebar').classList.remove('show');
                }
            }


            function reorderTableRows() {
                const tbody = document.querySelector('table:first-of-type tbody');
                Array.from(tbody.rows).forEach((row, index) => {
                    row.cells[0].textContent = index + 1;
                });
            }

            function initializeSKSSidebar() {
                const toggleButton = document.getElementById('toggleSidebar');
                const sidebar = document.getElementById('sksSidebar');

                toggleButton.addEventListener('click', () => {
                    sidebar.classList.toggle('show');
                    toggleButton.classList.toggle('rotated');
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Function to check time conflicts
    function checkTimeConflicts() {
        const takenCourses = Array.from(document.querySelector('table:first-of-type tbody').rows)
            .map(row => ({
                name: row.cells[2].textContent,
                code: row.cells[1].textContent,
                time: row.cells[4].textContent.trim(),
                class: row.cells[3].textContent.trim() // Tambahkan pengambilan kelas dari kolom yang sesuai
            }));

        const availableCourses = document.querySelectorAll('.course-row');

        availableCourses.forEach(courseRow => {
            const existingOverlay = courseRow.querySelector('.collision-overlay');
            if (existingOverlay) {
                existingOverlay.remove();
            }

            const courseTime = courseRow.dataset.courseTime;
            const courseName = courseRow.querySelector('td:nth-child(3)').textContent;
            const courseCode = courseRow.querySelector('td:nth-child(2)').textContent;
            const courseClass = courseRow.querySelector('td:nth-child(4)').textContent; // Ambil kelas dari kolom ke-4
            const conflicts = [];

            takenCourses.forEach(takenCourse => {
                if (isTimeConflict(takenCourse.time, courseTime)) {
                    conflicts.push({
                        conflictingCourse: {
                            name: courseName,
                            code: courseCode,
                            time: courseTime,
                            class: courseClass
                        },
                        takenCourse: takenCourse
                    });
                }
            });

            if (conflicts.length > 0) {
                const overlay = createCollisionOverlay(conflicts);
                courseRow.appendChild(overlay);
            }
        });
    }

    // Create collision overlay element
    function createCollisionOverlay(conflicts, currentCourse) {
        const overlay = document.createElement('div');
        overlay.className = 'collision-overlay';

        const text = document.createElement('span');
        text.className = 'collision-text';

        overlay.appendChild(text);

        overlay.addEventListener('click', () => {
            showConflictDetails(conflicts, currentCourse);
        });

        return overlay;
    }

    // Show conflict details in a popup
    function showConflictDetails(conflicts) {
        const conflictsList = conflicts.map(conflict =>
            `<ul class="list-none p-0">
                <li class="mb-4 bg-gray-100 rounded-lg p-4 shadow flex flex-col items-center text-center">
                    <div class="mb-2">
                        <strong class="text-gray-800">${conflict.conflictingCourse.name} </strong>
                        <span class="text-gray-600">(${conflict.conflictingCourse.code})</span>
                        <br>
                        <span class="text-sm text-gray-600">${conflict.conflictingCourse.time}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-red-600 bg-red-200 px-2 py-1 rounded">bertabrakan dengan</span>
                    </div>
                    <div>
                        <strong class="text-gray-800">${conflict.takenCourse.name} - ${conflict.takenCourse.class}</strong>
                        <span class="text-gray-600">(${conflict.takenCourse.code})</span>
                        <br>
                        <span class="text-sm text-gray-600">${conflict.takenCourse.time}</span>
                    </div>
                </li>
            </ul>`
        ).join('');

        Swal.fire({
            title: 'Detail Tabrakan Jadwal',
            html: `
                <div class="text-left">
                    <p class="mb-4 text-center">Terjadi tabrakan jadwal:</p>
                    <ul class="list-disc pl-5">
                        ${conflictsList}
                    </ul>
                </div>
            `,
            icon: 'warning',
            confirmButtonText: 'Tutup',
            customClass: {
                confirmButton: 'bg-green-500 hover:green-600 text-white font-bold py-2 px-4 rounded'
            }
        });
    }

    // Check for conflicts whenever the course list changes
    function initializeConflictDetection() {
        // Initial check
        checkTimeConflicts();

        // Create a MutationObserver to watch for changes in the taken courses table
        const observer = new MutationObserver(checkTimeConflicts);

        const takenCoursesTable = document.querySelector('table:first-of-type tbody');
        observer.observe(takenCoursesTable, {
            childList: true,
            subtree: true
        });
    }

    // Initialize conflict detection
    initializeConflictDetection();
});

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-semester');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const semesterId = this.dataset.semester;
                    const content = document.getElementById('semester');
                    const plusIcon = this.querySelector('.plus-icon');
                    const minusIcon = this.querySelector('.minus-icon');

                    // Toggle content visibility
                    content.classList.toggle('hidden');

                    // Toggle icons
                    plusIcon.classList.toggle('hidden');
                    minusIcon.classList.toggle('hidden');
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fasePembatalanIRS = @json($fasePembatalanIRS);
            const statuspengajuan = @json($status);
            console.log("Status Pengajuan:", statuspengajuan); 
            const fasePerubahanIRS = @json($fasePerubahanIRS);
            const batalAjukan = document.getElementById("button_batal");

            // Jika fase pembatalan IRS aktif, sembunyikan listMataKuliah dan simpan status di localStorage
            if (fasePembatalanIRS && statuspengajuan !== null) {
                localStorage.setItem('hideListMataKuliah', 'true');
            }

            if (fasePerubahanIRS && statuspengajuan !==null ) {
                batalAjukanButton.setAttribute("disabled", true);
                batalAjukanButton.classList.add("cursor-not-allowed", "opacity-50");
                batalAjukan.setAttribute("disabled", true);
                batalAjukan.classList.add("cursor-not-allowed", "opacity-50");

            }

            

            // Periksa localStorage untuk melihat apakah listMataKuliah harus disembunyikan
            const shouldHideList = localStorage.getItem('hideListMataKuliah') === 'true';

            // Sembunyikan listMataKuliah jika `shouldHideList` adalah true
            if (shouldHideList) {
                document.getElementById('listMataKuliah').classList.add('hidden');
            }

            const isSubmitted = localStorage.getItem('irsSubmitted') === 'true';
            if (isSubmitted) {
                setSubmittedState();
            } else {
                setDraftState();
            }
        });

        function ajukanIRS() {
        Swal.fire({
            title: 'Konfirmasi Pengajuan',
            text: 'Apakah Anda yakin ingin mengajukan IRS?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#34803C',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Ajukan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // localStorage.removeItem('hideListMataKuliah'); // Hapus status sembunyikan untuk list mata kuliah
                // localStorage.setItem('irsSubmitted', 'true'); // Simpan status pengajuan IRS
                localStorage.setItem('hideListMataKuliah', 'true');
                localStorage.setItem('irsSubmitted', 'true'); 
                hideBatalkanColumn();
                setSubmittedState();
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'IRS berhasil diajukan',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    function batalAjukanIRS() {
        const fasePembatalanIRS = @json($fasePembatalanIRS);
        Swal.fire({
            title: 'Konfirmasi Pembatalan',
            text: 'Apakah Anda yakin ingin membatalkan pengajuan IRS?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Batalkan!',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika fase pembatalan aktif, sembunyikan listMataKuliah dan simpan status di localStorage
                if (fasePembatalanIRS) {
                    document.getElementById('listMataKuliah').classList.add('hidden');
                    localStorage.setItem('hideListMataKuliah', 'true');
                }
                localStorage.removeItem('irsSubmitted'); // Hapus status pengajuan IRS
                showBatalkanColumn();
                setDraftState();
                Swal.fire({
                    title: 'IRS dibatalkan',
                    text: 'IRS telah dibatalkan dan dapat diedit kembali',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    }

    // Ajukan Button Click Event - Hide the "Batalkan" column when Ajukan is clicked
    document.getElementById('ajukanButton').addEventListener('click', function() {
        ajukanIRS(); 
    });

    // Batal Ajukan Button Click Event - Show the "Batalkan" column when Batal Ajukan is clicked
    document.getElementById('batalAjukanButton').addEventListener('click', function() {
        batalAjukanIRS(); 
    });

    // Function to hide the "Batalkan" column (both the header and the data cells)
    function hideBatalkanColumn() {
        const batalkanColumns = document.querySelectorAll('.batalkan-column');
        batalkanColumns.forEach(column => {
            column.style.display = 'none';  // Hide the column
        });
    }

    // Function to show the "Batalkan" column (both the header and the data cells)
    function showBatalkanColumn() {
        const batalkanColumns = document.querySelectorAll('.batalkan-column');
        batalkanColumns.forEach(column => {
            column.style.display = '';  // Show the column
        });
    }

    function setSubmittedState() {
        // Sembunyikan listMataKuliah saat dalam status diajukan
        document.getElementById('listMataKuliah').classList.add('hidden');

        // Nonaktifkan tombol batalkan untuk setiap mata kuliah
        const cancelButtons = document.querySelectorAll('.cancel-course')
        cancelButtons.forEach(button => {
            // Sembunyikan tombol
            button.style.display = 'none';

            // Alternatif: gunakan class 'hidden' jika ada CSS untuk menyembunyikan elemen
            // button.classList.add('hidden');
        });

        hideBatalkanColumn();

        // Atur tampilan tombol "Ajukan" dan "Batal Ajukan"
        document.getElementById('ajukanButton').classList.add('hidden');
        document.getElementById('batalAjukanButton').classList.remove('hidden');

        if (statuspengajuan == 'disetujui'){
            document.getElementById('batalAjukanButton').classList.add('hidden');
        }

    }

    function setDraftState() {
        const fasePembatalanIRS = @json($fasePembatalanIRS);

        // Tampilkan atau sembunyikan listMataKuliah berdasarkan fase pembatalan IRS
        if (!fasePembatalanIRS) {
            document.getElementById('listMataKuliah').classList.remove('hidden');
        }

        document.getElementById('ajukanButton').classList.remove('hidden');
        document.getElementById('batalAjukanButton').classList.add('hidden');

        const cancelButtons = document.querySelectorAll('.cancel-course')
        cancelButtons.forEach(button => {
            button.style.display = '';
        });

        showBatalkanColumn()
    }





    </script>


<script>
function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Mendapatkan lebar halaman PDF
    const pageWidth = doc.internal.pageSize.getWidth();

    // Menambahkan header
    doc.setFontSize(10); 
    doc.setFont("times"); 
    doc.text("KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI", pageWidth / 2, 10, { align: "center" });
    doc.text("FAKULTAS SAINS DAN MATEMATIKA", pageWidth / 2, 16, { align: "center" });
    doc.text("UNIVERSITAS DIPONEGORO", pageWidth / 2, 22, { align: "center" });

    // Menambahkan judul
    doc.setFontSize(10); 
    doc.setFont("times", "bold");
    let currentY = 35;
    doc.text("ISIAN RENCANA STUDI MAHASISWA", pageWidth / 2, currentY, { align: "center" });
    currentY += 15;

    // Menambahkan informasi detail di bawah judul
    const marginLeft = 14; // Margin kiri untuk teks

    doc.setFontSize(10); 
    doc.setFont("times", "normal"); 
    doc.text("NIM                        : {{ $user->nim_nip }}", marginLeft, currentY);
    currentY += 5; 
    doc.text("Nama Mahasiswa   : {{ $user->nama }}", marginLeft, currentY);
    currentY += 5; 
    doc.text("Program Studi        : {{ $mahasiswa->prodi }}", marginLeft, currentY);
    currentY += 5; 
    doc.text("Dosen Wali            : {{  $dosenWaliNama }}", marginLeft, currentY);

    // Membuat tabel di bawah informasi detail
    doc.autoTable({
        html: '.mahasiswa-container table',
        startY: currentY + 5, 
        theme: 'grid',
        styles: {
            font: "times",
            fontSize: 8,
            cellPadding: 3,
            halign: 'center',
            valign: 'middle',
            lineColor: [0, 0, 0], 
            lineWidth: 0.25,
            overflow: 'linebreak' 
        },
        headStyles: {
            font: "times", 
            textColor: [0, 0, 0], 
            fillColor: [255, 255, 255], 
            fontSize: 8, 
            fontStyle: "bold" 
        },
        columnStyles: {
            1: { halign: 'left' },
            2: { cellWidth: 40, halign: 'left' }, 
            7: { cellWidth: 30, halign: 'left', overflow: 'linebreak' }
        }
    });

    // Menambahkan tanda tangan di bawah tabel
    const marginRight = pageWidth - 100; // Posisi margin kanan
    const endTableY = doc.lastAutoTable.finalY + 10; 

    // Sebelah kiri: TTD Dosen Wali
    doc.setFontSize(10);
    doc.text("Pembimbing Akademik (Dosen Wali)", marginLeft, endTableY + 5);
    doc.text("{{ $dosenWaliNama }}", marginLeft, endTableY + 30); 
    doc.text("NIP: {{ $dosenWaliNip }}", marginLeft, endTableY + 35); 

    // Sebelah kanan: TTD Mahasiswa
    doc.text("Semarang, " + formatDate(new Date()), marginRight, endTableY);
    doc.text("Nama Mahasiswa", marginRight, endTableY + 5);
    doc.text("{{ $user->nama }}", marginRight, endTableY + 30); 
    doc.text("NIM: {{ $user->nim_nip }}", marginRight, endTableY + 35); 

    // Menyimpan file PDF
    doc.save('IRS_Mahasiswa.pdf');
}

// Fungsi untuk memformat tanggal menjadi format: "DD MMM YYYY"
function formatDate(date) {
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear();

    return day + " " + month + " " + year;
}

    
</script>

</body>

</html>