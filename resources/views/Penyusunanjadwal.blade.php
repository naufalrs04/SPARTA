<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Penyusunan Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-900' }}">
    <div class="flex min-h-screen backdrop-blur-sm " style="{{ $theme == 'light' ? 'background-color: #17181C;' : 'background-color: #eeeeee;' }}">
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
            <div class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
            <!-- Pengajuan jadwal kuliah -->
            <div class="flex justify-center items-center pt-5">
                <div class="max-w-xs max-h-xs">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold mb-6 text-center rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Pengajuan Jadwal Kuliah</h2>
                    </div>
                    <div class="p-10 rounded-3xl items-center outline outline-1" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #EEEEEE;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                        <p class="text-yellow-500 text-m mb-4 font-bold text-center">Jumlah Mata Kuliah yang diajukan</p>
                        <div class="box-border border-2 flex justify-center items-center rounded-lg w-24 h-24 mx-auto" style="border-color: #F0B90B;">
                            <span class="text-5xl font-bold">{{$countmatakuliah}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center my-10">
                <div class="max-w-6xl w-full p-6 rounded-3xl px-8 items-center outline outline-1" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #EEEEEE;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                    <div class="text-center">
                    <h3 class="text-xl font-semibold mb-4 text-center inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Tambah Mata Kuliah</h3>
                    </div>

                    <form id="jadwal-form" method="POST" action="{{ route('jadwal.store') }}">
                        @csrf 
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label for="nama_mk" class="block text-sm font-medium mb-2">Nama Mata Kuliah</label>
                                    <select id="nama_mk" name="nama_mk" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        @foreach ($matakuliahList as $matakuliah)
                                            <option value="{{ $matakuliah->namemk }}"
                                            data-nama="{{ $matakuliah->namemk }}"
                                            data-kode="{{ $matakuliah->kodemk }}"
                                            data-sks="{{ $matakuliah->sksmk }}" 
                                            data-prodi="{{ $matakuliah->prodimk }}" 
                                            data-semester="{{ $matakuliah->smtmk }}">
                                            {{ $matakuliah->namemk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="kode_mk" class="block text-sm font-medium mb-2">Kode Mata Kuliah</label>
                                    <input type="text" id="kode_mk" name="kode_mk"
                                    class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="sks_mk" class="block text-sm font-medium mb-2">SKS</label>
                                    <input type="number" id="sks_mk" name="sks_mk"
                                    class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="semester_mk" class="block text-sm font-medium mb-2">Semester</label>
                                    <input type="number" id="semester_mk" name="semester_mk"
                                    class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="prodi" class="block text-sm font-medium mb-2">Program Studi</label>
                                    <input type="text" id="prodi" name="prodi"
                                    class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <label for="kelas" class="block text-sm font-medium mb-2">Kelas</label>
                                    <select name="kelas" id="kelas" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="tahun_ajaran" class="block text-sm font-medium mb-2">Tahun Ajaran</label>
                                    <input type="text" id="tahun_ajaran" name="tahun_ajaran"
                                    class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="ruang" class="block text-sm font-medium mb-2">Ruang</label>
                                    <select name="ruang" id="ruang" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                        <option value="">-- Pilih Ruangan --</option>
                                        @foreach ($ruanganDetailList as $ruangan)
                                            <option value="{{ $ruangan['nama'] }}" data-kapasitas="{{ $ruangan['kapasitas'] }}">
                                                {{ $ruangan['nama'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="kapasitas" class="block text-sm font-medium mb-2">Kapasitas</label>
                                    <input type="text" id="kapasitas" name="kapasitas" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="hari" class="block text-sm font-medium mb-2">Hari</label>
                                    <select name="hari" id="hari" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="jam_mulai" class="block text-sm font-medium mb-2">Jam Mulai</label>
                                <input type="time" id="jam_mulai" name="jam_mulai" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="jam_selesai" class="block text-sm font-medium mb-2">Jam Selesai</label>
                                <input type="time" id="jam_selesai" name="jam_selesai" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" readonly>
                            </div>
                        </div>
                        <div id="dosen-container">
                            <div class="mb-4 dosen-input">
                                <label for="dosen" class="block text-sm font-medium mb-2">Dosen Pengajar</label>
                                <select name="dosen[]" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-gray-200' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}" required>
                                    <option value="">-- Pilih Dosen --</option>
                                    @foreach ($dosen as $daftar_dosen)
                                        <option value="{{ $daftar_dosen->nama }}">{{ $daftar_dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex mt-6">
                            <button type="button" id="add-dosen"
                            class="w-1/2 font-bold py-2 px-4 rounded-lg ml-2 bg-gradient-to-l from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-bl hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                                Tambahkan Dosen Pengajar
                            </button>
                            <button type="button" id="remove-dosen"
                                class="w-1/2 font-bold py-2 px-4 rounded-lg ml-2 bg-gradient-to-l from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-bl hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                                Hapus Dosen Pengajar
                            </button>
                        </div>
                        <div class="mt-3 flex">
                            <button type="submit"
                            class="w-full font-bold py-2 px-4 rounded-lg ml-2 bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                            Tambah
                        </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="justify-center items-center">
                <form class="w-full px-14">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
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
                <div class="px-14 pt-5 mt-5 mb-5 rounded-3xl">
                    <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                    <table class="table-auto p-5 w-full text-center rounded-3xl border-collapse" name="tabel_jadwal">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 w-auto border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Kelas</th>
                                <th class="px-4 py-2 w-auto border-r {{ $theme == 'light' ? 'border-gray-500' : 'border-gray-300' }}">Jam</th>
                                <th class="px-4 py-2 w-1/8 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mklist as $mk)
                                <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                    <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                        <p>{{ $mk->nama_mk }}-{{ $mk->kelas }}</p>
                                    </td>
                                    <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                        <p>{{ $mk->hari }}, {{ $mk->jam_mulai }}-{{ $mk->jam_selesai }}</p>
                                    </td>
                                    <td class="px-5 py-3 text-center">
                                        <button
                                            class="show-details transition-colors duration-200 px-3 py-2 rounded-lg bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}"
                                            data-nama="{{ $mk->nama_mk }}" 
                                            data-kode="{{ $mk->kode_mk }}"
                                            data-sks="{{ $mk->sks_mk }}" 
                                            data-semester="{{ $mk->semester_mk }}"
                                            data-prodi="{{ $mk->prodi }}" 
                                            data-kelas="{{ $mk->kelas }}"
                                            data-tahunajaran="{{ $mk->tahun_ajaran }}"
                                            data-dosen="{{ $mk->dosen }}" 
                                            data-ruang="{{ $mk->ruang }}"
                                            data-hari="{{ $mk->hari }}" 
                                            data-jammulai="{{ $mk->jam_mulai }}"
                                            data-jamselesai="{{ $mk->jam_selesai }}" 
                                            onclick="showDetails(this)">
                                            Info
                                        </button>
                                        <button
                                            class="delete-schedule transition-colors duration-200 px-3 py-2 rounded-lg bg-gradient-to-l from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white"
                                            data-id="{{ $mk->id }}"
                                            onclick="deleteSchedule(this)">
                                            Hapus
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="px-14 mt-5 pb-16 flex justify-end">
                    <button type="button" id="ajukanButton"
                        class="rounded-lg py-2 px-6 bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                        <strong>Ajukan</strong>
                    </button>
                </div>


                <script>
                    document.getElementById('jadwal-form').addEventListener('submit', function(event) {
                        event.preventDefault(); // Mencegah form dari pengiriman default
                
                        const formData = new FormData(this); // Ambil data dari form
                
                        fetch('{{ route('jadwal.store') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: data.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#4CAF50'
                                }).then(() => {
                                location.reload(); // Reload halaman setelah klik OK
                                }); 
                                // Reset form atau lakukan tindakan lain setelah sukses
                                document.getElementById('jadwal-form').reset();
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: data.message,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat mengirim data.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                    });
                </script>

                <script>
                    document.getElementById('default-search').addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const rows = document.querySelectorAll('table[name="tabel_jadwal"] tbody tr');

                        rows.forEach(row => {
                            const courseName = row.querySelector('td:nth-child(1)').innerText.toLowerCase(); // 1st column has course name
                            const courseCode = row.querySelector('td:nth-child(2)').innerText.toLowerCase(); // 2nd column has course code

                            if (courseName.includes(searchTerm) || courseCode.includes(searchTerm)) {
                                row.style.display = ''; // Show the row if it matches
                            } else {
                                row.style.display = 'none'; // Hide the row if it doesn't match
                            }
                        });
                    });
                </script>
                <script>
                    document.getElementById('add-dosen').addEventListener('click', function() {
                        const dosenContainer = document.getElementById('dosen-container');
                        const newDosenInput = document.createElement('div');
                        newDosenInput.className = 'mb-4 dosen-input';
                        
                        const dosenList = @json($dosen); // Fetching the dosen data from Laravel

                        let options = '<label class="block text-sm font-medium mb-2">Dosen Pengajar</label>';
                        options += '<select name="dosen[]" class="w-full p-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 text-gray-100' : 'bg-gray-300 border-gray-400 text-gray-600' }}" required>';
                        options += '<option value="">-- Pilih Dosen --</option>'; // Default option

                        dosenList.forEach(dosen => {
                            options += `<option value="${dosen.nama}">${dosen.nama}</option>`;
                        });

                        options += '</select>';
                        
                        newDosenInput.innerHTML = options;
                        dosenContainer.appendChild(newDosenInput);
                    });

                    document.getElementById('remove-dosen').addEventListener('click', function() {
                        const dosenContainer = document.getElementById('dosen-container');
                        const dosenInputs = dosenContainer.getElementsByClassName('dosen-input');
                        if (dosenInputs.length > 1) {
                            dosenContainer.removeChild(dosenInputs[dosenInputs.length - 1]);
                        }
                    });
                    
                    document.getElementById('nama_mk').addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];

                        var kodeMk = selectedOption.getAttribute('data-kode');
                        var sksMk = selectedOption.getAttribute('data-sks');
                        var prodiMk = selectedOption.getAttribute('data-prodi');
                        var semesterMk = selectedOption.getAttribute('data-semester');

                        document.getElementById('kode_mk').value = kodeMk;
                        document.getElementById('sks_mk').value = sksMk;
                        document.getElementById('prodi').value = prodiMk;
                        document.getElementById('semester_mk').value = semesterMk;
                    });

                    document.getElementById('ajukanButton').addEventListener('click', function() {
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: "Apakah Anda yakin ingin mengajukan?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Ajukan!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Here you can add the logic to submit the application
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Pengajuan Anda telah dikirim.',
                                    icon: 'success',
                                    confirmButtonColor: '#28a745',  // Warna hijau untuk tombol konfirmasi berhasil
                                });
                            }
                        });
                    });

                </script>
            </div>
            </div>

            <style>
                .swal-popup-custom {
                    width: 600px !important;
                }
            </style>
        </div>
    </div>
