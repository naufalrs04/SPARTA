<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembagian Kelas Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <!-- back to pembagian kelas -->
                <div class="flex justify-start my-4 mb-6 ml-8 ">
                    <a href="/pembagiankelas" class="text-white text-left underline-offset-2 hover:text-gray-300 cursor-pointer"><< Back to Pembagian Kelas Departemen</a>
                </div>
                <div class="flex justify-center my-3 mb-3 ">
                    <a class="text-white text-center text-lg font-semibold">Departemen XX</a>
                </div>
                <div class="flex justify-center my-3 mb-3">
                    <a class="text-white mb-5 mt-5 text-sm">Status Pengajuan : Not Set / Belum Diajukan</a>
                </div>    
                
                <!-- Dropdown Gedung -->
                <div class="flex justify-center mt-3 mb-3">
                    <div class="max-w-xl relative">
                        <button id="dropdownGedungButton" class="w-[280px] text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:border-gray-600 focus:border-gray-600 transition duration-100 ease-in-out flex justify-between items-center">
                            <span id="selectedGedung">Pilih Gedung</span>
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <!-- Dropdown list -->
                        <div id="dropdownGedung" class="hidden bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow w-full absolute z-10 mt-2">
                            <ul class="py-2 text-sm" aria-labelledby="dropdownGedungButton">
                                <li><a href="#" data-gedung="Gedung A" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Gedung A</a></li>
                                <li><a href="#" data-gedung="Gedung B" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Gedung B</a></li>
                                <li><a href="#" data-gedung="Gedung C" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Gedung C</a></li>
                                <li><a href="#" data-gedung="Gedung D" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Gedung D</a></li>
                                <li><a href="#" data-gedung="Gedung E" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Gedung E</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Checkbox Gedung A -->
                <table id="checkboxContainerA" class="hidden mt-5 mb-5 ml-5 flex justify-center">
                    <tr>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-1" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-1" class="ml-2 text-xl text-white font-bold">A101</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-2" class="ml-2 text-xl text-white font-bold">A102</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-3" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-3" class="ml-2 text-xl text-white font-bold">A103</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-1" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-1" class="ml-2 text-xl text-white font-bold">A201</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-2" class="ml-2 text-xl text-white font-bold">A202</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-3" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-3" class="ml-2 text-xl text-white font-bold">A203</label>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Checkbox Gedung B -->
                <table id="checkboxContainerB" class="hidden mt-5 mb-5 ml-5 flex justify-center">
                    <tr>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-4" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-4" class="ml-2 text-xl text-white font-bold">B101</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-5" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-5" class="ml-2 text-xl text-white font-bold">B102</label>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Checkbox Gedung C -->
                <table id="checkboxContainerC" class="hidden mt-5 mb-5 ml-5 flex justify-center">
                    <tr>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-6" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-6" class="ml-2 text-xl text-white font-bold">C101</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-7" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-7" class="ml-2 text-xl text-white font-bold">C102</label>
                            </div>
                        </td>
                    </tr>
                </table>
                
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
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <p>E</p>
                                </td>                                  
                                <td class="px-4 py-2 border-white">E102</td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <p>E</p>
                                </td>                                   
                                <td class="px-4 py-2 border-white">E103</td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <p>E</p>
                                </td>                                   
                                <td class="px-4 py-2 border-white">E104</td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <p>E</p>
                                </td>                                 
                                <td class="px-4 py-2 border-white">E105</td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <p>E</p>
                                </td>                                  
                                <td class="px-4 py-2 border-white">E106</td>
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
        const dropdownGedungButton = document.getElementById('dropdownGedungButton');
        const dropdownGedung = document.getElementById('dropdownGedung');
        const selectedGedungText = document.getElementById('selectedGedung');
    
        const checkboxContainerA = document.getElementById('checkboxContainerA');
        const checkboxContainerB = document.getElementById('checkboxContainerB');
        const checkboxContainerC = document.getElementById('checkboxContainerC');
    
        // Toggle dropdown visibility
        dropdownGedungButton.addEventListener('click', function(event) {
            event.stopPropagation();  
            dropdownGedung.classList.toggle('hidden');
        });
    
        // Menangani klik pada pilihan gedung
        dropdownGedung.querySelectorAll('a').forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const selectedGedung = this.getAttribute('data-gedung');
                selectedGedungText.textContent = selectedGedung;
                dropdownGedung.classList.add('hidden');  
    
                // Sembunyikan semua checkbox terlebih dahulu
                checkboxContainerA.classList.add('hidden');
                checkboxContainerB.classList.add('hidden');
                checkboxContainerC.classList.add('hidden');
    
                // Tampilkan checkbox sesuai pilihan gedung
                if (selectedGedung === "Gedung A") {
                    checkboxContainerA.classList.remove('hidden');
                } else if (selectedGedung === "Gedung B") {
                    checkboxContainerB.classList.remove('hidden');
                } else if (selectedGedung === "Gedung C") {
                    checkboxContainerC.classList.remove('hidden');
                }
            });
        });
    
        // Tutup dropdown jika klik di luar
        window.addEventListener('click', function(event) {
            if (!dropdownGedungButton.contains(event.target) && !dropdownGedung.contains(event.target)) {
                dropdownGedung.classList.add('hidden');
            }
        });
        
    </script>
</body>

</html>