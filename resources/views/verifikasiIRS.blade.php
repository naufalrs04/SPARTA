<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
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

            <div id="contentBelumVerifikasi" class="pt-4 pb-64 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="ml-8 mr-8 mt-8 mb-8 flex flex-grow overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                            </svg>
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
                                        @foreach ($mhs->mata_kuliah as $mk)
                                            <tr class="border-t">
                                                <td class="px-4 py-2 text-black">{{ $loop->iteration }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->kode_mk }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->nama_mk }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->kelas }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->sks }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->ruang }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->status_pengambilan }}</td>
                                                <td class="px-4 py-2 text-black">{{ $mk->dosen }}</td>
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
            <div class="pb-12 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">

            </div>

            <div id="contentSudahVerifikasi" class="hidden pb-64 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}"">
                <div class="ml-8 mr-8 mb-8 flex flex-grow overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Nama Mahasiswa</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">NIM</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jumlah SKS</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Keterangan</th>
                                <th class="px-4 py-2">Persetujuan</th>
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
                                <td class="px-3 py-3 space-x-4 text-center flex justify-center items-center">
                                    <button class="batalkan-irs px-4 py-1 rounded-lg cursor-pointer font-bold bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                        data-mahasiswa-id="{{ $mhs->id }}">Batalkan</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pb-64 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">

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
                                        }).then(() => {
                                            // Tambahkan update UI atau refresh data sesuai kebutuhan
                                            location.reload(); // Atau update UI dengan cara lain
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
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
                                        }).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
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
                                        }).then(() => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: data.message,
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
    </script>



</body>

</html>