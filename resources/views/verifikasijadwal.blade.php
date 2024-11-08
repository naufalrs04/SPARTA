<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Jadwal Departemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h2 class="text-center text-lg font-semibold mb-4">Verifikasi Jadwal Departemen</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Departemen</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Status</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($verif as $verifikasi)
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">{{ $verifikasi->prodi }}</td>

                                @if ($verifikasi->status_pengajuan == 'ter-Verifikasi')
                                    <td
                                        class="px- 3 py-3 border-r border-white text-center flex justify-center items-center">
                                        <div class="w-32 text-white text-center rounded-md px-2 py-2"
                                            style="background-color: #34803C;">
                                            <p>ter-Verifikasi</p>
                                        </div>
                                    </td>
                                @elseif($verifikasi->status_pengajuan == 'Ditolak')
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
                                    <button onclick="showInfo('{{ $verifikasi->prodi }}', {!! htmlspecialchars(json_encode($verifikasi->jadwal_details), ENT_QUOTES, 'UTF-8') !!})"
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
   <script>
    function showInfo(prodi, jadwalDetails) {
        let jadwalList = jadwalDetails.map(room => 
            `<tr>
                <td>${room.nama_mk}</td>
                <td>${room.tahun_ajaran}</td>
                <td>${room.ruang}</td>
                <td>${room.hari}</td>
                <td>${room.jam_mulai}</td>
                <td>${room.jam_selesai}</td>
                
            </tr>`
        ).join('');

        // Menampilkan SweetAlert dengan informasi mata kuliah
        Swal.fire({
            title: `Info Mata Kuliah - ${prodi}`,
            html: `
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Nama MK</th>
                            <th>Tahun Ajaran</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${jadwalList}
                    </tbody>
                </table>
                <div class="mt-4 flex justify-center gap-4">
                    <button onclick="verifikasiJadwal('${prodi}')" 
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Verifikasi
                    </button>
                    <button onclick="tolakJadwal('${prodi}')" 
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

    function verifikasiJadwal(prodi) {
        Swal.fire({
            title: 'Konfirmasi',
            text: `Apakah anda yakin ingin memverifikasi jadwal untuk ${prodi}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Verifikasi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/verifikasi-jadwal/${prodi}`, {
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
                            'Jadwal telah diverifikasi.',
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

    function tolakJadwal(prodi) {
        Swal.fire({
            title: 'Konfirmasi',
            text: `Apakah anda yakin ingin menolak jadwal untuk ${prodi}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/tolak-jadwal/${prodi}`, {
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
                            'Jadwal telah ditolak.',
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
