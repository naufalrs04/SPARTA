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
                <!-- dropdown gedung -->
                <div class="flex justify-center mt-3 mb-3">
                    <div class="max-w-xl relative">
                        <select id="gedungSelect" class="w-[280px] text-gray-400 p-4 pr-10 pl-4 focus:ring-2 focus:ring-gray-800 rounded-lg bg-[#2A2C33] cursor-pointer border border-transparent hover:border-gray-600 focus:border-gray-600 transition duration-100 ease-in-out appearance-none" onchange="showCheckboxes()">
                            <option value="" class="text-white">Pilih Gedung</option>
                            <option value="gedung1" class="text-white">Gedung A</option>
                            <option value="gedung2" class="text-white">Gedung B</option>
                            <option value="gedung3" class="text-white">Gedung C</option>
                            <option value="gedung4" class="text-white">Gedung D</option>
                            <option value="gedung5" class="text-white">Gedung E</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </div>
                </div>                                                                        
                
                <!-- Checkbox kelas -->
                <table id="checkboxContainer" class="hidden mt-5 mb-5 ml-5 flex justify-center">
                    <tr>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-1" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-1" class="ml-2 text-xl text-white font-bold">E101</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-2" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-2" class="ml-2 text-xl text-white font-bold">E102</label>
                            </div>
                        </td>
                        <td class="pr-6">
                            <div class="flex items-center">
                                <input id="checkbox-3" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-3" class="ml-2 text-xl text-white font-bold">E103</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pr-6 pt-5">
                            <div class="flex items-center">
                                <input id="checkbox-4" type="checkbox" class="h-5 w-5 border-gray-300 rounded bg-black cursor-pointer" />
                                <label for="checkbox-4" class="ml-2 text-xl text-white font-bold">E104</label>
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
    function showCheckboxes() {
        const selectElement = document.getElementById("gedungSelect");
        const checkboxContainer = document.getElementById("checkboxContainer");
        
        if (selectElement.value) {
            checkboxContainer.classList.remove("hidden");
        } else {
            checkboxContainer.classList.add("hidden");
        }
    }
    </script>
</body>

</html>