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
                <div class="w-full rounded-full border-yellow-500 border-2  px-4 py-2 flex justify-between items-center">
                    <div id="listjadwal" class="w-1/2 rounded-full bg-yellow-500  px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchjadwal('listjadwal')">
                        <h2 class="text-md font-bold">List Jadwal Kuliah</h2>
                    </div>
                    <div id="paketjadwal" class="w-1/2 rounded-full flex justify-center items-center  px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchjadwal('paketjadwal')">
                        <h2 class="text-md font-bold">Paket Jadwal Kuliah</h2>
                    </div>
                </div>
            </div>

            <!-- Pengajuan jadwal kuliah -->
            <div class="flex justify-center items-center mt-10">
                <div class="w-full max-w-md">
                    <h2 class="text-2xl font-bold text-white mb-6 text-center">Pengajuan Jadwal Kuliah</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="p-10 rounded-lg items-center" style="background-color: #2A2C33;">
                            <p class="text-yellow-500 text-sm mb-4 text-center">Jumlah Mata Kuliah yang diajukan</p>
                            <div class="box-border border-2 flex justify-center items-center rounded-lg w-20 h-20 mx-auto" style="border-color: #F0B90B;">
                                <span class="text-5xl font-bold">5</span>
                            </div>
                        </div>

                        <div class="p-10 rounded-lg items-center" style="background-color: #2A2C33;">
                            <p class="text-red-500 text-sm mb-4 text-center">Jumlah Mata Kuliah yang belum diajukan</p>
                            <div class="box-border border-2 flex justify-center items-center rounded-lg w-20 h-20 mx-auto" style="border-color: #CF3333;">
                                <span class="text-5xl font-bold">5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            <div class="px-8 my-5 flex justify-center">
                <div class="w-full rounded-lg py-2 bg-[#34803C] hover:bg-[#2b6e32] flex justify-center">
                    <button class="tambahkan text-xl text-white font-bold w-full">
                        <p class="mx-auto">Tambahkan Mata Kuliah</p>
                    </button>
                </div>
            </div>
            <div id="contentpaketjadwal" class="hidden">
                <div class="px-8 pt-5 mt-5 mb-5">
                    <h2 class="text-center text-lg font-semibold mb-4">Jadwal Pengisian IRS</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="bg-[#878A91]">
                                <th class="px-4 py-2 w-1/6 border-r border-white rounded-tl-lg">Waktu</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/6 border-r border-white">Ruangan</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Senin, 07.00-09.30</td>
                                <td class="px-4 py-2 border-r border-white">Proyek Perangkat Lunak</td>
                                <td class="px-4 py-2 border-r border-white">E101</td>                              
                                <td class="px-5 py-2 text-center">
                                    <div class="inline-flex space-x-3">
                                        <button onclick="window.location.href='#'" class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                            <strong>Info</strong>
                                        </button>
                                        <button onclick="window.location.href='#'" class="w-16 text-white rounded-md px-1 py-2 bg-[#A00000] hover:bg-[#880000]">
                                            <strong>Hapus</strong>
                                        </button>
                                    </div>
                                </td>                                                            
                            </tr>   
                        </tbody>
                    </table>
                </div>

                <div class="px-8 mt-5 flex justify-center">
                    <div class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] min-w-[120px]">
                        <a href="#" class="text-center block text-white"><strong>Ajukan</strong></a>
                    </div>
                </div>
            </div>
            <div id="contentlistjadwal">
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
                                    </td>                          <!-- Correctly access the mataKuliah relationship -->
                                    <td class="px-5 py-2 text-center">
                                        <button onclick="window.location.href='#'" class="transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" class="fill-green-300 hover:fill-green-700 transition-colors duration-200 ease-in-out" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                                            </svg>
                                        </button>                                                                                                                                         
                                    </td>                             
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('default-search').addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const rows = document.querySelectorAll('table tbody tr');

                        rows.forEach(row => {
                            const courseNameElement = row.querySelector('td:nth-child(1) p'); // First column for course name

                            if (courseNameElement) { // Check if the element exists
                                const courseName = courseNameElement.innerText.toLowerCase();

                                if (courseName.includes(searchTerm)) {
                                    row.style.display = ''; // Show the row if it matches
                                } else {
                                    row.style.display = 'none'; // Hide the row if it doesn't match
                                }
                            } else {
                                // If courseNameElement doesn't exist, just hide the row
                                row.style.display = 'none';
                            }
                        });
                    });
                });
            </script>
            <script>
                function switchjadwal(selected) {
                    const listjadwal = document.getElementById('listjadwal');
                    const paketjadwal = document.getElementById('paketjadwal');

                    const contentlistjadwal = document.getElementById('contentlistjadwal');
                    const contentpaketjadwal = document.getElementById('contentpaketjadwal');

                    if (selected === 'listjadwal') {
                        listjadwal.classList.add('bg-yellow-500', 'border-[#17181C]');
                        paketjadwal.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        contentlistjadwal.classList.remove('hidden');
                        contentpaketjadwal.classList.add('hidden');
                    } else if (selected === 'paketjadwal') {
                        listjadwal.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        paketjadwal.classList.add('bg-yellow-500', 'border-[#17181C]');
                        contentlistjadwal.classList.add('hidden');
                        contentpaketjadwal.classList.remove('hidden');
                    }
                }
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const courseDetails = @json($matakuliahList);

                    document.querySelectorAll('.tambahkan').forEach((button) => {
                        button.addEventListener('click', () => {
                            // Create dropdown options for `nama_mk` based on `mata kuliah`
                            let namaMkOptions = `<option value="" disabled selected>Pilih Mata Kuliah</option>`;
                            courseDetails.forEach((course, index) => {
                                namaMkOptions += `<option value="${index}">${course.namemk}</option>`;
                            });

                            // Display the form in SweetAlert2
                            Swal.fire({
                                title: `<strong>Detail Mata Kuliah</strong>`,
                                html: `
                                    <form id="popupForm">
                                        <div class="mb-4">
                                            <label for="nama_mk" class="block text-left font-semibold mb-2">Nama Mata Kuliah</label>
                                            <select id="nama_mk" name="nama_mk" class="w-full p-2 border rounded-md">
                                                ${namaMkOptions}
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="kode_mk" class="block text-left font-semibold mb-2">Kode Mata Kuliah</label>
                                            <input type="text" id="kode_mk" name="kode_mk" class="w-full p-2 border rounded-md" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="sks_mk" class="block text-left font-semibold mb-2">SKS Mata Kuliah</label>
                                            <input type="text" id="sks_mk" name="sks_mk" class="w-full p-2 border rounded-md" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="kelas" class="block text-left font-semibold mb-2">Masukkan Kelas</label>
                                            <input type="text" id="kelas" name="kelas" class="w-full p-2 border rounded-md" placeholder="Masukkan Kelas">
                                        </div>
                                        <div class="mb-4">
                                            <label for="hari" class="block text-left font-semibold mb-2">Hari</label>
                                            <select id="hari" name="hari" class="w-full p-2 border rounded-md">
                                                <option value="" disabled selected>Pilih Hari</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="jammulai" class="block text-left font-semibold mb-2">Jam Mulai</label>
                                            <input type="time" id="jammulai" name="jammulai" class="w-full p-2 border rounded-md">
                                        </div>
                                        <div class="mb-4">
                                            <label for="jamakhir" class="block text-left font-semibold mb-2">Jam Selesai</label>
                                            <input type="time" id="jamakhir" name="jamakhir" class="w-full p-2 border rounded-md">
                                        </div>
                                    </form>
                                `,
                                showCancelButton: true,
                                confirmButtonText: 'Simpan',
                                cancelButtonText: 'Batal',
                                focusConfirm: false,
                                customClass: {
                                    popup: 'swal-popup-custom'
                                },
                                didOpen: () => {
                                    // Listen for changes on the `nama_mk` dropdown
                                    const namaMkSelect = document.getElementById('nama_mk');
                                    const kodeMkInput = document.getElementById('kode_mk');
                                    const sksMKInput = document.getElementById('sks_mk');

                                    namaMkSelect.addEventListener('change', function() {
                                        const selectedIndex = namaMkSelect.value;
                                        const selectedCourse = courseDetails[selectedIndex];

                                        // Auto-populate the `kode_mk` and `sks_mk` fields based on selected `nama_mk`
                                        if (selectedCourse) {
                                            kodeMkInput.value = selectedCourse.kodemk;
                                            sksMKInput.value = selectedCourse.sksmk;
                                        } else {
                                            kodeMkInput.value = '';
                                            sksMKInput.value = '';
                                        }
                                    });
                                },
                                preConfirm: () => {
                                    // Capture form data for submission
                                    return {
                                        nama_mk: document.getElementById('nama_mk').value,
                                        kode_mk: document.getElementById('kode_mk').value,
                                        sks_mk: document.getElementById('sks_mk').value,
                                        kelas: document.getElementById('kelas').value,
                                        hari: document.getElementById('hari').value,
                                        jammulai: document.getElementById('jammulai').value,
                                        jamakhir: document.getElementById('jamakhir').value
                                    };
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const formData = {
                                        nama_mk: document.getElementById('nama_mk').options[document.getElementById('nama_mk').selectedIndex].text,
                                        kode_mk: document.getElementById('kode_mk').value,
                                        sks_mk: document.getElementById('sks_mk').value,
                                        kelas: document.getElementById('kelas').value,
                                        hari: document.getElementById('hari').value,
                                        jammulai: document.getElementById('jammulai').value,
                                        jamakhir: document.getElementById('jamakhir').value
                                    };

                                    fetch("{{ route('penyusunan-jadwal.store') }}", {
                                        method: 'POST',
                                        body: JSON.stringify(formData),
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                            'Content-Type': 'application/json',
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
                                                nama: formData.nama_mk,
                                                kode: formData.kode_mk,
                                                sks: formData.sks_mk,
                                                kelas: formData.kelas,
                                                hari: formData.hari,
                                                jammulai: formData.jammulai,
                                                jamakhir: formData.jamakhir,
                                            });

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

                                        let errorMessage = 'Terjadi kesalahan saat menambahkan mata kuliah';
                                        if (error.errors) {
                                            errorMessage = Object.values(error.errors).flat().join('\n');
                                        } else if (error.message) {
                                            errorMessage = error.message;
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
                });

                function addCourseToSummary(course) {
                    const summaryTable = document.querySelector('table:first-of-type tbody');
                    const newRow = document.createElement('tr');

                    newRow.style.backgroundColor = '#23252A';

                    // Calculate the new row number
                    const rowNumber = summaryTable.rows.length + 1;

                    // Create the row content
                    newRow.innerHTML = `
                                <td class="px-4 py-2 border-r border-white">${course.nama}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.kode}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.sks}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.kelas}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.hari}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.jammulai}</td>
                                <td class="px-4 py-2 w-1/3 border-r border-white">${course.jamakhir}</td>
                                <td class="px-4 py-2 border-white">
                                    <button class="cancel-course bg-red-500 text-white px-2 py-1 rounded">Batalkan</button>
                                </td>
                            `;

                    summaryTable.appendChild(newRow);
                }
            </script>


            <style>
                /* Optional custom styling for the SweetAlert popup */
                .swal-popup-custom {
                    width: 600px !important;
                }
            </style>
        </div>
    </div>
</body>

</html>
