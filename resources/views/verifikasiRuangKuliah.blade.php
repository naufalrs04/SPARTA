<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        .swal-wide {
            width: 600px !important;
        }
        
        .swal2-html-container table {
            width: 100%;
            margin-top: 1em;
            border-collapse: collapse;
        }
    
        .swal2-html-container th,
        .swal2-html-container td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
    
        .swal2-html-container th {
            background-color: #f4f4f4;
        }
    
        /* Tambahan style untuk tombol */
        .swal2-html-container button {
            transition: all 0.3s ease;
        }
    
        .swal2-html-container button:hover {
            transform: translateY(-2px);
        }

        #main-content{
            min-height: 100vh;
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
            <!-- Navbar -->
            @include('components.navbar', ['theme' => $theme])

            <!-- Main Content -->
            <div id="main-content" class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="h-full">
                    <div class="px-8 pt-8 mb-8">
                        <div class="text-center">
                            <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Verifikasi Ruang Kuliah</h2>
                        </div>
                        <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <table class="table-auto p-5 w-full text-center border-collapse">
                                <thead>
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                        <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Departemen</th>
                                        <th class="px-4 py-2 w-1/2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Status</th>
                                        <th class="px-4 py-2 w-1/4 ">Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($verif as $v)
                                        <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $v->nama_prodi }}</td>

                                            @if ($v->status_pengajuan == 'ter-Verifikasi')
                                                <td
                                                    class="px-3 py-3 border-r text-center flex justify-center items-center {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                    <div class="w-32 text-white text-center rounded-lg px-2 py-2 bg-gradient-to-l from-green-500 via-green-600 to-green-700">
                                                        <p class="font-bold">Terverifikasi</p>
                                                    </div>
                                                </td>
                                            @elseif($v->status_pengajuan == 'Ditolak')
                                                <td
                                                    class="px-3 py-3 border-r text-center flex justify-center items-center {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                    <div class="w-32 text-white text-center rounded-md px-2 py-2 bg-gradient-to-l from-red-500 via-red-600 to-red-700">
                                                        <p class="font-bold">Ditolak</p>
                                                    </div>
                                                </td>
                                            @else
                                                <td
                                                    class="px-3 py-3 border-r text-center flex justify-center items-center {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                    <div class="w-32 text-white text-center rounded-md px-2 py-2 bg-gradient-to-l from-orange-500 via-orange-600 to-orange-700">
                                                        <p class="font-bold">Belum</p>
                                                    </div>
                                                </td>
                                            @endif
                                            <td class="px-5 py-2 text-center">
                                                <button onclick="showInfo('{{ $v->nama_prodi }}', {{ $v->ruangan_details }})"
                                                    class="info w-16 text-white font-bold rounded-lg px-3 py-2 bg-gradient-to-t from-gray-400 via-gray-500 to-gray-500 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out">
                                                    Info
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modifikasi script showInfo -->
<script>
    function showInfo(prodi, ruanganDetails) {
        let ruanganList = ruanganDetails.map(room => 
            `<tr>
                <td>${room.id}</td>
                <td>${room.nama}</td>
                <td>${room.kapasitas}</td>
            </tr>`
        ).join('');

        Swal.fire({
            title: `Info Ruangan - ${prodi}`,
            html: `
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>ID Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${ruanganList}
                    </tbody>
                </table>
                <div class="mt-4 flex justify-center gap-4">
                    <button onclick="verifikasiRuang('${prodi}')" 
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Verifikasi
                    </button>
                    <button onclick="tolakRuang('${prodi}')" 
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Tolak
                    </button>
                </div>
            `,
            icon: 'info',
            showConfirmButton: false,
            customClass: {
                popup: 'swal-wide',
            }
        });
    }

    function verifikasiRuang(prodi) {
        Swal.fire({
            title: 'Konfirmasi',
            text: `Apakah anda yakin ingin memverifikasi ruangan untuk ${prodi}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Verifikasi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/verifikasi-ruang/${prodi}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Ruangan telah diverifikasi.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded'
                            }
                        }).then(() => {
                            location.reload();
                        });
                    }
                })

                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan.',
                        'error'
                    );
                });
            }
        });
    }

    function tolakRuang(prodi) {
        Swal.fire({
            title: 'Konfirmasi',
            text: `Apakah anda yakin ingin menolak ruangan untuk ${prodi}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/tolak-ruang/${prodi}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Ruangan telah ditolak.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded'
                            }
                        }).then(() => {
                            location.reload();
                        });
                    }
                })

                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan.',
                        'error'
                    );
                });
            }
        });
    }
</script>

</body>

</html>
