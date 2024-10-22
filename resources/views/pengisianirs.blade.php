<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian IRS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-900 text-gray-100">
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
                <div class="px-8 pt-5">
                    <h2 class="text-center text-lg font-semibold mt-2 mb-4">Ringkasan Mata Kuliah yang diambil</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Kode MK</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Mata Kuliah</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Waktu</th>
                                <th class="px-4 py-2 w-1/3 rounded-tr-lg">SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan ditambahkan di sini -->
                        </tbody>
                    </table>

                    <div class="py-5 flex">
                        <div class="w-3/5 flex justify-between">
                            <p class="pl-1 text-sm italic">Notes : Jika mata kuliah ingin diproses oleh dosen wali, klik
                                tombol di sebelah kanan</p>
                        </div>
                        <div
                            class="w-1/6 ml-auto text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800 font-bold">
                            <button>Ajukan</button>
                        </div>
                        <div
                            class="w-1/6 ml-auto text-white flex text-center items-center justify-center py-3 rounded-md cursor-pointer bg-[#880000] hover:bg-red-500 font-bold">
                            <button>Batal Ajukan</button>
                        </div>
                    </div>
                </div>

                <div class="px-8 pt-5">
                    <h2 class="text-center text-lg font-semibold mb-5">List Mata Kuliah</h2>
                    <div class="flex justify-between items-center">
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
                </div>

                <div class="px-8 pt-5 pb-10">
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
                                <tr style="background-color: #23252A;">
                                    <td class="px-4 py-2 border-r border-white">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">{{ $mata_kuliah->kode }}</td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">{{ $mata_kuliah->nama }}</td>
                                    <td class="px-4 py-2 w-1/3 border-r border-white">
                                        {{ $mata_kuliah->hari }},
                                        {{ \Carbon\Carbon::parse($mata_kuliah->jam_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($mata_kuliah->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td class="px-4 py-2 border-r border-white">
                                        <div
                                            class="text-white text-center items-center justify-center mx-2 my-1 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800 font-bold">
                                            <button class="ambil-mata-kuliah" data-kode="{{ $mata_kuliah->kode }}"
                                                data-nama="{{ $mata_kuliah->nama }}"
                                                data-hari-jam="{{ $mata_kuliah->hari }}, {{ \Carbon\Carbon::parse($mata_kuliah->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($mata_kuliah->jam_selesai)->format('H:i') }}"
                                                data-sks="{{ $mata_kuliah->sks }}">
                                                Ambil
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border-white">
                                        <div
                                            class="h-7 w-7 mx-auto rounded-lg bg-white flex justify-center items-center">
                                            <button
                                                class="show-details justify-center text-center text-3xl text-black font-bold focus:outline-none"
                                                data-index="{{ $index }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-right-fill"
                                                    viewBox="0 0 16 16">
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

                <div id="contentIRSMahasiswa" class="hidden">
                    <div class="px-4 sm:px-6 md:px-8 pt-5 pb-10">
                        <h2 class="text-center text-lg font-semibold mb-4">IRS Mahasiswa</h2>
                        <div
                            class="w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2">
                            <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                                <div class="w-full md:w-3/4 px-4 py-3">
                                    <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil
                                    </h2>
                                    <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                                </div>
                            </div>
                            <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                                <div class="w-full md:w-3/4 px-4 py-3">
                                    <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil
                                    </h2>
                                    <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                                </div>
                            </div>
                            <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                                <div class="w-full md:w-3/4 px-4 py-3">
                                    <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil
                                    </h2>
                                    <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                                </div>
                            </div>
                            <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                                <div class="w-full md:w-3/4 px-4 py-3">
                                    <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil
                                    </h2>
                                    <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

                    const courseDetails = @json($list_mata_kuliah);
                    const detailButtons = document.querySelectorAll('.show-details');
                    detailButtons.forEach((button) => {
                        button.addEventListener('click', () => {
                            const index = button.getAttribute('data-index'); // Ambil index dari data-index

                            const details = courseDetails[index];

                            Swal.fire({
                                title: <strong>Detail Mata Kuliah</strong>,
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

                    document.querySelectorAll('.ambil-mata-kuliah').forEach(button => {
                        button.addEventListener('click', (event) => {
                            const kode = event.target.dataset.kode;
                            const nama = event.target.dataset.nama;
                            const waktu = event.target.dataset.hariJam; // Format: "Hari, HH:mm - HH:mm"
                            const sks = event.target.dataset.sks;
                            const buttonElement = event.target;

                            // Memisahkan hari dan jam dari data waktu
                            const [hari, jam] = waktu.split(', ');
                            const [jamMulai, jamSelesai] = jam.split(' - ');

                            // Memeriksa apakah mata kuliah sudah ada
                            const tableBody = document.querySelector('#contentPengisianIRS table tbody');
                            const rows = tableBody.querySelectorAll('tr');
                            let alreadyExists = false;
                            let tabrakan = false;
                            let rowIndex;

                            // Mengecek apakah mata kuliah sudah ada atau jadwal bertabrakan
                            rows.forEach((row, index) => {
                                const rowKode = row.cells[1].innerText;
                                const rowWaktu = row.cells[3].innerText; // Format: "Hari, HH:mm - HH:mm"

                                // Memisahkan hari dan jam dari data row waktu
                                const [rowHari, rowJam] = rowWaktu.split(', ');
                                const [rowJamMulai, rowJamSelesai] = rowJam.split(' - ');

                                // Mengecek apakah kode sudah ada di tabel
                                if (rowKode === kode) {
                                    alreadyExists = true;
                                    rowIndex = index;
                                }

                                // Mengecek apakah hari sama dan ada irisan waktu (tabrakan)
                                if (hari === rowHari && isTimeOverlap(jamMulai, jamSelesai, rowJamMulai,
                                        rowJamSelesai)) {
                                    tabrakan = true;
                                }
                            });

                            if (alreadyExists) {
                                // Mata kuliah sudah ada dalam ringkasan, hanya bisa "Batal Ambil"
                                if (buttonElement.innerText === 'Batalkan') {
                                    Swal.fire({
                                        title: 'Batalkan Mata Kuliah?',
                                        text: 'Mata kuliah ini akan dihapus dari ringkasan.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Ya, hapus',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            rows[rowIndex].remove();

                                            // Ubah tombol kembali menjadi "Ambil"
                                            buttonElement.innerText = 'Ambil';
                                            buttonElement.disabled = false; // Aktifkan tombol kembali
                                            buttonElement.parentElement.classList.remove('bg-red-500',
                                                'hover:bg-red-700');
                                            buttonElement.parentElement.classList.add('bg-[#34803C]',
                                                'hover:bg-green-800');

                                            // Periksa dan perbarui tombol terkait yang bertabrakan
                                            updateTabrakanButtons(waktu,
                                            kode); // Pass kode mata kuliah yang dibatalkan

                                            // Atur ulang nomor urut
                                            resetTableNumbering();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Mata Kuliah Sudah Ditambahkan',
                                        text: 'Mata kuliah ini sudah ada dalam ringkasan.',
                                        icon: 'warning',
                                        confirmButtonText: 'Tutup'
                                    });
                                }
                            } else if (tabrakan) {
                                // Jadwal bentrok (tabrakan)
                                Swal.fire({
                                    title: 'Jadwal Tabrakan',
                                    text: 'Mata kuliah ini memiliki jadwal yang bertabrakan dengan mata kuliah lain.',
                                    icon: 'error',
                                    confirmButtonText: 'Tutup'
                                });

                                // Menambahkan keterangan "Tabrakan" pada tombol
                                buttonElement.innerText = 'Tabrakan';
                                buttonElement.disabled = true; // Nonaktifkan tombol agar tidak bisa diambil
                                buttonElement.parentElement.classList.remove('bg-[#34803C]', 'hover:bg-green-800');
                                buttonElement.parentElement.classList.add('bg-red-500');
                            } else {
                                // Menambahkan baris ke tabel ringkasan jika tidak ada bentrok atau mata kuliah belum diambil
                                const newRow = document.createElement('tr');
                                newRow.innerHTML = `
                <td class="px-4 py-2 border-r border-white">${tableBody.children.length + 1}</td>
                <td class="px-4 py-2 border-r border-white">${kode}</td>
                <td class="px-4 py-2 border-r border-white">${nama}</td>
                <td class="px-4 py-2 border-r border-white">${waktu}</td>
                <td class="px-4 py-2 border-white">${sks}</td>
            `;

                                tableBody.appendChild(newRow);

                                // Ubah tombol menjadi "Batal Ambil"
                                buttonElement.innerText = 'Batalkan';
                                buttonElement.parentElement.classList.remove('bg-[#34803C]', 'hover:bg-green-800');
                                buttonElement.parentElement.classList.add('bg-red-500', 'hover:bg-red-700');

                                // Ubah semua tombol yang bertabrakan kecuali mata kuliah ini
                                document.querySelectorAll('.ambil-mata-kuliah').forEach(otherButton => {
                                    const otherKode = otherButton.dataset.kode; // Ambil kode mata kuliah lain
                                    const otherWaktu = otherButton.dataset.hariJam;
                                    const [otherHari, otherJam] = otherWaktu.split(', ');
                                    const [otherJamMulai, otherJamSelesai] = otherJam.split(' - ');

                                    // Pastikan tidak mengubah tombol dari mata kuliah yang sama
                                    if (otherKode !== kode && otherHari === hari && isTimeOverlap(jamMulai,
                                            jamSelesai, otherJamMulai, otherJamSelesai)) {
                                        otherButton.innerText = 'Tabrakan';
                                        otherButton.disabled = true; // Nonaktifkan tombol yang bertabrakan
                                        otherButton.parentElement.classList.remove('bg-[#34803C]',
                                            'hover:bg-green-800');
                                        otherButton.parentElement.classList.add('bg-red-500');
                                    }
                                });

                                // Atur ulang nomor urut
                                resetTableNumbering();
                            }
                        });
                    });

                    // Fungsi untuk mengatur ulang nomor urut di tabel
                    function resetTableNumbering() {
                        const tableBody = document.querySelector('#contentPengisianIRS table tbody');
                        const rows = tableBody.querySelectorAll('tr');

                        rows.forEach((row, index) => {
                            row.cells[0].innerText = index + 1; // Kolom pertama adalah kolom nomor
                        });
                    }

                    // Fungsi untuk mengecek apakah waktu bertabrakan (overlap)
                    function isTimeOverlap(start1, end1, start2, end2) {
                        return (start1 < end2 && end1 > start2);
                    }

                    // Fungsi untuk mengupdate status tombol yang bertabrakan
                    function updateTabrakanButtons(removedWaktu, removedKode) {
                        // Memisahkan hari dan jam dari data waktu yang dihapus
                        const [removedHari, removedJam] = removedWaktu.split(', ');
                        const [removedJamMulai, removedJamSelesai] = removedJam.split(' - ');

                        // Memeriksa kembali jadwal bertabrakan yang tidak lagi bertabrakan setelah penghapusan
                        document.querySelectorAll('.ambil-mata-kuliah').forEach(button => {
                            const waktu = button.dataset.hariJam;
                            const [hari, jam] = waktu.split(', ');
                            const [jamMulai, jamSelesai] = jam.split(' - ');
                            const kode = button.dataset.kode; // Ambil kode mata kuliah

                            // Jika tidak ada lagi irisan waktu, ubah status tombol kembali ke "Ambil" jika bukan mata kuliah yang dibatalkan
                            if (kode !== removedKode && hari === removedHari && !isTimeOverlap(removedJamMulai,
                                    removedJamSelesai, jamMulai, jamSelesai)) {
                                if (button.innerText === 'Tabrakan') {
                                    button.innerText = 'Ambil';
                                    button.disabled = false;
                                    button.parentElement.classList.remove('bg-red-500');
                                    button.parentElement.classList.add('bg-[#34803C]', 'hover:bg-green-800');
                                }
                            }
                        });
                    }
                </script>

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
            </div>
        </div>
</body>

</html>