</body>

<script>
    const ruangSelect = document.getElementById('ruang');
    const kapasitasInput = document.getElementById('kapasitas');

    ruangSelect.addEventListener('change', function() {
        const selectedOption = ruangSelect.options[ruangSelect.selectedIndex];
        const kapasitas = selectedOption.getAttribute('data-kapasitas');

        kapasitasInput.value = kapasitas || '';
   
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const courseDetails = @json($mklist);

        document.querySelectorAll('.show-details').forEach((button) => {
            button.addEventListener('click', () => {
                const details = {
                nama: button.getAttribute('data-nama'),
                kode: button.getAttribute('data-kode'),
                sks: button.getAttribute('data-sks'),
                semester: button.getAttribute('data-semester'),
                prodi: button.getAttribute('data-prodi'),
                kelas: button.getAttribute('data-kelas'),
                tahunajaran: button.getAttribute('data-tahunajaran'),
                dosen: button.getAttribute('data-dosen'),
                ruang: button.getAttribute('data-ruang'),
                hari: button.getAttribute('data-hari'),
                jammulai: button.getAttribute('data-jammulai'),
                jamselesai: button.getAttribute('data-jamselesai'),
                kapasitas: button.getAttribute('data-kapasitas'),
            };

                Swal.fire({
                    title: `<strong>Detail Mata Kuliah</strong>`,
                    html: `
                                    <div class="text-left space-y-4">
                                        <div>
                                            <h2 class="font-bold mb-1">Mata Kuliah :</h2>
                                            <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                <h2 class="ml-5 text-black font-bold">${details.nama} - ${details.kelas} </h2>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="font-bold mb-1">Kode Mata Kuliah :</h2>
                                            <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                <h2 class="ml-5 text-black font-bold">${details.kode}</h2>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="font-bold mb-1">SKS :</h2>
                                            <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                <h2 class="ml-5 text-black font-bold">${details.sks}</h2>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="font-bold mb-1">Jadwal :</h2>
                                            <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                <h2 class="ml-5 text-black font-bold">${details.hari}, ${details.jammulai} - ${details.jamselesai}</h2>
                                            </div>
                                        </div>
                                        <div>
                                            <h2 class="font-bold mb-1">Ruangan :</h2>
                                            <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                <h2 class="ml-5 text-black font-bold">${details.ruang}</h2>
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
                    confirmButtonColor: '#3085d6',
                    focusConfirm: false,
                    customClass: {
                        popup: 'swal-popup-custom'
                    }
                });
            });
        });
    });
</script>

<script>
// Add this script after your form
document.addEventListener('DOMContentLoaded', function() {
    const jamMulaiInput = document.getElementById('jam_mulai');
    const jamSelesaiInput = document.getElementById('jam_selesai');
    const sksInput = document.getElementById('sks_mk');
    const namaMkSelect = document.getElementById('nama_mk');

    // Function to calculate end time
    function calculateEndTime() {
        const jamMulai = jamMulaiInput.value;
        const sks = parseInt(sksInput.value);
        
        if (jamMulai && !isNaN(sks)) {
            // Parse jam mulai
            const [hours, minutes] = jamMulai.split(':').map(Number);
            
            // Calculate total minutes to add (50 minutes per SKS)
            const minutesToAdd = 50 * sks;
            
            // Create new date object for calculation
            const startDate = new Date();
            startDate.setHours(hours, minutes, 0);
            
            // Add the calculated minutes
            const endDate = new Date(startDate.getTime() + minutesToAdd * 60000);
            
            // Format the end time
            const endHours = String(endDate.getHours()).padStart(2, '0');
            const endMinutes = String(endDate.getMinutes()).padStart(2, '0');
            
            // Set the end time value
            jamSelesaiInput.value = `${endHours}:${endMinutes}`;
        }
    }

    // Calculate end time when start time changes
    jamMulaiInput.addEventListener('change', calculateEndTime);
    
    // Calculate end time when SKS changes
    sksInput.addEventListener('change', calculateEndTime);
    
    // Calculate end time when mata kuliah selection changes
    namaMkSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const sks = selectedOption.getAttribute('data-sks');
        if (sks) {
            sksInput.value = sks;
            calculateEndTime();
        }
    });
});
</script>

    <script>
    function deleteSchedule(button) {
        const scheduleId = button.getAttribute('data-id');

        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menghapus jadwal ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan DELETE ke server
                fetch(`/penyusunan-jadwal/${scheduleId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Berhasil!',
                            data.message,
                            'success'
                        ).then(() => {
                            location.reload(); // Muat ulang halaman
                        });
                    } else {
                        Swal.fire(
                            'Gagal!',
                            data.message,
                            'error'
                        );
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat menghapus jadwal.',
                        'error'
                    );
                });
            }
        });
    }
</script>

</html>