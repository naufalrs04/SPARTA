<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

            <!-- Main Content -->
            <div class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="px-8 pt-5 mb-8">
                    <div class="text-center">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Registrasi Akademik</h2>
                    </div>
                    <div class="px-8 pt-5 flex justify-center items-center">
                        <div class="flex justify-center items-center max-h-full">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-20 w-full h-full pb-8  ">
                                <div id="activeStatus" class="rounded-3xl flex flex-col h-full">
                                    <!-- Box Status Akademik Aktif -->
                                    <div class="grid grid-cols-1 rounded-3xl flex-grow h-full rounded-3xl outline outline-1" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #EEEEEE;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                                        <div class="p-8 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                            <div>
                                                <img class="mb-10 w-full h-full object-cover mx-auto" src="{{ asset('assets/aktif.png') }}" alt="aktif">
                                            </div>
                                            <div>
                                                <p class="text-center font-semibold">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                                            </div>
                                        </div>
                                        <button id="activeButton" class="rounded-xl font-bold py-4 px-4 text-white text-center mx-5 mb-5 bg-gradient-to-l from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-bl hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out">
                                            <strong>AKTIF</strong>
                                        </button>
                                    </div>
                                </div>

                                <div id="cutiStatus" class="rounded-3xl flex flex-col">
                                    <!-- Box Status Akademik Cuti -->
                                    <div class="grid grid-cols-1 flex-grow h-full rounded-3xl outline outline-1" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #EEEEEE;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                                        <div class="p-8 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                            <div>
                                                <img class="mb-10 w-full h-full object-cover mx-auto" src="{{ asset('assets/cuti.png') }}" alt="cuti">
                                            </div>
                                            <div>
                                                <p class="text-center font-semibold">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Aktif.</p>
                                            </div>
                                        </div>
                                        <button id="cutiButton" class="rounded-xl font-bold py-4 px-4 text-white text-center mx-5 mb-5 bg-gradient-to-l from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-bl hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out">
                                            <strong>CUTI</strong>
                                        </button>
                                    </div>
                                </div>
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
                document.getElementById('cutiStatus').style.opacity = '0.5';
            } else {
                document.getElementById('activeStatus').style.opacity = '0.5';
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