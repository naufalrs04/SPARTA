<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perwalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <div class="px-8 pt-5">
                <h2 class="text-center text-lg font-semibold mb-4">Mahasiswa Perwalian</h2>
                <div class="flex justify-between">
                    <!-- button urutkan dengan dropdown -->
                    <div class="bg-[#23252A] flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative">
                        <form class="w-full h-10 flex items-center relative">
                            <label for="dropdown" class="sr-only">Select Option</label>
                            <select id="dropdown" class="bg-transparent text-[#94959A]  pl-5 w-full h-full border-none outline-none font-semibold">
                                <option value="Nama">Nama Mahasiswa</option>
                                <option value="Nim">Nim Mahasiswa</option>
                                <option value="IPK">IPK</option>
                            </select>
                        </form>
                    </div>
                    <div class="bg-[#23252A] flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative ml-5">
                        <form class="w-full h-10 flex items-center relative">
                            <label for="sortOrder" class="sr-only">Sort Order</label>
                            <select id="sortOrder" class="bg-transparent text-[#94959A] pl-5 w-full h-full border-none outline-none font-semibold">
                                <option value="asc">Terkecil</option>
                                <option value="desc">Terbesar</option>
                            </select>
                        </form>
                    </div>
                    <!-- Input cari mahasiswa -->
                    <div class="bg-[#23252A] ml-5 flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative">
                        <form class="w-full h-10 flex items-center relative">
                            <label for="default-search" class="sr-only">Search</label>
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="search" id="default-search" 
                                class="bg-transparent text-[#94959A] ml-10 pl-5 w-full h-full border-none outline-none font-semibold 
                                {{ $theme == 'light' ? 'text-gray-200' : 'text-gray-800' }}" 
                                style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5);" 
                                placeholder="Cari Mahasiswa" />
                        </form>
                    </div>                                      
                </div>
            </div>

            <!-- Table mahasiswa -->
            
            <div class="px-8 pt-2 mt-5 mb-5 rounded-tl-lg">
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" name="tabel_mahasiswa">
                    <thead>
                        <tr style="background-color: rgba(135, 138, 145, 0.37);">
                            <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Nama Mahasiswa</th>
                            <th class="px-4 py-2 w-1/4 border-r border-white">NIM</th>
                            <th class="px-4 py-2 w-1/4 border-r border-white">Jumlah SKS</th>
                            <th class="px-4 py-2 w-1/4 border-r border-white">Semester</th>
                            <th class="px-4 py-2 w-1/8 border-r border-white">IPK</th>
                            <th class="px-4 py-2 w-1/8 ">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr style="background-color: #23252A;{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}"
                                data-mahasiswa-id="{{ $mahasiswa->id }}">
                                <td class="px-4 py-2 border-r border-white">{{ $mahasiswa->id }}</td>
                                <td class="px-3 py-3 border-r border-white">
                                    <p>{{ $mahasiswa->user->nama }}</p>
                                </td>
                                <td class="px-4 py-2 border-r border-white">{{ $mahasiswa->nim }}</td>
                                <td class="px-4 py-2 border-r border-white">{{ $mahasiswa->totalsks ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border-r border-white">{{ $mahasiswa->semester }}</td>
                                <td class="px-4 py-2 border-r border-white">{{ $mahasiswa->IPK }}</td>
                                <td class="px-4 py-2">
                                    <button class="show-details"
                                        data-nama="{{ $mahasiswa->user->nama }}"
                                        data-nim="{{ $mahasiswa->nim }}"
                                        data-status="{{ $mahasiswa->status }}"
                                        data-semester="{{ $mahasiswa->semester }}"
                                        data-prodi="{{ $mahasiswa->prodi }}"
                                        data-IPK="{{ $mahasiswa->IPK }}"
                                        onclick="showDetails(this)">
                                        <div class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                            </svg>
                                        </div>
                                    </button>                                                                      
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('dropdown').addEventListener('change', function() {
            const selectedOption = this.value.toLowerCase();
            const sortOrder = document.getElementById('sortOrder').value; // Get the selected sort order
            const rows = Array.from(document.querySelectorAll('table[name="tabel_mahasiswa"] tbody tr')); // Convert NodeList to Array

            // Sort rows based on the selected order (ascending or descending)
            rows.sort((a, b) => {
                const colA = a.querySelector(`td:nth-child(${getColumnIndex(selectedOption)})`).innerText.toLowerCase();
                const colB = b.querySelector(`td:nth-child(${getColumnIndex(selectedOption)})`).innerText.toLowerCase();

                if (selectedOption === 'nama' || selectedOption === 'nim') {
                    return (sortOrder === 'asc' ? colA.localeCompare(colB) : colB.localeCompare(colA));
                } else if (selectedOption === 'ipk') {
                    const ipkA = parseFloat(colA) || 0;
                    const ipkB = parseFloat(colB) || 0;
                    return (sortOrder === 'asc' ? ipkA - ipkB : ipkB - ipkA);
                }
            });

            // Re-append the sorted rows back to the table body
            const tbody = document.querySelector('table[name="tabel_mahasiswa"] tbody');
            tbody.innerHTML = ''; // Clear existing rows
            rows.forEach(row => tbody.appendChild(row)); // Append sorted rows
        });

        // Helper function to get the correct column index based on selected option
        function getColumnIndex(option) {
            switch (option) {
                case 'nama': return 2; // 2nd column is Nama
                case 'nim': return 3;  // 3rd column is NIM
                case 'ipk': return 6;  // 6th column is IPK
                default: return 1; // Default to 1st column
            }
        }

        document.getElementById('default-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('table[name="tabel_mahasiswa"] tbody tr');

            rows.forEach(row => {
                const nama = row.querySelector('td:nth-child(2)').innerText.toLowerCase(); // 2nd column is Nama
                const nim = row.querySelector('td:nth-child(3)').innerText.toLowerCase(); // 3rd column is NIM

                if (nama.includes(searchTerm) || nim.includes(searchTerm)) {
                    row.style.display = ''; // Show the row if it matches
                } else {
                    row.style.display = 'none'; // Hide the row if it doesn't match
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const mahasiswaDetails = @json($mahasiswas);

            document.querySelectorAll('.show-details').forEach((button) => {
                button.addEventListener('click', () => {
                const details = {
                    nama: button.getAttribute('data-nama'),
                    nim: button.getAttribute('data-nim'),
                    status: button.getAttribute('data-status'),
                    semester: button.getAttribute('data-semester'),
                    prodi: button.getAttribute('data-prodi'),
                    IPK: button.getAttribute('data-IPK'),
                };

                    Swal.fire({
                        title: `<strong>Detail Mata Kuliah</strong>`,
                        html: `
                                        <div class="text-left space-y-4">
                                            <div>
                                                <h2 class="font-bold mb-1">Nama Mahasiswa :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.nama} </h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">NIM :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.nim}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Status :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.status}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Semester :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.semester}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">Program Studi :</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.prodi}</h2>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class="font-bold mb-1">IPK:</h2>
                                                <div class="w-full h-10 bg-gray-300 rounded-xl flex items-center">
                                                    <h2 class="ml-5 text-black font-bold">${details.IPK}</h2>
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

</body>
</html>
