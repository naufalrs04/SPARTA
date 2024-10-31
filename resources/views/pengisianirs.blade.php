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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #sksSidebar {
            opacity: 0;
            transition: left 0.3s ease-in-out, opacity 0.3s ease-in-out;
            /* Ubah right menjadi left */
            top: 30%;
            left: -300px;
            /* Ubah right menjadi left dan nilai positif menjadi negatif */
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
            left: 0px;
            /* Ubah right menjadi left */
            opacity: 1;
        }

        #toggleSidebar {
            top: 30%;
            left: 0;
            /* Ubah right menjadi left */
            color: white;
            padding: 10px;
            border-radius: 0 10px 10px 0;
            /* Ubah border-radius untuk sisi kanan */
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: transform 0.3s ease-in-out;
        }

        #toggleSidebar.rotated {
            transform: rotate(180deg);
        }



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
    </style>

</head>

<body class="bg-gray-900 text-gray-100">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            @include('components.navbar')

            {{-- Main Content --}}
            <div class="px-8 pt-5 flex justify-center items-center">
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
            <div id="contentPengisianIRS">
                <div class="px-10 pt-5">
                    <h2 class="text-center text-lg font-semibold mt-2 mb-4">Daftar Mata Kuliah yang diambil</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" id="summaryTable">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Kode MK</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Waktu</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">SKS</th>
                                <th class="px-4 py-2 rounded-tr-lg">Batalkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($irs_rekap as $rekap)
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">{{ $rekap->kode }}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">{{ $rekap->nama }}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">
                                    {{ $rekap->hari }},
                                    {{ \Carbon\Carbon::parse($rekap->jam_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($rekap->jam_selesai)->format('H:i') }}
                                </td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">{{ $rekap->sks }}</td>
                                <td class="px-4 py-2 border-white">
                                    <button class="cancel-course bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded"
                                        data-id="{{ $rekap->mata_kuliah_id }}"
                                        data-mahasiswa-id="{{ $rekap->mahasiswa_id }}"
                                        data-semester="{{ $rekap->semester }}">
                                        Batalkan
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pt-5 pb-3 flex">
                        <div class="w-3/5 flex justify-between">
                            <p class="pl-1 text-sm italic">Notes : Jika mata kuliah ingin diproses oleh dosen wali, klik tombol di sebelah</p>
                        </div>
                        <div id="ajukanButton" class="w-1/6 ml-auto text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800 font-bold">
                            <button onclick="ajukanIRS()">Ajukan</button>
                        </div>
                        <div id="batalAjukanButton" class="w-1/6 ml-auto text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#880000] hover:bg-red-500 font-bold hidden">
                            <button onclick="batalAjukanIRS()">Batal Ajukan</button>
                        </div>
                    </div>



                    <!-- Sidebar Melayang -->
                    <div id="sksSidebar" class="fixed left-[-300px] bg-yellow-600 h-auto w-64 text-white transition-all duration-300 p-4 shadow-lg rounded-lg">
                        <h2 class="text-xl font-bold mb-4">Total SKS Diambil</h2>
                        <div id="totalSks" class="text-4xl font-semibold">0</div>
                    </div>


                    <!-- Tombol untuk memperlihatkan sidebar -->
                    <button id="toggleSidebar" class="fixed left-0 bg-yellow-500 text-white p-3 rounded-r-lg shadow-lg focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>

                    <div id="listMataKuliah" class="py-7">
                        <h2 class="text-center text-lg font-semibold my-5">List Mata Kuliah</h2>
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
                                        class="block w-full p-4 pl-10 text-sm text-white border border-gray-800 rounded-lg bg-gray-800 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Cari mata kuliah" />
                                </div>
                            </form>
                        </div>

                        <table class="w-full text-center rounded-lg border-collapse" name="tabel_jadwal">
                            <thead>
                                <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                    <th class="px-4 py-2 border-r border-white rounded-tl-lg">No</th>
                                    <th class="px-4 py-2 w-1/3 border-r border-white">Kode Mata Kuliah</th>
                                    <th class="px-4 py-2 w-1/3 border-r border-white">Mata Kuliah</th>
                                    <th class="px-4 py-2 w-1/3 border-r border-white">Waktu</th>
                                    <th class="px-4 py-2 border-r border-white">Pengambilan</th>
                                    <th class="px-4 py-2 border-white rounded-tr-lg">Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_mata_kuliah as $index => $mata_kuliah)
                                <tr class="course-row" style="background-color: #23252A;"
                                    data-course-id="{{ $mata_kuliah->id }}"
                                    data-course-time="{{ $mata_kuliah->hari }}, {{ \Carbon\Carbon::parse($mata_kuliah->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($mata_kuliah->jam_selesai)->format('H:i') }}"
                                    data-ruangan-id="{{ $mata_kuliah->ruangan_id }}">
                                    <td class="px-4 py-2 border-r border-white">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">{{ $mata_kuliah->kode }}
                                    </td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">{{ $mata_kuliah->nama }}
                                    </td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">
                                        {{ $mata_kuliah->hari }},
                                        {{ \Carbon\Carbon::parse($mata_kuliah->jam_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($mata_kuliah->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-2 border-r border-white">
                                        <form action="{{ route('irs-rekap.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="mata_kuliah_id" value="{{ $mata_kuliah->id }}">
                                            <input type="hidden" name="ruangan_id" value="{{ $mata_kuliah->ruangan_id}}">
                                            <input type="hidden" name="sks" id="input-sks" value="{{ $mata_kuliah->sks }}">
                                            <div
                                                class="text-white text-center items-center justify-center mx-2 my-1 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800 font-bold">
                                                <button class="ambil-mata-kuliah"
                                                    data-kode="{{ $mata_kuliah->kode }}"
                                                    data-nama="{{ $mata_kuliah->nama }}"
                                                    data-hari-jam="{{ $mata_kuliah->hari }}, {{ \Carbon\Carbon::parse($mata_kuliah->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($mata_kuliah->jam_selesai)->format('H:i') }}"
                                                    data-sks="{{ $mata_kuliah->sks }}" type="submit">
                                                    Ambil
                                                </button>
                                            </div>
                                        </form>

                                    </td>
                                    <td class="px-4 py-2 border-white">
                                        <div
                                            class="h-7 w-7 mx-auto rounded-lg bg-white flex justify-center items-center">
                                            <button
                                                class="show-details justify-center text-center text-3xl text-black font-bold focus:outline-none"
                                                data-index="{{ $index }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor"
                                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
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

            <div id="contentIRSMahasiswa" class="hidden">
                @foreach($groupedData as $mahasiswaId => $semesterGroups)
                <div class="mahasiswa-container px-4 sm:px-6 md:px-8 pt-5 pb-10">
                    <h2 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa</h2>
                    <div class="w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2">
                        <div class="m-2">
                            @for($semester = 1; $semester <= $semesterMahasiswa; $semester++)
                                @if(isset($semesterGroups[$semester]))
                                <div class="w-full bg-[#757575] rounded-lg mb-4">
                                <div class="w-full flex justify-between items-center px-4 py-3">
                                    <div>
                                        <h3 class="font-bold text-md sm:text-lg">IRS Semester {{ $semester }}</h3>
                                        <p class="text-md sm:text-lg">Jumlah SKS: {{ $semesterGroups[$semester]->sum('sks') }}</p>
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

                                <div class="semester-content hidden px-4 pb-4 overflow-x-auto" id="semester">
                                    <h4 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa (Belum / Sudah Disetujui Wali)</h4>
                                    <table class="w-full bg-white rounded-lg">
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
                                                <td class="px-4 py-2 text-black">{{ $rekap->kode }}</td>
                                                <td class="px-4 py-2 text-black">{{ Str::before($rekap->nama, '-') }}</td>
                                                <td class="px-4 py-2 text-black">{{ substr($rekap->nama, -1) }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->sks }}</td>
                                                <td class="px-4 py-2 text-black">{{ $rekap->nama_ruangan }}</td>
                                                <td class="px-4 py-2 text-black">Baru</td>
                                                <td class="px-4 py-2 text-black">XX</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        @else
                        <div class="w-full bg-[#757575] rounded-lg mb-4 px-4 py-3">
                            <h3 class="font-bold text-md sm:text-lg">IRS Semester {{ $semester }}: Tidak ada data</h3>
                        </div>
                        @endif
                        @endfor
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>

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
                                                <h2 class="font-bold mb-1">Nama Mata Kuliah :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.nama}</h2>
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
                                                    <h2 class="ml-5 text-black font-bold">${details.jadwal}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Ruangan :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.nama_ruangan}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Kapasitas:</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.kapasitas_ruangan}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Dosen Pengampu :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">"Belum database"</h2>
                                                </div>
                                            </div>
                                        </div>
                                    `,
                        confirmButtonText: 'Tutup',
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
        // Update the event listener for form submission
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Get the button that was clicked
                const button = event.submitter;
                const kode = button.getAttribute('data-kode');
                const nama = button.getAttribute('data-nama');
                const hariJam = button.getAttribute('data-hari-jam');
                const sks = parseInt(button.getAttribute('data-sks'));

                // Show confirmation dialog
                if (hasConflict(kode, hariJam)) {
                    Swal.fire({
                        title: 'Peringatan',
                        text: 'Anda sudah mengambil mata kuliah ini dalam kelas lain !',
                        icon: 'warning'
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
                                        waktu: hariJam,
                                        sks: sks
                                    });

                                    // Update total SKS
                                    updateTotalSKS(sks);

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
                                    icon: 'warning'
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

            newRow.style.backgroundColor = '#23252A';

            // Calculate the new row number
            const rowNumber = summaryTable.rows.length + 1;

            // Create the row content
            newRow.innerHTML = `
                        <td class="px-4 py-2 border-r border-white">${rowNumber}</td>
                        <td class="px-4 py-2 w-1/3 border-r border-white">${course.kode}</td>
                        <td class="px-4 py-2 w-1/3 border-r border-white">${course.nama}</td>
                        <td class="px-4 py-2 w-1/3 border-r border-white">${course.waktu}</td>
                        <td class="px-4 py-2 w-1/3 border-r border-white">${course.sks}</td>
                        <td class="px-4 py-2 border-white">
                            <button class="cancel-course bg-red-500 text-white px-2 py-1 rounded">Batalkan</button>
                        </td>
                    `;

            summaryTable.appendChild(newRow);
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
            const sksSidebar = document.getElementById('sksSidebar');
            sksSidebar.classList.add('show');
        }

        // Function to calculate initial total SKS
        function calculateInitialTotalSKS() {
            const summaryTable = document.querySelector('table:first-of-type tbody');
            let total = 0;

            Array.from(summaryTable.rows).forEach(row => {
                const sks = parseInt(row.cells[4].textContent); // Assuming SKS is in the 5th column
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

            const newRow = summaryTable.insertRow();
            newRow.style.backgroundColor = '#23252A';

            // Insert cells
            const cellNo = newRow.insertCell();
            const cellKode = newRow.insertCell();
            const cellNama = newRow.insertCell();
            const cellWaktu = newRow.insertCell();
            const cellSks = newRow.insertCell();

            // Add classes and content
            [cellNo, cellKode, cellNama, cellWaktu, cellSks].forEach(cell => {
                cell.className = 'px-4 py-2 border-r border-white';
            });

            cellNo.textContent = rowCount;
            cellKode.textContent = course.kode;
            cellNama.textContent = course.nama;
            cellWaktu.textContent = course.waktu;
            cellSks.textContent = course.sks;
        }

        // Function to update total SKS
        function updateTotalSks(newSks) {
            const totalSksElement = document.getElementById('totalSks');
            const currentTotal = parseInt(totalSksElement.textContent);
            totalSksElement.textContent = (currentTotal + newSks).toString();

            // Show the SKS sidebar if it's not already visible
            const sksSidebar = document.getElementById('sksSidebar');
            sksSidebar.classList.add('show');
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Initialize listeners for cancel buttons
            initializeCancelButtons();
            // Initialize the SKS sidebar
            calculateInitialTotalSKS();
            initializeSKSSidebar();

            function initializeCancelButtons() {
                document.querySelectorAll('.cancel-course').forEach(button => {
                    button.addEventListener('click', handleCancelClick);
                });
            }

            function handleCancelClick(event) {
                const button = event.currentTarget;
                const row = button.closest('tr');
                const courseId = button.getAttribute('data-id');
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
                            updateTotalSKSAfterCancel(sks);
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
                const newTotal = Math.max(0, currentTotal - canceledSKS);
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
                        time: row.cells[3].textContent
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
                    const conflicts = [];

                    takenCourses.forEach(takenCourse => {
                        if (isTimeConflict(takenCourse.time, courseTime)) {
                            conflicts.push({
                                conflictingCourse: {
                                    name: courseName,
                                    code: courseCode,
                                    time: courseTime
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
                                        <strong class="text-gray-800">${conflict.conflictingCourse.name}</strong> 
                                        <span class="text-gray-600">(${conflict.conflictingCourse.code})</span>
                                        <br>
                                        <span class="text-sm text-gray-600">${conflict.conflictingCourse.time}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="font-bold text-red-600 bg-red-200 px-2 py-1 rounded">bertabrakan dengan</span>
                                    </div>
                                    <div>
                                        <strong class="text-gray-800">${conflict.takenCourse.name}</strong> 
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
                    confirmButtonText: 'Tutup'
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
            // Cek status IRS dari localStorage saat halaman dimuat
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
                    // Simpan status ke localStorage
                    localStorage.setItem('irsSubmitted', 'true');
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
                    // Hapus status dari localStorage
                    localStorage.removeItem('irsSubmitted');
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

        function setSubmittedState() {
            // Sembunyikan tabel list mata kuliah
            document.getElementById('listMataKuliah').classList.add('hidden');

            // Disable tombol batalkan
            const cancelButtons = document.querySelectorAll('.cancel-course');
            cancelButtons.forEach(button => {
                button.disabled = true;
                button.classList.remove('bg-red-600', 'hover:bg-red-700');
                button.classList.add('bg-gray-400', 'cursor-not-allowed');
            });

            // Update tampilan tombol
            document.getElementById('ajukanButton').classList.add('hidden'); // Sembunyikan tombol Ajukan
            document.getElementById('batalAjukanButton').classList.remove('hidden'); // Tampilkan tombol Batal Ajukan
        }

        function setDraftState() {
            // Tampilkan tabel list mata kuliah
            document.getElementById('listMataKuliah').classList.remove('hidden');

            // Enable tombol batalkan
            const cancelButtons = document.querySelectorAll('.cancel-course');
            cancelButtons.forEach(button => {
                button.disabled = false;
                button.classList.remove('bg-gray-400', 'cursor-not-allowed');
                button.classList.add('bg-red-600', 'hover:bg-red-700');
            });

            // Update tampilan tombol
            document.getElementById('ajukanButton').classList.remove('hidden'); // Tampilkan tombol Ajukan
            document.getElementById('batalAjukanButton').classList.add('hidden'); // Sembunyikan tombol Batal Ajukan
        }
    </script>
</body>

</html>