<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        #contentBelumVerifikasi{
            min-height:100vh;
        }

        #contentSudahVerifikasi{
            min-height:100vh;
        }
    </style>
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-900' }}">
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
                    <div id="pengisianIRS" class="w-1/2 rounded-full bg-yellow-500 px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchIRS('belumVerifikasi')">
                        <h2 class="text-md font-bold">Belum Terverifikasi</h2>
                    </div>
                    <div id="irsMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchIRS('sudahVerifikasi')">
                        <h2 class="text-md font-bold">Sudah Terverifikasi</h2>
                    </div>
                </div>
            </div>

            <div class="px-8 pt-5 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="text-center">
                    <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Verifikasi IRS</h2>
                </div>
                {{-- <!-- Input cari mahasiswa -->
                <div class="bg-[#23252A]  flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative">
                    <div class="w-full h-10 flex items-center relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <!-- Input Pencarian -->
                        <input type="search" class="bg-transparent text-[#94959A] ml-10 pl-5 w-full h-full border-none outline-none font-semibold" placeholder="Cari Mahasiswa">
                    </div>
                </div> --}}

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
                            placeholder="Cari mahasiswa" />
                    </div>
                </form> 
            </div>

            <div id="contentBelumVerifikasi" class="pt-4 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class=" px-8 my-2 flex justify-end">
                    <button id="approve-all-btn" class="px-4 py-2 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                        Setujui Semua
                    </button>
                </div>
                <div class="ml-8 mr-8 mt-8 mb-8 flex flex-grow overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" name="tabel_irs">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Nama Mahasiswa</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">NIM</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jumlah SKS</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Persetujuan</th>
                                <th class="px-4 py-2">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs_belum_verifikasi as $mhs)
                            <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->nama }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->nim }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->total_sks }}</td>
                                <td class="px-3 py-3 space-x-4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }} text-center flex justify-center items-center">
                                    <button class="setujui-irs px-4 py-1 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                        data-mahasiswa-id="{{ $mhs->id }}">Setujui</button>
                                    <button class="tolak-irs px-4 py-1 px-4 py-1 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                        data-mahasiswa-id="{{ $mhs->id }}">Tolak</button>
                                </td>
                                <td>
                                    <div class="h-7 w-7 mx-auto rounded-lg bg-white flex justify-center items-center">
                                        <button class="show-details justify-center text-center text-3xl text-black font-bold focus:outline-none"
                                            data-index="{{ $loop->index }}">
                                            <div class="transition-colors duration-200 px-2 py-2 rounded-lg bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Detail IRS yang awalnya disembunyikan -->
                            <tr id="detail-{{ $loop->index }}" class="hidden">
                                <td colspan="6">
                                    <table class="w-full bg-white rounded-lg mt-2">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="px-4 py-2 text-center text-black rounded-tl-lg">NO</th>
                                                <th class="px-4 py-2 text-center text-black">KODE</th>
                                                <th class="px-4 py-2 text-center text-black">MATA KULIAH</th>
                                                <th class="px-4 py-2 text-center text-black">KELAS</th>
                                                <th class="px-4 py-2 text-center text-black">SKS</th>
                                                <th class="px-4 py-2 text-center text-black">RUANG</th>
                                                <th class="px-4 py-2 text-center text-black">STATUS</th>
                                                <th class="px-4 py-2 text-center text-black rounded-tr-lg">NAMA DOSEN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($mhs->mata_kuliah as $mk)
                                            <tr class="border-t">
                                                <td class="px-4 py-2 text-black">{{ $loop->iteration }}</td>
                                                <td class="px-4 text-left py-2 text-black">{{ $mk->kode_mk }}</td>
                                                <td class="px-4 text-left py-2 text-black">{{ $mk->nama_mk }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->kelas }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->sks }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->ruang }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->status_pengambilan }}</td>
                                                <td class="px-4 text-left py-2 text-black">{{ $mk->dosen }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="contentSudahVerifikasi" class="hidden pt-12 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}"">
                <div class="ml-8 mr-8 mb-8 flex flex-grow overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Nama Mahasiswa</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">NIM</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jumlah SKS</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Keterangan</th>
                                <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Persetujuan</th>
                                <th class="px-4 py-2">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mhs_sudah_verifikasi as $mhs)
                            <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->nama }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->nim }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->total_sks }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mhs->status_pengajuan }}</td>
                                <td class="px-3 py-3 space-x-4 text-center flex justify-center items-center border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                    <button class="batalkan-irs px-4 py-1 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                        data-mahasiswa-id="{{ $mhs->id }}">Batalkan</button>
                                </td>
                                <td>
                                    <div class="h-7 w-7 mx-auto rounded-lg bg-white flex justify-center items-center">
                                        <button class="show-details justify-center text-center text-3xl text-black font-bold focus:outline-none"
                                            data-index="{{ $loop->index }}">
                                            <div class="transition-colors duration-200 px-2 py-2 rounded-lg bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr id="detail-{{ $loop->index }}" class="hidden mahasiswa-container">
                                <td colspan="10">
                                    <div class="overflow-x-auto rounded-lg {{ $theme == 'light' ? 'bg-gray-100' : 'bg-[#EEEEEE]' }}" > 
                                        <table class="w-full">
                                            <thead class="{{ $theme == 'light' ? 'bg-gray-200' : 'bg-gray-100' }}">
                                                <tr>
                                                    <th class="px-4 py-2 text-black text-center  rounded-tl-lg">NO</th>
                                                    <th class="px-4 py-2 text-black text-center  ">KODE</th>
                                                    <th class="px-4 py-2 text-black text-center  ">MATA KULIAH</th>
                                                    <th class="px-4 py-2 text-black text-center  ">KELAS</th>
                                                    <th class="px-4 py-2 text-black text-center ">SKS</th>
                                                    <th class="px-4 py-2 text-black text-center ">RUANG</th>
                                                    <th class="px-4 py-2 text-black text-center  ">STATUS</th>
                                                    <th class="px-4 py-2 text-black text-center   rounded-tr-lg">NAMA DOSEN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($mhs->mata_kuliah as $mk)
                                                <tr class="border-t {{ $theme == 'light' ? 'border-gray-300' : 'border-gray-300' }} last:border-b last:{{ $theme == 'light' ? 'border-gray-300' : 'border-gray-300' }}">
                                                    <td class="px-4 py-2 text-black">{{ $loop->iteration }}</td>
                                                    <td class="px-4 py-2 text-black text-left ">{{ $mk->kode_mk }}</td>
                                                    <td class="px-4 py-2 text-black text-left ">{{ $mk->nama_mk }}</td>
                                                    <td class="px-4 py-2 text-black text-center ">{{ $mk->kelas }}</td>
                                                    <td class="px-4 py-2 text-black text-center ">{{ $mk->sks }}</td>
                                                    <td class="px-4 py-2 text-black">{{ $mk->ruang }}</td>
                                                    <td class="px-4 py-2">{{ $mk->status_pengambilan }}</td>
                                                    <td class="px-4 py-2 text-black text-left ">{{ $mk->dosen }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @if($mhs_sudah_verifikasi)
                                            <div class="flex justify-end pb-5 pt-5 pr-5">
                                                <button onclick="generatePDF({{ $mhs->id }})"
                                                        class="px-4 py-2 rounded-3xl font-bold bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                                                    Cetak PDF
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function switchIRS(selected) {
                    const pengisianIRS = document.getElementById('pengisianIRS');
                    const irsMahasiswa = document.getElementById('irsMahasiswa');

                    const contentBelumVerifikasi = document.getElementById('contentBelumVerifikasi');
                    const contentSudahVerifikasi = document.getElementById('contentSudahVerifikasi');

                    // Log untuk debugging
                    console.log("Switching to:", selected);

                    if (selected === 'belumVerifikasi') {
                        pengisianIRS.classList.add('bg-yellow-500', 'border-[#17181C]');
                        irsMahasiswa.classList.remove('bg-yellow-500', 'border-[#17181C]');

                        contentBelumVerifikasi.classList.remove('hidden');
                        contentSudahVerifikasi.classList.add('hidden');
                    } else if (selected === 'sudahVerifikasi') {
                        irsMahasiswa.classList.add('bg-yellow-500', 'border-[#17181C]');
                        pengisianIRS.classList.remove('bg-yellow-500', 'border-[#17181C]');

                        contentBelumVerifikasi.classList.add('hidden');
                        contentSudahVerifikasi.classList.remove('hidden');
                    }
                }
            </script>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event untuk tombol "Setujui"
            document.querySelectorAll('.setujui-irs').forEach(button => {
                button.addEventListener('click', function() {
                    const mahasiswaId = this.getAttribute('data-mahasiswa-id');

                    // Konfirmasi sebelum menyetujui
                    Swal.fire({
                        title: 'Konfirmasi Persetujuan',
                        text: "Apakah Anda yakin ingin menyetujui IRS ini?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Setujui!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('verifikasi-irs.setujui') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        mahasiswa_id: mahasiswaId
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: data.message,
                                            confirmButtonColor: '#28a745',
                                        }).then(() => {
                                            // Tambahkan update UI atau refresh data sesuai kebutuhan
                                            location.reload(); // Atau update UI dengan cara lain
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
                                            confirmButtonColor: '#dc3545',
                                        });
                                    }
                                })
                                .catch(error => console.error("Error:", error));
                                
                        }
                    });
                });
            });

            // Event untuk tombol "Tolak"
            document.querySelectorAll('.tolak-irs').forEach(button => {
                button.addEventListener('click', function() {
                    const mahasiswaId = this.getAttribute('data-mahasiswa-id');

                    // Konfirmasi sebelum menolak
                    Swal.fire({
                        title: 'Konfirmasi Penolakan',
                        text: "Apakah Anda yakin ingin menolak IRS ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Tolak!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('verifikasi-irs.tolak') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        mahasiswa_id: mahasiswaId
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: data.message,
                                            confirmButtonColor: '#28a745'
                                        }).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
                                            confirmButtonColor: '#dc3545',
                                        });
                                    }
                                })
                                .catch(error => console.error("Error:", error));
                        }
                    });
                });
            });
            document.querySelectorAll('.batalkan-irs').forEach(button => {
                button.addEventListener('click', function() {
                    const mahasiswaId = this.getAttribute('data-mahasiswa-id');

                    // Konfirmasi sebelum membatalkan
                    Swal.fire({
                        title: 'Konfirmasi Pembatalan IRS',
                        text: "Apakah Anda yakin ingin mmembatalkan IRS ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Batalkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('verifikasi-irs.batal') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        mahasiswa_id: mahasiswaId
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: data.message,
                                            confirmButtonColor: '#28a745'
                                        }).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
                                            confirmButtonColor: '#dc3545',
                                        });
                                    }
                                })
                                .catch(error => console.error("Error:", error));
                        }
                    });
                });
            });
        });

    </script>
    <script>
        document.querySelectorAll('.show-details').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const detailRow = document.getElementById(`detail-${index}`);

                // Toggle visibility of the detail row
                if (detailRow.classList.contains('hidden')) {
                    detailRow.classList.remove('hidden');
                } else {
                    detailRow.classList.add('hidden');
                }
            });
        });

        document.getElementById('default-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('table[name="tabel_irs"] tbody tr');

            rows.forEach(row => {
                const courseName = row.querySelector('td:nth-child(2)').innerText.toLowerCase(); // 1st column has course name
                const courseCode = row.querySelector('td:nth-child(3)').innerText.toLowerCase(); // 2nd column has course code

                if (courseName.includes(searchTerm) || courseCode.includes(searchTerm)) {
                    row.style.display = ''; // Show the row if it matches
                } else {
                    row.style.display = 'none'; // Hide the row if it doesn't match
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
    const approveAllButton = document.getElementById('approve-all-btn');

    approveAllButton.addEventListener('click', function () {
        Swal.fire({
            title: 'Konfirmasi Persetujuan',
            text: "Apakah Anda yakin ingin menyetujui semua mahasiswa yang belum diverifikasi?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Setujui Semua!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('verifikasi-irs.setujui-semua') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Semua mahasiswa berhasil disetujui.',
                            confirmButtonColor: '#28a745',
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyetujui semua mahasiswa.',
                            confirmButtonColor: '#dc3545',
                        });
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        });
    });
});

    </script>
    <script>
        function generatePDF(mahasiswaId) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Page Width for Center Alignment
            const pageWidth = doc.internal.pageSize.getWidth();

            // Fetch student data (NIM, Name, IRS details) based on the mahasiswaId
            fetch(`/getMahasiswaData/${mahasiswaId}`)
                .then(response => response.json())
                .then(data => {
                    const mahasiswa = data.mahasiswa;
                    const dosenNama = data.dosen_wali_nama;
                    const dosenNip = data.dosen_wali_nip;
                    const user = data.user;
                    const rekaps = data.rekaps;

                    // Add Header
                    doc.setFontSize(10);
                    doc.setFont("times");
                    doc.text("KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI", pageWidth / 2, 10, { align: "center" });
                    doc.text("FAKULTAS SAINS DAN MATEMATIKA", pageWidth / 2, 16, { align: "center" });
                    doc.text("UNIVERSITAS DIPONEGORO", pageWidth / 2, 22, { align: "center" });

                    // Add Title
                    doc.setFontSize(10);
                    doc.setFont("times", "bold");
                    let currentY = 35;
                    doc.text("ISIAN RENCANA STUDI MAHASISWA", pageWidth / 2, currentY, { align: "center" });
                    currentY += 15;

                    const marginLeft = 14;
                    doc.setFontSize(10);
                    doc.setFont("times", "normal");
                    if (user && user.nim_nip) {
                        doc.text(`NIM                          : ${user.nim_nip}`, marginLeft, currentY);
                    }
                    currentY += 5;
                    if (user && user.nama) {
                        doc.text(`Nama Mahasiswa     : ${user.nama}`, marginLeft, currentY);
                    }
                    currentY += 5;
                    if (mahasiswa && mahasiswa.prodi) {
                        doc.text(`Program Studi          : ${mahasiswa.prodi}`, marginLeft, currentY);  // Corrected to `prodi`
                    }
                    currentY += 5;
                    doc.text(`Nama Dosen Wali    : ${dosenNama}`, marginLeft, currentY);

                    // Add IRS Table
                    doc.autoTable({
                        head: [
                            ['No', 'Kode MK', 'Mata Kuliah', 'Kelas', 'SKS', 'Ruang', 'Status', 'Nama Dosen']
                        ],
                        body: rekaps.map((rekap, index) => [
                            index + 1, // No
                            rekap.kode_mk || 'N/A',
                            rekap.nama_mk || 'N/A',
                            rekap.kelas || 'N/A',
                            rekap.sks || '0',
                            rekap.ruang || 'N/A',
                            rekap.status_pengambilan || 'N/A',
                            rekap.dosen || 'Dosen Tidak Ditemukan'
                        ]),
                        startY: currentY + 10,
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
                    
                    const marginRight = pageWidth - 100;
                    const endY = doc.lastAutoTable.finalY + 10;

                    doc.setFontSize(10);
                    doc.text("Pembimbing Akademik (Dosen Wali)", marginLeft, endY + 5);
                    doc.text(`${dosenNama}`, marginLeft, endY + 30); 
                    doc.text("NIP: " + dosenNip, marginLeft, endY + 35);
                    
                    if (user && user.nama) {
                        doc.text("Semarang, " + formatDate(new Date()), marginRight, endY);  // Fixed formatting
                        doc.text("Nama Mahasiswa", marginRight, endY + 5);
                        doc.text(user.nama, marginRight, endY + 30);
                        doc.text(`NIM: ${user.nim_nip}`, marginRight, endY + 35);
                    }

                    doc.save(`IRS_Mahasiswa_${user.nim_nip}.pdf`);
                })
                .catch(error => console.error('Error fetching mahasiswa data:', error));
        }

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