<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        #contentkhsMahasiswa{
            min-height: 100vh;
        }
        
        #contenttranskripMahasiswa{
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
            @include('components.navbar', ['theme' => $theme])

            {{-- Main Content --}}
            <div class="px-8 pt-5 flex justify-center items-center {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="w-full rounded-full border-yellow-500 border-2 px-4 py-2 flex justify-between items-center">
                    <div id="khsMahasiswa" class="w-1/2 rounded-full bg-yellow-500 px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchKHS('khsMahasiswa')">
                        <h2 class="text-md font-bold">KHS Mahasiswa</h2>
                    </div>
                    <div id="transkripMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchKHS('transkripMahasiswa')">
                        <h2 class="text-md font-bold">Transkrip Mahasiswa</h2>
                    </div>
                </div>
            </div>

            <div id="contentkhsMahasiswa" class="min-h-screen {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="px-4 sm:px-6 md:px-8 pt-5">
                    <div class="text-center pt-5">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">KHS Mahasiswa</h2>
                    </div>
                    <div class="w-full">
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contenttranskripMahasiswa" class="hidden {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="px-4 sm:px-6 md:px-8 pt-5">
                    <div class="flex items-center justify-center">
                        <div class="w-full max-w-xl text-center">
                            <div class="text-center pt-5 ">
                                <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Transkrip Mahasiswa</h2>
                            </div>
                            <div class="flex justify-center">
                                <div class="border-2 border-yellow-700 w-1/3 rounded-l-xl">
                                    <h2>Lengkap</h2>
                                </div>
                                <div class="border-2 border-yellow-700 w-1/3">
                                    <h2>Terbaik</h2>
                                </div>
                                <div class="border-2 border-yellow-700 w-1/3 rounded-r-xl">
                                    <h2>Transkrip Akademik</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 w-full">
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 rounded-2xl {{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }} {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-md">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-sm">Jumlah SKS 21</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                // Function to switch between tabs
                function switchKHS(selected) {
                    // Elements for tabs
                    const khsMahasiswa = document.getElementById('khsMahasiswa');
                    const transkripMahasiswa = document.getElementById('transkripMahasiswa');
            
                    // Elements for content
                    const contentKHS = document.getElementById('contentkhsMahasiswa'); // Pastikan elemen ini ada di HTML
                    const contentTranskrip = document.getElementById('contenttranskripMahasiswa'); // Pastikan elemen ini ada di HTML
            
                    // Switch active tab and color
                    if (selected === 'khsMahasiswa') {
                        khsMahasiswa.classList.add('bg-yellow-500', 'border-[#17181C]');
                        transkripMahasiswa.classList.remove('bg-yellow-500', 'border-[#17181C]');
            
                        // Show KHS content and hide Transkrip content
                        contentKHS.classList.remove('hidden');
                        contentTranskrip.classList.add('hidden');
                    } else if (selected === 'transkripMahasiswa') {
                        transkripMahasiswa.classList.add('bg-yellow-500', 'border-[#17181C]');
                        khsMahasiswa.classList.remove('bg-yellow-500', 'border-[#17181C]');
            
                        // Show Transkrip content and hide KHS content
                        contentTranskrip.classList.remove('hidden');
                        contentKHS.classList.add('hidden');
                    }
                }
            </script>            
        </div>
    </div>
</body>

</html>