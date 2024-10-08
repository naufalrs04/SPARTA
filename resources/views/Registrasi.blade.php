<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </style>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            @include('components.navbar')

            <!-- Main Content -->
            <h2 class="text-xl py-5 text-center font-semibold">Registrasi Akademik</h2>
            <div class="bg-gray-800 px-8 pt-5 flex justify-center items-center" style="background-color: #17181C;">
                <div class="bg-gray-800  flex justify-center items-center max-h-full" style="background-color: #17181C;">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-20 w-full h-full pb-8  ">
                        <div id="activeStatus" class="bg-gray-700 rounded-lg shadow-lg flex flex-col h-full" style="background-color: #17181C;">
                            <!-- Box Status Akademik Aktif -->
                            <div class="grid grid-cols-1 rounded-lg flex-grow h-full" style="background-color: #2A2C33;">
                                <div class="p-10 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                    <div>
                                        <img class="mb-10 w-full h-full object-cover mx-auto" src="{{ asset('assets/aktif.png') }}" alt="aktif">
                                    </div>
                                    <div>
                                        <p class="text-center font-semibold text-white">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                                    </div>
                                </div>
                                <button id="activeButton" class="rounded-md py-3 px-4 text-white text-center mx-5 mb-5" style="background-color: #486AAD;">
                                    <strong>AKTIF</strong>
                                </button>
                            </div>
                        </div>

                        <div id="cutiStatus" class="bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                            <!-- Box Status Akademik Cuti -->
                            <div class="grid grid-cols-1 rounded-lg flex-grow h-full" style="background-color: #2A2C33;">
                                <div class="p-8 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                    <div>
                                        <img class="mb-10 w-full h-full object-cover mx-auto" src="{{ asset('assets/cuti.png') }}" alt="cuti">
                                    </div>
                                    <div>
                                        <p class="text-center font-semibold text-white">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Aktif.</p>
                                    </div>
                                </div>
                                <button id="cutiButton" class="rounded-md py-3 px-4 text-white text-center mx-5 mb-5" style="background-color: #C55959">
                                    <strong>CUTI</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SweetAlert -->
            @if(isset($message))
            <script>
                Swal.fire({
                    title: 'Info',
                    text: "{{ $message }}",
                    icon: 'success'
                });
            </script>
            @endif
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const activeButton = document.getElementById('activeButton');
        const cutiButton = document.getElementById('cutiButton');

        let isActiveSelected = localStorage.getItem('isActiveSelected') === 'true';

        function resetOpacity() {
            document.getElementById('activeStatus').style.opacity = '1';
            document.getElementById('cutiStatus').style.opacity = '1';
        }

        function setInitialOpacity() {
            if (isActiveSelected) {
                document.getElementById('activeStatus').style.opacity = '1';
                document.getElementById('cutiStatus').style.opacity = '0.4';
            } else {
                document.getElementById('activeStatus').style.opacity = '0.4';
                document.getElementById('cutiStatus').style.opacity = '1';
            }
        }

        setInitialOpacity();

        activeButton.addEventListener('click', function() {
            if (document.getElementById('cutiStatus').style.opacity === '1') {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda ingin mengubah status dari cuti ke aktif. Apakah Anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetOpacity();
                        isActiveSelected = true;
                        localStorage.setItem('isActiveSelected', 'true');
                        updateStatus(1);
                    }
                });
            } else {
                updateStatus(1);
                isActiveSelected = true;
                localStorage.setItem('isActiveSelected', 'true');
            }
        });

        cutiButton.addEventListener('click', function() {
            if (isActiveSelected) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda ingin mengubah status dari aktif ke cuti. Apakah Anda yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetOpacity();
                        isActiveSelected = false;
                        localStorage.setItem('isActiveSelected', 'false');
                        updateStatus(0);
                    }
                });
            } else {
                updateStatus(0);
                localStorage.setItem('isActiveSelected', 'false');
            }
        });

        function updateStatus(status) {
            fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.text())
                .then(data => {
                    if (status === 1) {
                        document.getElementById('cutiStatus').style.opacity = '0.4';
                        document.getElementById('activeStatus').style.opacity = '1';
                    } else {
                        document.getElementById('activeStatus').style.opacity = '0.4';
                        document.getElementById('cutiStatus').style.opacity = '1';
                    }

                    Swal.fire({
                        title: 'Success',
                        text: data,
                        icon: 'success',
                        timer: 1500,
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Something went wrong!',
                        icon: 'error',
                    });
                });
        }
    });
</script>

</html>