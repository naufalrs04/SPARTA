<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    </style>
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
            <div class="px-8 pt-5 mt-5 mb-5 rounded-tl-lg">
                <h2 class="text-center text-lg font-semibold mb-4">Verifikasi Ruang Kuliah</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr style="background-color: rgba(135, 138, 145, 0.37);">
                            <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Departemen</th>
                            <th class="px-4 py-2 w-1/2 border-r border-white">Status</th>
                            <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verif as $v)
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">{{ $v->nama_prodi }}</td>

                                @if ($v->status_pengajuan == 'ter-Verifikasi')
                                    <td
                                        class="px- 3 py-3 border-r border-white text-center flex justify-center items-center">
                                        <div class="w-32 text-white text-center rounded-md px-2 py-2"
                                            style="background-color: #34803C;">
                                            <p>ter-Verifikasi</p>
                                        </div>
                                    </td>
                                @elseif($v->status_pengajuan == 'Ditolak')
                                    <td
                                        class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                        <div class="w-32 text-white text-center rounded-md px-2 py-2"
                                            style="background-color: #851010;">
                                            <p>Ditolak</p>
                                        </div>
                                    </td>
                                @else
                                    <td
                                        class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                        <div class="w-32 text-white text-center rounded-md px-2 py-2"
                                            style="background-color: #999b25;">
                                            <p>Belum</p>
                                        </div>
                                    </td>
                                @endif
                                <td class="px-5 py-2 text-center">
                                    <button onclick="showInfo('{{ $v->nama_prodi }}', {{ $v->ruangan_details }})"
                                        class="info w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
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

    <!-- Modifikasi script showInfo -->
<script>
    function showInfo(prodi, ruanganDetails) {
        let ruanganList = ruanganDetails.map(room => 
            `<tr>
                <td>${room.id}</td>
                <td>${room.nama}</td>
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
                        Swal.fire(
                            'Berhasil!',
                            'Ruangan telah diverifikasi.',
                            'success'
                        ).then(() => {
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
                        Swal.fire(
                            'Berhasil!',
                            'Ruangan telah ditolak.',
                            'success'
                        ).then(() => {
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
