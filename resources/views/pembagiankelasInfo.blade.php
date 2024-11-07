<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembagian Kelas Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        input[type="checkbox"] {
            accent-color: black; 
        }
        input[type="checkbox"]:checked {
            accent-color: #C68E00; 
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
            <div class="flex justify-center mt-3 pb-1 p-5">
                <div class="max-w-xl relative">
                    <!-- Dropdown Departemen -->
                    <form id="ruanganForm" method="POST" action="{{ route('simpan.ruangan') }}">
                                @csrf
                                <h2 class="text-center text-lg font-semibold mb-5">Pilih Departemen</h2>
                                <input type="hidden" id="selectedProdi" name="prodi" value="">
                                <button id="dropdownDepartemenButton" class="w-[280px] text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:border-gray-600 focus:border-gray-600 transition duration-100 ease-in-out flex justify-between items-center">
                                    <span id="selectedDepartemen">Pilih Departemen </span>
                                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <!-- Dropdown list -->
                                <div id="dropdownDepartemen" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2">
                                    <ul class="py-2 text-sm" aria-labelledby="dropdownDepartemenButton">
                                        @foreach($prodi as $jurusan)
                                            <li>
                                                <span 
                                                    data-departemen="{{ $jurusan->nama }}" 
                                                    class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
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
                        <div class="mb-6 mx-3 ">
                            <h2 class="text-center text-lg font-semibold mb-5">Gedung dan Ruangan</h2>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full text-center rounded-lg">
                                    <thead>
                                        <tr class="bg-gray-700">
                                            @foreach ($gedung as $index => $g)
                                                <th class="px-4 py-2 border-r border-gray-600 {{ $index === 0 ? 'rounded-tl-lg' : '' }} {{ $index === count($gedung) - 1 ? 'rounded-tr-lg' : '' }}">
                                                    {{ $g->nama }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($gedung as $g)
                                                <td class="border-r border-gray-600 p-2">
                                                    <div class="flex flex-col items-center">
                                                        @foreach ($ruangan[$g->id] ?? [] as $r)
                                                            <div class="flex items-center mb-2">
                                                                <input id="checkbox-{{ $r->id }}" name="ruangan[]"
                                                                    value="{{ $r->id }}" type="checkbox"
                                                                    class="mr-2 h-5 w-5 rounded cursor-pointer"
                                                                    data-gedung="{{ $g->nama }}"> <!-- Tambahkan ini -->
                                                                <label for="checkbox-{{ $r->id }}"
                                                                    class="text-sm">{{ $r->nama }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-center my-3 mb-3">
                                <input type="number" name="kapasitas" placeholder="Masukkan kapasitas" class="border rounded p-2 text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:border-gray-600 focus:border-gray-600 transition duration-100 ease-in-out flex justify-between items-center" />
                            </div>
                        </div>
                        <div class="px-8 mt-5 flex justify-end">
                            <button type="submit" class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] text-white">
                                <strong>Simpan</strong>
                            </button>
                        </div>
                    </form>
                    
                    <div class="mb-6 mx-3" id="ringkasanSection">
                        <h2 class="text-center text-lg font-semibold mb-5">Ringkasan <span id="ringkasanTitle"></span></h2>
                        <div class="overflow-x-auto">
                            <table class="w-full text-center rounded-lg">
                                <thead>
                                    <tr class="bg-gray-700">
                                        <th class="px-4 py-2 border-r border-gray-600 rounded-tl-lg">Departemen</th>
                                        <th class="px-4 py-2 border-r border-gray-600">Gedung</th>
                                        <th class="px-4 py-2 rounded-tr-lg">Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody id="ringkasanBody">
                                    <tr>
                                        <td colspan="3" class="text-gray-500">Silakan pilih ruangan untuk melihat ringkasan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        
                    <div class="px-8 mt-5 flex justify-end">
                        <button type="button" id="ajukanButton" class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] text-white">
                            <strong>Ajukan</strong>
                        </button>
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

// Handle form submission
// Handle form submission
document.getElementById('ruanganForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate: ensure a department is selected
    if (!document.getElementById('selectedProdi').value) {
        Swal.fire({
            title: 'Error!',
            text: 'Silakan pilih Departemen terlebih dahulu.',
            icon: 'error',
            confirmButtonText: 'OK'
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
            confirmButtonText: 'OK'
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
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
@endif

// Show SweetAlert on error
@if(session('error'))
    Swal.fire({
        title: 'Error!',
        text: '{{ session('error') }}',
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
                    // Here you can add the logic to submit the application
                    Swal.fire(
                        'Berhasil!',
                        'Pengajuan Anda telah dikirim.',
                        'success'
                    )
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
            const gedungNama = checkbox.getAttribute('data-gedung'); // Mengambil nama gedung dari atribut data

            const row = document.createElement('tr');
            row.className = 'bg-gray-800';
            row.innerHTML = `
                <td class="px-4 py-2 border-r border-gray-600">${prodi}</td>
                <td class="px-4 py-2 border-r border-gray-600">${gedungNama}</td>
                <td class="px-4 py-2">${ruanganNama}</td>
            `;
            ringkasanBody.appendChild(row);
        });
    } else {
        ringkasanBody.innerHTML = '<tr><td colspan="3" class="text-gray-500">Silakan pilih ruangan untuk melihat ringkasan.</td></tr>';
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
</body>
</html>