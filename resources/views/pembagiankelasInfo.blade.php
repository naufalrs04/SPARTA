<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembagian Kelas Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    @vite('resources/css/app.css')
    <style>
        input[type="checkbox"] {
            accent-color: black;
        }

        input[type="checkbox"]:checked {
            accent-color: #C68E00;
        }

        #main-content {
            min-height: 100vh;
        }
    </style>
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
            <div id="main-content" class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="flex justify-center pb-1">
                    <div class="max-w-xl relative">
                        <!-- Dropdown Departemen -->
                        <form id="ruanganForm" method="POST" action="{{ route('simpan.ruangan') }}">
                            @csrf
                            <h2 class="text-center text-lg font-semibold mb-5 mt-5 ml-14 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Pilih Departemen</h2>
                            <input type="hidden" id="selectedProdi" name="prodi" value="">
                            <button id="dropdownDepartemenButton"
                                class="w-[280px] p-4 pr-10 pl-4 rounded-xl cursor-pointer transition duration-100 ease-in-out flex justify-between items-center
                        text-gray-400 {{ $theme == 'light' ? 'bg-[#2A2C33] hover:bg-zinc-800 border-transparent focus:ring-gray-800 outline outline-1 outline-zinc-900' : 'bg-gray-200 hover:bg-zinc-300 border-gray-300 focus:ring-gray-300 outline outline-1' }} shadow-[4px_6px_1px_1px_rgba(0,_0,_0,_0.8)]">
                                <span id="selectedDepartemen">Pilih Departemen </span>
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown list -->
                            <div id="dropdownDepartemen"
                                class="hidden {{ $theme == 'light' ? 'bg-gray-700 border border-black' : 'bg-gray-50 outline outline-1' }} {{ $theme == 'light' ? 'text-gray-200' : 'text-gray-700' }} {{ $theme == 'light' ? 'divide-gray-600' : 'divide-gray-100' }} rounded-xl shadow w-full absolute z-10 mt-3" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                                <ul class="py-2 text-sm" aria-labelledby="dropdownDepartemenButton">
                                    @foreach ($prodi as $jurusan)
                                    <li>
                                        <span data-departemen="{{ $jurusan->nama }}"
                                            class="block px-4 py-2 cursor-pointer {{ $theme == 'light' ? 'hover:bg-gray-600 hover:text-white' : 'hover:bg-gray-300 hover:text-black' }}">
                                            {{ $jurusan->nama }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="flex justify-center my-3 mb-3">

                </div>
                <!-- Table Gedung dan Ruangan -->
                <form class="mb-6 mx-3 ">
                    <div class="text-center">
                        <div class="text-center text-lg font-semibold mb-5 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Gedung dan Ruangan</div>
                    </div>
                    <div class="ml-6 mr-6 overflow-x-auto rounded-xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                    @foreach ($gedung as $index => $g)
                                    <th class="px-4 py-2 {{ $index === 0 ? 'rounded-tl-lg' : '' }} {{ $index === count($gedung) - 1 ? 'rounded-tr-lg' : 'border-r border-gray-600' }}">
                                        {{ $g->nama }}
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="{{ $theme == 'light' ? 'bg-gray-800' : 'bg-gray-100' }}">
                                    @foreach ($gedung as $g)
                                    <td class="p-2 {{ $index !== count($gedung) - 1 ? '' : 'border-r border-gray-600' }}">
                                        <div class="flex flex-col items-center">
                                            @foreach ($ruangan[$g->id] ?? [] as $r)
                                            @php
                                            $isTaken = isset($ruanganProdi[$r->id]);
                                            $prodiName = $isTaken ? $ruanganProdi[$r->id]->first()->nama_prodi : null;
                                            @endphp
                                            <div class="flex items-center me-4 mt-2 mb-2">
                                                <input
                                                    id="checkbox-{{ $r->id }}"
                                                    name="ruangan[]"
                                                    value="{{ $r->id }}"
                                                    type="checkbox"
                                                    class="w-4 h-4 text-yellow-400 
            {{ $isTaken ? 'bg-red-500 border-red-600' : 'bg-gray-300 border-gray-400' }} 
            rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 cursor-pointer"
                                                    data-gedung="{{ $g->nama }}"
                                                    data-taken="{{ $isTaken }}"
                                                    data-prodi="{{ $prodiName }}"
                                                    {{ $isTaken ? 'disabled' : '' }}>
                                                <label for="checkbox-{{ $r->id }}" class="ms-2 text-base font-semibold 
            {{ $theme == 'light' ? ($isTaken ? 'text-red-500' : 'text-gray-300') : ($isTaken ? 'text-red-800' : 'text-gray-800') }}">
                                                    {{ $r->nama }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>

                                    </td>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--Kapasitas-->
                    <div class="flex justify-center mt-8 mb-3">
                        <input type="number" name="kapasitas" placeholder="Masukkan kapasitas"
                            class="border text-gray-400 p-4 pr-4 pl-4 focus:ring-2 focus:ring-gray-800 rounded-xl bg-[#2A2C33] cursor-pointer border border-transparent focus:border-gray-600 transition duration-100 ease-in-out flex justify-between items-center w-1/5 max-w-md {{ $theme == 'light' ? 'bg-[#2A2C33] hover:bg-zinc-800 border-transparent focus:ring-gray-800 outline outline-1 outline-zinc-900' : 'bg-gray-200 hover:bg-zinc-300 border-gray-300 focus:ring-gray-300 outline outline-1' }} shadow-[4px_6px_1px_1px_rgba(0,_0,_0,_0.8)]" />
                    </div>

                    <!--Button Simpan-->
                    <div class="px-8 mt-5 flex justify-end">
                        <button type="submit" class="rounded-lg py-2 px-5 bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white">
                            <strong>Simpan</strong>
                        </button>
                    </div>

                    </form>

                    <!--Table Ringkasan-->
                    <div class="mb-6 mx-3 rounded-xl" id="ringkasanSection">
                        <div class="text-center">
                            <h2 class="text-center text-lg font-semibold mb-5 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Ringkasan <span id="ringkasanTitle"></span></h2>
                        </div>
                        <div class="ml-6 mr-6 overflow-x-auto rounded-xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <table class="w-full text-center rounded-lg">
                                <thead>
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                        <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-600' }}">Departemen</th>
                                        <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-600' }}">Jumlah Ruangan</th>
                                        <th class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-600' }}">Info</th>
                                    </tr>
                                </thead>

                                <tbody id="/ringkasanBody">
                                    @foreach ( $prodi as $jurusan )
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-800' : 'bg-gray-100' }}">
                                        <td class="px-4 py-2 border-r border-gray-600">{{ $jurusan->nama }}</td>
                                        <td class="px-4 py-2 border-r border-gray-600">{{ $jurusan->total_ruangan}}
                                        </td>
                                        <td class="px-5 py-3 text-center">
                                            <button class="show-details transition-colors duration-200 px-3 py-2 rounded-lg bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}"
                                                data-nama="{{ $jurusan->nama }}"
                                                data-total-ruangan="{{ $jurusan->total_ruangan }}"
                                                data-ruangan='@json($jurusan->ruangan_details)'>
                                                Info
                                            </button>
                                        </td>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropdownDepartemenButton = document.getElementById('dropdownDepartemenButton');
        const dropdownDepartemen = document.getElementById('dropdownDepartemen');
        const selectedDepartemenText = document.getElementById('selectedDepartemen');

        // Toggle dropdown visibility for departments
        dropdownDepartemenButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            event.stopPropagation();
            dropdownDepartemen.classList.toggle('hidden');
        });

        // Handle clicks on department choices
        dropdownDepartemen.querySelectorAll('span').forEach(function(item) {
            item.addEventListener('click', function(event) {
                const selectedDepartemen = this.getAttribute('data-departemen');
                selectedDepartemenText.textContent = selectedDepartemen;
                document.getElementById('selectedProdi').value = selectedDepartemen;
                dropdownDepartemen.classList.add('hidden');

                // Reset all checkboxes
                document.querySelectorAll('input[name="ruangan[]"]').forEach(checkbox => {
                    checkbox.checked = false; // Uncheck all checkboxes
                });

                // Update ringkasan
                updateRingkasan(selectedDepartemen);
            });
        });
        // Add event listeners to checkboxes
        document.querySelectorAll('input[name="ruangan[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const selectedProdi = document.getElementById('selectedProdi').value;
                if (selectedProdi) {
                    updateRingkasan(selectedProdi);
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdownDepartemenButton.contains(event.target) && !dropdownDepartemen.contains(event.target)) {
                dropdownDepartemen.classList.add('hidden');
            }
        });

        document.getElementById('ruanganForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate: ensure a department is selected
            if (!document.getElementById('selectedProdi').value) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Silakan pilih Departemen terlebih dahulu.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'
                    }
                });
                return;
            }


            // Get checked checkboxes
            const checkedRuangan = document.querySelectorAll('input[name="ruangan[]"]:checked');
            if (checkedRuangan.length === 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Silakan pilih minimal satu ruangan.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'
                    }
                });
                return;
            }


            // Show confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menyimpan data ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#34803C',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form
                    this.submit();
                }
            });
        });

        // Show SweetAlert on successful form submission
        @if(session('success'))
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('
            success ') }}',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#28a745',
        });
        @endif

        // Show SweetAlert on error
        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('
            error ') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        @endif

        // Handle "Ajukan" button click
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
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pengajuan Anda telah dikirim.',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded'
                        }
                    });
                }
            })
        });
    </script>

    <script>
        function updateRingkasan(prodi) {
            const ringkasanSection = document.getElementById('ringkasanSection');
            const ringkasanTitle = document.getElementById('ringkasanTitle');
            const ringkasanBody = document.getElementById('ringkasanBody');

            // Clear existing rows
            ringkasanBody.innerHTML = '';

            // Get all checked checkboxes
            const checkedRuangan = document.querySelectorAll('input[name="ruangan[]"]:checked');

            if (checkedRuangan.length > 0) {
                ringkasanTitle.textContent = prodi;

                checkedRuangan.forEach(checkbox => {
                    const ruanganId = checkbox.value;
                    const ruanganNama = checkbox.nextElementSibling.textContent.trim();
                    const gedungNama = checkbox.getAttribute(
                        'data-gedung'); // Mengambil nama gedung dari atribut data

                    const row = document.createElement('tr');
                    row.className = '{{ $theme == '
                    light ' ? '
                    bg - gray - 800 ' : '
                    bg - gray - 100 ' }}';
                    row.innerHTML = `
                <td class="px-4 py-2 border-r border-gray-600">${prodi}</td>
                <td class="px-4 py-2 border-r border-gray-600">${gedungNama}</td>
                <td class="px-4 py-2">${ruanganNama}</td>
            `;
                    ringkasanBody.appendChild(row);
                });
            } else {
                ringkasanBody.innerHTML =
                    '<tr><td colspan="3" class="text-gray-500">Silakan pilih ruangan untuk melihat ringkasan.</td></tr>';
            }
        }
        // Call updateRingkasan on page load if a prodi is already selected
        document.addEventListener('DOMContentLoaded', () => {
            const selectedProdi = document.getElementById('selectedProdi').value;
            if (selectedProdi) {
                updateRingkasan(selectedProdi);
            }
        });
    </script>

    <script>
        
    </script>


    <script>
       document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.show-details').forEach((button) => {
        button.addEventListener('click', () => {
            // Ambil data dari atribut tombol
            const ruanganDetails = JSON.parse(button.getAttribute('data-ruangan'));
            const namaProdi = button.getAttribute('data-nama');
            const totalRuangan = button.getAttribute('data-total-ruangan');

            // Susun detail ruangan dalam format tabel HTML
            const ruanganHtml = ruanganDetails.map((ruangan) => {
                return `
                    <tr id="ruangan-${ruangan.id}">
                        <td class="px-4 py-2 border-b">${ruangan.nama}</td>
                        <td class="px-4 py-2 border-b">${ruangan.kapasitas}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <button class="bg-red-500 text-white px-2 py-1 rounded delete-ruangan" data-id="${ruangan.id}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            // Tampilkan pop-up dengan SweetAlert dan tabel
            Swal.fire({
                title: `<strong>Detail Ruangan - ${namaProdi}</strong>`,
                html: `
                    <div>
                        <p>Total Ruangan: ${totalRuangan}</p>
                        <table class="min-w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">Nama Ruangan</th>
                                    <th class="px-4 py-2 border-b">Kapasitas</th>
                                    <th class="px-4 py-2 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${ruanganHtml}
                            </tbody>
                        </table>
                    </div>
                `,
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#3085d6',
                didRender: () => {
                    // Tambahkan event listener untuk tombol "Hapus"
                    document.querySelectorAll('.delete-ruangan').forEach((deleteButton) => {
                        deleteButton.addEventListener('click', () => {
                            const ruanganId = deleteButton.getAttribute('data-id');

                            // Kirim permintaan hapus ke server untuk menghapus dari ruangan_prodi
                            fetch(`/ruangan/${ruanganId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                },
                            })
                                .then((response) => response.json())
                                .then((data) => {
                                    if (data.success) {
                                        // Hapus elemen baris dari tabel di pop-up
                                        document.getElementById(`ruangan-${ruanganId}`).remove();
                                        Swal.fire('Berhasil!', 'Ruangan berhasil dihapus dari Prodi.', 'success');
                                    } else {
                                        Swal.fire('Gagal!', 'Ruangan tidak dapat dihapus.', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus ruangan.', 'error');
                                });
                        });
                    });
                },
                customClass: {
                    popup: 'swal-popup-custom',
                },
            });
        });
    });
});


    </script>


</body>

</html>