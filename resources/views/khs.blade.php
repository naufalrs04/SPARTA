<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS Mahasiswa</title>
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
                    <div id="khsMahasiswa" class="w-1/2 rounded-full bg-yellow-500 px-4 py-1 border-[#17181C] cursor-pointer flex justify-center items-center transition ease-in-out duration-300" onclick="switchKHS('khsMahasiswa')">
                        <h2 class="text-md font-bold">KHS Mahasiswa</h2>
                    </div>
                    <div id="transkripMahasiswa" class="w-1/2 rounded-full flex justify-center items-center px-4 py-1 cursor-pointer transition ease-in-out duration-300" onclick="switchKHS('transkripMahasiswa')">
                        <h2 class="text-md font-bold">Transkrip Mahasiswa</h2>
                    </div>
                </div>
            </div>

            <div id="contentkhsMahasiswa">
                <div class="px-4 sm:px-6 md:px-8 pt-5 pb-10">
                    <h2 class="text-center text-lg font-semibold mb-4">KHS Mahasiswa</h2>
                    <div class="w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2">
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contenttranskripMahasiswa" class="hidden">
                <div class="px-4 sm:px-6 md:px-8 pt-5 pb-10">
                    <div class="flex items-center justify-center">
                        <div class="w-full max-w-xl text-center">
                            <h2 class="text-lg font-bold mb-2">Transkrip Mahasiswa</h2>
                            <div class="flex justify-center">
                                <div class="border-2 border-yellow-700 w-1/3 rounded-l-lg">
                                    <h2>Lengkap</h2>
                                </div>
                                <div class="border-2 border-yellow-700 w-1/3">
                                    <h2>Terbaik</h2>
                                </div>
                                <div class="border-2 border-yellow-700 w-1/3 rounded-r-lg">
                                    <h2>Transkrip Akademik</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 w-full bg-[#1E1F24] opacity-65 rounded-lg border-[#49454F] border-opacity-50 border-2">
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-[95%] md:w-[90%] sm:w-[85%] m-4 md:m-6 bg-[#757575] rounded-lg">
                            <div class="w-full md:w-3/4 px-4 py-3">
                                <h2 class="font-bold text-md sm:text-lg">Semester 1 | Tahun Ajaran 2022/2023 Ganjil</h2>
                                <p class="text-md sm:text-lg">Jumlah SKS 21</p>
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