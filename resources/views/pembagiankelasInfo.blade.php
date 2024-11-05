<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembagian Kelas Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" />
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
                    <input type="hidden" id="selectedProdi" name="prodi" value="">
                    <button id="dropdownDepartemenButton" class="w-[280px] text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:border-gray-600 focus:border-gray-600 transition duration-100 ease-in-out flex justify-between items-center">
                        <span id="selectedDepartemen">Departemen XX</span>
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
                <a class="text-white mb-5 mt-5 text-sm">Status Pengajuan : Not Set / Belum Diajukan</a>
            </div>   

                        <!-- Table Gedung dan Ruangan -->
                        <div class="px-8 pt-2 mt-10 mb-5 rounded-tl-lg">
                            <h2 class="text-center text-lg font-semibold mb-5">Gedung dan Ruangan</h2>
                            <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                                <thead>
                                    <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                        @foreach($gedung as $index => $gedungs)
                                            <th class="px-4 py-2 w-1/{{ count($gedung) }} 
                                                {{ $index !== count($gedung) - 1 ? 'border-r border-white' : '' }}
                                                {{ $index === 0 ? 'rounded-tl-lg' : '' }}
                                                {{ $index === count($gedung) - 1 ? 'rounded-tr-lg' : '' }}">
                                                {{ $gedungs->nama }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr style="background-color: #23252A;">
                                        @foreach($gedung as $index => $gedungs)
                                            <td class="{{ $index !== count($gedung) - 1 ? 'border-r border-white' : '' }}">
                                                <div class="flex flex-col items-center">
                                                    @foreach($ruangan[$gedungs->id] ?? [] as $ruang)
                                                        <div class="flex items-center mb-2"> 
                                                            <input id="checkbox-{{ $ruang->id }}" name="ruangan[]" value="{{ $ruang->id }}" type="checkbox" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                                            <label for="checkbox-{{ $ruang->id }}" class="ms-2 mt-1 mb-1 text-m font-semibold text-white ">{{ $ruang->nama }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="px-8 mt-5 flex justify-end">
                            <button type="submit" class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] text-white">
                                <strong>Simpan</strong>
                            </button>
                        </div>
                    </form>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                <!-- Ringkasan table departemen -->
                <div class="px-8 pt-2 mt-10 mb-5 rounded-tl-lg">
                    <h2 class="text-center text-lg font-semibold mb-5">Ringkasan Departemen XX</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Departemen</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Gedung</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                        <p>E</p>
                                </td>                                
                                <td class="px-4 py-2 border-white">E101</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-8 mt-5 flex justify-end">
                    <div class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32]">
                        <a href="#" class="text-center block text-white"><strong>Ajukan</strong></a>
                    </div>
                </div>
        </div>
    </div>

    <script>
        const dropdownDepartemenButton = document.getElementById('dropdownDepartemenButton');
        const dropdownDepartemen = document.getElementById('dropdownDepartemen');
        const selectedDepartemenText = document.getElementById('selectedDepartemen');
    
        //const dropdownGedungButton = document.getElementById('dropdownGedungButton');
        // const dropdownGedung = document.getElementById('dropdownGedung');
        // const selectedGedungText = document.getElementById('selectedGedung');
    
        const checkboxContainerA = document.getElementById('checkboxContainerA');
        const checkboxContainerB = document.getElementById('checkboxContainerB');
        const checkboxContainerC = document.getElementById('checkboxContainerC');
    
        // Toggle dropdown visibility for departments
        dropdownDepartemenButton.addEventListener('click', function(event) {
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
                });
            });
        // // Toggle dropdown visibility for buildings
        // dropdownGedungButton.addEventListener('click', function(event) {
        //     event.stopPropagation();  
        //     dropdownGedung.classList.toggle('hidden');
        // });
    
        // Handle clicks on building choices
        // dropdownGedung.querySelectorAll('a').forEach(function(item) {
        //     item.addEventListener('click', function(event) {
        //         event.preventDefault();
        //         const selectedGedung = this.getAttribute('data-gedung');
        //         selectedGedungText.textContent = selectedGedung;
        //         dropdownGedung.classList.add('hidden');  
    
        //         // Hide all checkboxes first
        //         checkboxContainerA.classList.add('hidden');
        //         checkboxContainerB.classList.add('hidden');
        //         checkboxContainerC.classList.add('hidden');
    
        //         // Show checkboxes based on selected building
        //         if (selectedGedung === "Gedung A") {
        //             checkboxContainerA.classList.remove('hidden');
        //         } else if (selectedGedung === "Gedung B") {
        //             checkboxContainerB.classList.remove('hidden');
        //         } else if (selectedGedung === "Gedung C") {
        //             checkboxContainerC.classList.remove('hidden');
        //         }
        //     });
        // });
    
        // Close dropdowns if click outside
        // window.addEventListener('click', function(event) {
        //     if (!dropdownDepartemenButton.contains(event.target) && !dropdownDepartemen.contains(event.target)) {
        //         dropdownDepartemen.classList.add('hidden');
        //     }
        //     if (!dropdownGedungButton.contains(event.target) && !dropdownGedung.contains(event.target)) {
        //         dropdownGedung.classList.add('hidden');
        //     }
        // });

        
        </script>

        <script>
            const gedungButtons = document.querySelectorAll('[id^="dropdownGedungButton"]');
            const checkboxContainers = document.querySelectorAll('[id^="checkboxContainer"]');

            gedungButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.stopPropagation();
                    const gedung = this.getAttribute('data-gedung');
                    const targetContainer = document.getElementById(`checkboxContainer${gedung}`);
                    
                    checkboxContainers.forEach(container => container.classList.add('hidden'));
                    if (targetContainer) {
                        targetContainer.classList.remove('hidden');
                    }
                });
            });

            // Tangani submit form
            document.getElementById('ruanganForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validasi: pastikan prodi dipilih
                if (!document.getElementById('selectedProdi').value) {
                    alert('Silakan pilih Departemen terlebih dahulu.');
                    return;
                }

                // Kirim form
                this.submit();
            });
        </script>
</body>

</html>