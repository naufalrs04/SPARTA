<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perwalian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        #main-content{
            min-height: 100vh;
        }
    </style>
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
            <!-- Navbar -->
            @include('components.navbar',  ['theme' => $theme])

            <!-- Main Content -->
            <div id="main-content" class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="px-8 pt-5 h-full">
                    <div class="text-center py-3">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Mahasiswa Perwalian</h2>
                    </div>
                    <div class="flex justify-between">
                        <!-- button urutkan dengan dropdown -->
                        <div class="flex flex-grow p-2 ml-8 rounded-2xl cursor-pointer relative rounded-xl cursor-pointer transition duration-100 ease-in-out flex justify-between items-center text-gray-400 {{ $theme == 'light' ? 'bg-[#2A2C33] hover:bg-zinc-800 border-transparent focus:ring-gray-800 outline outline-1 outline-zinc-900' : 'bg-gray-200 hover:bg-zinc-300 border-gray-300 focus:ring-gray-300 outline outline-1' }} shadow-[4px_6px_1px_1px_rgba(0,_0,_0,_0.8)]">
                            <form class="w-full h-10 flex rounded-2xl items-center relative ">
                                <label for="dropdown" class="sr-only">Select Option</label>
                                <select id="dropdown" class="bg-transparent text-[#94959A] pl-5 w-full h-full border-none outline-none font-semibold">
                                    <option value="Nama">Nama Mahasiswa</option>
                                    <option value="Nim">Nim Mahasiswa</option>
                                    <option value="IPK">IPK</option>
                                </select>
                            </form>
                        </div>
                        <div class="flex flex-grow p-2 ml-8 rounded-2xl cursor-pointer relative transition duration-100 ease-in-out flex justify-between items-center text-gray-400 {{ $theme == 'light' ? 'bg-[#2A2C33] hover:bg-zinc-800 border-transparent focus:ring-gray-800 outline outline-1 outline-zinc-900' : 'bg-gray-200 hover:bg-zinc-300 border-gray-300 focus:ring-gray-300 outline outline-1' }} shadow-[4px_6px_1px_1px_rgba(0,_0,_0,_0.8)]">
                            <form class="w-full h-10 flex items-center relative">
                                <label for="sortOrder" class="sr-only">Sort Order</label>
                                <select id="sortOrder" class="bg-transparent text-[#94959A] pl-5 w-full h-full border-none outline-none font-semibold">
                                    <option value="asc">Terkecil</option>
                                    <option value="desc">Terbesar</option>
                                </select>
                            </form>
                        </div>
                        <!-- Input cari mahasiswa -->
                        <div class="flex flex-grow p-2 ml-6 mr-6 rounded-2xl cursor-pointer relative">
                            <form class="w-full h-10 flex items-center relative">
                                <label for="default-search" class="sr-only text-sm font-semibold text-gray-900 dark:text-white">Search</label>
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="search" id="default-search" 
                                    class="block w-full p-4 pl-10 text-m rounded-2xl font-semibold 
                                        {{ $theme == 'light' ? 'bg-[#2A2C33] text-gray-200 border border-black hover:bg-zinc-800 hover:text-white' : 'bg-gray-200 text-gray-800 border border-black hover:bg-zinc-300 hover:text-black' }}" 
                                        style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5);" 
                                    placeholder="Cari Mahasiswa" />
                            </form>
                        </div>                                      
                    </div>

                    <!-- Table mahasiswa -->
                    <div class="px-8 pt-2 mt-5 mb-5 rounded-tl-lg">
                        <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <table class="table-auto p-5 w-full text-center rounded-lg border-collapse" name="tabel_mahasiswa">
                                <thead>
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                        <th class="px-4 py-2 w-1/8 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">No</th>
                                        <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Nama Mahasiswa</th>
                                        <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">NIM</th>
                                        <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jumlah SKS</th>
                                        <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Semester</th>
                                        <th class="px-4 py-2 w-1/8 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">IPK</th>
                                        <th class="px-4 py-2 w-1/8 ">Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswas as $mahasiswa)
                                        <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}"
                                            data-mahasiswa-id="{{ $mahasiswa->id }}">
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mahasiswa->id }}</td>
                                            <td class="px-3 py-3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                                <p>{{ $mahasiswa->user->nama }}</p>
                                            </td>
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mahasiswa->nim }}</td>
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mahasiswa->totalsks ?? 'N/A' }}</td>
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mahasiswa->semester }}</td>
                                            <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $mahasiswa->IPK }}</td>
                                            <td class="px-4 py-2">
                                                <button class="show-details"
                                                    data-nama="{{ $mahasiswa->user->nama }}"
                                                    data-nim="{{ $mahasiswa->nim }}"
                                                    data-status="{{ $mahasiswa->status }}"
                                                    data-semester="{{ $mahasiswa->semester }}"
                                                    data-prodi="{{ $mahasiswa->prodi }}"
                                                    data-IPK="{{ $mahasiswa->IPK }}"
                                                    onclick="showDetails(this)">
                                                    <div class="transition-colors duration-200 px-2 py-2 rounded-lg bg-gradient-to-l from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
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
                        title: `<strong>Detail Mahasiswa</strong>`,
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