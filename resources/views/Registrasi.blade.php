<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('assets/sidebar')
        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">

            <!-- Navbar Atas-->
            @include('assets/header', ['data' => $data])

            <!-- Main Content -->
            <h2 class="text-xl text-center font-semibold">Her Registrasi</h2>
            <br>
            <div class="bg-gray-800  flex justify-center items-center max-h-full" style="background-color: #17181C;">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 w-full h-full  ">
                    <div class="bg-gray-700 rounded-lg shadow-lg flex flex-col h-full" style="background-color: #17181C;">
                        <!-- Box Status Akademik Aktif -->
                        <div class="grid grid-cols-1 rounded-lg flex-grow h-full" style="background-color: #2A2C33;">
                            <div class="p-8 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                <div>
                                    <img class="mb-10 h-24 w-auto mx-auto" src="{{ asset('assets/aktif.png') }}" alt="aktif">
                                </div>
                                <div>
                                    <p class="text-center font-semibold text-white">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi Isian Rencana Studi (IRS).</p>
                                </div>
                            </div>
                            <div class="text-white text-center py-4 rounded-md mx-5 mb-5" style="background-color: #486AAD">
                                <button><strong>AKTIF</strong></button>
                            </div>
                        </div>
                    </div>
            
                    <div class="bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <!-- Box Status Akademik Cuti -->
                        <div class="grid grid-cols-1 rounded-lg flex-grow h-full" style="background-color: #2A2C33;">
                            <div class="p-8 rounded-tl-lg rounded-bl-lg text-lg space-y-6 box-border border-black">
                                <div>
                                    <img class="mb-10 h-24 w-auto mx-auto" src="{{ asset('assets/cuti.png') }}" alt="cuti">
                                </div>
                                <div>
                                    <p class="text-center font-semibold text-white">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status sebagai mahasiswa Aktif.</p>
                                </div>
                            </div>
                            <div class="text-white text-center py-4 rounded-md mx-5 mb-5" style="background-color: #C55959">
                                <p ><strong>CUTI</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            

            
            
        </div>
    </div>
</body>

</html>