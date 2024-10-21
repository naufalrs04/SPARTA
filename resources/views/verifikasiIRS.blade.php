<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <div id="pengisianIRS" class="w-1/2 rounded-full bg-yellow-500 px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchIRS('belumVerifikasi')">
                        <h2 class="text-md font-bold">Belum Terverifikasi</h2>
                    </div>
                    <div id="irsMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchIRS('sudahVerifikasi')">
                        <h2 class="text-md font-bold">Sudah Terverifikasi</h2>
                    </div>
                </div>
            </div>

            <div class="px-8 pt-5">
                <h2 class="text-center text-lg font-semibold mb-4">Verifikasi IRS</h2>
                <!-- Input cari mahasiswa -->
                <div class="bg-[#23252A]  flex flex-grow rounded-lg hover:bg-[#3A3B40] cursor-pointer relative">
                    <div class="w-full h-10 flex items-center relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <!-- Input Pencarian -->
                        <input type="search" class="bg-transparent text-[#94959A] ml-10 pl-5 w-full h-full border-none outline-none font-semibold" placeholder="Cari Mahasiswa">
                    </div>
                </div>
            </div>
            
            <div id="contentBelumVerifikasi">
                <div class="bg-[#23252A] ml-8 mr-8 mt-8 mb-8 flex flex-grow rounded-lg">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">NIM</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Nama</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">Status Pengajuan</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">1</td>
                                <td class="px-4 py-2 border-r border-white">24060122120010</td>
                                <td class="px-4 py-2 border-r border-white">Muhammad Luthfan</td>
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #880000;">
                                        <p> Terverifikasi</p>
                                    </div>
                                </td>                                
                                <td class="px-4 py-2">
                                    <a href="" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>   
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">2</td>
                                <td class="px-4 py-2 border-r border-white">24060122120011</td>
                                <td class="px-4 py-2 border-r border-white">Muhammad Fadhil</td>
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #880000;">
                                        <p> Terverifikasi</p>
                                    </div>
                                </td>                                
                                <td class="px-4 py-2">
                                    <a href="" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>   
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>            

            <div id="contentSudahVerifikasi" class="hidden">
                <div class="bg-[#23252A] ml-8 mr-8 mt-8 mb-8 flex flex-grow rounded-lg">
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/8 border-r border-white rounded-tl-lg">No</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">NIM</th>
                                <th class="px-4 py-2 w-1/3 border-r border-white">Nama</th>
                                <th class="px-4 py-2 w-1/4 border-r border-white">Status Pengajuan</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">1</td>
                                <td class="px-4 py-2 border-r border-white">24060122140110</td>
                                <td class="px-4 py-2 border-r border-white">Muhammad Rahman Haryanto</td>
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p> Terverifikasi</p>
                                    </div>
                                </td>                                
                                <td class="px-4 py-2">
                                    <a href="" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>   
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">2</td>
                                <td class="px-4 py-2 border-r border-white">24060122140111</td>
                                <td class="px-4 py-2 border-r border-white">Naufal binti</td>
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p> Terverifikasi</p>
                                    </div>
                                </td>                                
                                <td class="px-4 py-2">
                                    <a href="" class="w-1/2 flex items-center justify-end mr-2 ml-2 cursor-pointer hover:text-gray-400 transition-colors duration-200 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4z"/>
                                        </svg>
                                    </a>
                                </td>   
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <script>
                function switchIRS(selected) {
                    const pengisianIRS = document.getElementById('pengisianIRS');
                    const irsMahasiswa = document.getElementById('irsMahasiswa');
                    
                    const contentBelumVerifikasi = document.getElementById('contentBelumVerifikasi');
                    const contentSudahVerifikasi = document.getElementById('contentSudahVerifikasi');
                    
                    // Log untuk debugging
                    console.log("Switching to:", selected);
                    
                    if (selected === 'belumVerifikasi') {
                        pengisianIRS.classList.add('bg-yellow-500', 'border-[#17181C]');
                        irsMahasiswa.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        
                        contentBelumVerifikasi.classList.remove('hidden');
                        contentSudahVerifikasi.classList.add('hidden');
                    } else if (selected === 'sudahVerifikasi') {
                        irsMahasiswa.classList.add('bg-yellow-500', 'border-[#17181C]');
                        pengisianIRS.classList.remove('bg-yellow-500', 'border-[#17181C]');
                        
                        contentBelumVerifikasi.classList.add('hidden');
                        contentSudahVerifikasi.classList.remove('hidden');
                    }
                }
            </script>
        </div>
    </div>
</body>

</html>