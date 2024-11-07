<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Penyusunan Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <div class="px-8 pt-5 flex justify-center items-center">
                <div
                    class="w-full rounded-full border-yellow-500 border-2  px-4 py-2 flex justify-between items-center">
                    <div id="listjadwal"
                        class="w-full rounded-full bg-yellow-500  px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300">
                        <h2 class="text-xl font-bold">List Jadwal Kuliah</h2>
                    </div>
                </div>
            </div>

            <!-- Pengajuan jadwal kuliah -->
            <div class="flex justify-center items-center mt-10">
                <div class="max-w-xs max-h-xs">
                    <h2 class="text-2xl font-bold text-white mb-6 text-center">Pengajuan Jadwal Kuliah</h2>
                    <div class="p-10 rounded-lg items-center" style="background-color: #2A2C33;">
                        <p class="text-yellow-500 text-sm mb-4 text-center">Jumlah Mata Kuliah yang diajukan</p>
                        <div class="box-border border-2 flex justify-center items-center rounded-lg w-24 h-24 mx-auto"
                            style="border-color: #F0B90B;">
                            <span class="text-5xl font-bold">5</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center my-10">
                <div class="max-w-6xl w-full bg-gray-800 p-6 rounded-lg px-8"> <!-- Menambahkan px-8 di sini -->
                    <h3 class="text-xl font-semibold mb-4 text-center">Tambah Mata Kuliah</h3>

                    <form method="POST" action="{{ route('jadwal.store') }}">
                        @csrf 

                        <div class="grid grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <label for="nama_mk" class="block text-sm font-medium mb-2">Nama Mata Kuliah</label>
                                    <select id="nama_mk" name="nama_mk" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>
                                        <option value="">--Pilih Mata Kuliah--</option>
                                        @foreach ($matakuliahList as $matakuliah)
                                            <option value="{{ $matakuliah->kodemk }}" 
                                            data-sks="{{ $matakuliah->sksmk }}" 
                                            data-prodi="{{ $matakuliah->prodimk }}" 
                                            data-semester="{{ $matakuliah->smtmk }}">
                                            
                                            
                                            {{ $matakuliah->namemk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="kode_mk" class="block text-sm font-medium mb-2">Kode Mata
                                        Kuliah</label>
                                    <input type="text" id="kode_mk" name="kode_mk"
                                        class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="sks_mk" class="block text-sm font-medium mb-2">SKS</label>
                                    <input type="number" id="sks_mk" name="sks_mk"
                                        class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="semester_mk" class="block text-sm font-medium mb-2">Semester</label>
                                    <input type="number" id="semester_mk" name="semester_mk"
                                        class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="prodi" class="block text-sm font-medium mb-2">Program Studi</label>
                                    <input type="text" id="prodi" name="prodi"
                                        class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                        required>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <label for="kelas" class="block text-sm font-medium mb-2">Kelas</label>
                                    <select name="kelas" id="kelas" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>
                                        <option value="kelas">A</option>
                                        <option value="kelas">B</option>
                                        <option value="kelas">C</option>
                                        <option value="kelas">D</option>
                                        <option value="">E</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="tahun_ajaran" class="block text-sm font-medium mb-2">Tahun
                                        Ajaran</label>
                                    <input type="text" id="tahun_ajaran" name="tahun_ajaran"
                                        class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="ruang" class="block text-sm font-medium mb-2">Ruang</label>
                                    <select name="ruang" id="ruang" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>
                                        <option value="">--Pilih Ruangan--</option>
                                        @foreach ($ruanganDetailList as $ruangan)
                                            <option value="{{ $ruangan['kapasitas'] }}" data-kapasitas="{{ $ruangan['kapasitas'] }}">
                                                {{ $ruangan['nama'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="kapasitas" class="block text-sm font-medium mb-2">Kapasitas</label>
                                    <input type="text" id="kapasitas" name="kapasitas" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" readonly>
                                </div>

                                <div class="mb-4">
                                    <label for="hari" class="block text-sm font-medium mb-2">Hari</label>
                                    <select name="hari" id="hari" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>
                                        <option value="">--Pilih Hari--</option>
                                        <option value="hari">Senin</option>
                                        <option value="">Selasa</option>
                                        <option value="">Rabu</option>
                                        <option value="">Kamis</option>
                                        <option value="">Jumat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mt-4">
                            <div class="mb-4">
                                <label for="jam_mulai" class="block text-sm font-medium mb-2">Jam Mulai</label>
                                <input type="time" id="jam_mulai" name="jam_mulai"
                                    class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="jam_akhir" class="block text-sm font-medium mb-2">Jam Akhir</label>
                                <input type="time" id="jam_akhir" name="jam_akhir"
                                    class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white"
                                    required>
                            </div>
                        </div>
                        <div id="dosen-container">
                            <div class="mb-4 dosen-input">
                                <label for="dosen" class="block text-sm font-medium mb-2">Dosen Pengajar</label>
                                <select name="dosen[]" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>
                                    <option value="">Pilih Dosen</option>
                                    @foreach ($dosen as $daftar_dosen)
                                        <option value="{{ $daftar_dosen->nip }}">{{ $daftar_dosen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-between mt-6">
                            <button type="button" id="add-dosen"
                                class="w-1/2 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-400 mr-2">
                                Tambahkan Dosen Pengajar
                            </button>
                            <button type="button" id="remove-dosen"
                                class="w-1/2 bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-400 ml-2">
                                Hapus Dosen Pengajar
                            </button>
                            <button type="submit"
                                class="w-1/2 bg-yellow-500 text-black font-bold py-2 px-4 rounded-lg hover:bg-yellow-400 ml-2">
                                Tambah
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="justify-center items-center">
                <form class="w-full px-8">
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
                            class="block w-full p-4 pl-10 text-sm text-white border border-gray-800 rounded-lg bg-gray-800 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari mata kuliah" />
                    </div>
                </form>
                <div class="px-8 pt-5 mt-5 mb-5">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" name="tabel_jadwal">
                        <thead>
                            <tr class="bg-[#878A91]">
                                <th class="px-4 py-2 w-auto border-r border-white rounded-tl-lg">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/8 rounded-tr-lg">Tambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mklist as $mk)
                                <tr style="background-color: #23252A;">
                                    <td class="px-4 py-2 border-r border-white">
                                        <p class="text-white">{{ $mk->nama_mk }}</p>
                                    </td> <!-- Correctly access the mataKuliah relationship -->
                                    <td class="px-5 py-2 text-center">
                                        <button
                                            class="show-details transition-colors duration-200 bg-[#878A91] p-2 rounded-lg"
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
                                            data-jamakhir="{{ $mk->jam_akhir }}" 
                                            onclick="showDetails(this)">
                                            Info
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                   document.getElementById('add-dosen').addEventListener('click', function() {
                    const dosenContainer = document.getElementById('dosen-container');
                    const newDosenInput = document.createElement('div');
                    newDosenInput.className = 'mb-4 dosen-input';
                    
                    // Assuming you have a variable `dosenList` that contains the dosen data
                    // You can replace this with your actual dosen data
                    const dosenList = @json($dosen); // Fetching the dosen data from Laravel

                    // Create the dropdown
                    let options = '<label class="block text-sm font-medium mb-2">Dosen Pengajar</label>';
                    options += '<select name="dosen[]" class="w-full p-2 border rounded-lg bg-gray-900 border-gray-700 text-white" required>';
                    options += '<option value="">Pilih Dosen</option>'; // Default option

                    // Loop through dosenList to create options
                    dosenList.forEach(dosen => {
                        options += `<option value="${dosen.nip}">${dosen.nama}</option>`;
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

                    // Ambil data dari option yang dipilih
                    var kodeMk = selectedOption.value;
                    var sksMk = selectedOption.getAttribute('data-sks');
                    var prodiMk = selectedOption.getAttribute('data-prodi');
                    var semesterMk = selectedOption.getAttribute('data-semester');

                    // Isi input tersembunyi dengan data yang diambil
                    document.getElementById('kode_mk').value = kodeMk;
                    document.getElementById('sks_mk').value = sksMk;
                    document.getElementById('prodi').value = prodiMk;
                    document.getElementById('semester_mk').value = semesterMk;
                });

                </script>



            </div>


            <style>
                /* Optional custom styling for the SweetAlert popup */
                .swal-popup-custom {
                    width: 600px !important;
                }
            </style>
        </div>
    </div>
</body>

<script>
    // Dapatkan elemen ruangan dan kapasitas
    const ruangSelect = document.getElementById('ruang');
    const kapasitasInput = document.getElementById('kapasitas');

    // Event listener untuk perubahan pada select ruang
    ruangSelect.addEventListener('change', function() {
        const selectedOption = ruangSelect.options[ruangSelect.selectedIndex];
        const kapasitas = selectedOption.getAttribute('data-kapasitas');

        // Set nilai kapasitas ke input
        kapasitasInput.value = kapasitas || '';
    });
</script>

</html>
