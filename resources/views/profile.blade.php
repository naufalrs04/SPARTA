<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class=" text-white font-sans" style="background-color: #17181C;">
    <!-- Navbar -->
    <div class="p-4" style="background-color: #1E1F24;">
        <div class="container mx-auto flex justify-end items-center">
            <div class="flex items-center">
                <img alt="SPARTA logo" class="w-10 h-10 mr-2 object-contain" src="{{ asset('assets/Logo.png') }}" />
            </div>
        </div>
    </div>


    <!-- Main Content -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl">
            <div class="flex items-center mb-4">
                <a class="text-gray-400 hover:text-gray-200 flex items-center" href="#" onclick="window.history.back(); return false;">
                    <i class="fas fa-chevron-left mr-2"></i> <span class="underline">Dashboard</span>
                </a>
            </div>
            <div class="rounded-lg p-6 relative" style="background-color: #2A2C33;">
                <div class="absolute -top-20 left-1/2 transform -translate-x-1/2">
                    <div class="relative">
                        <img alt="Profile picture of a person wearing VR goggles" class="rounded-full w-32 h-32 border-8 " style="border-color: #2A2C33;" src="https://storage.googleapis.com/a1aa/image/YEd9ItSNlU43Hlb4SIu5YqoDGeK1RjD03vVcHWNvZkmgZfoTA.jpg"/>
                    </div>
                    <div class="text-center mt-2">
                        <h2 class="text-xl font-bold">2024/2025 Ganjil</h2>
                        <p class="text-green-500">Aktif</p>
                    </div>
                </div>
                <div class="absolute top-4 right-4">
                    <a class="text-gray-400 hover:text-gray-200" href="#">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-28">
                    <div class=" p-4 rounded-lg"  style="background-color: rgba(59, 62, 71, 0.4);">
                        <p><span class="font-bold">NIM:</span> 24060122120016</p>
                        <p><span class="font-bold">Nama:</span> Muhamad Gunawan</p>
                        <p><span class="font-bold">Fakultas:</span> Sains dan Matematika</p>
                        <p><span class="font-bold">Prodi:</span> Informatika S1</p>
                        <p><span class="font-bold">Angkatan:</span> 2022</p>
                        <p><span class="font-bold">Tempat Lahir:</span> Tangerang</p>
                        <p><span class="font-bold">Tanggal Lahir:</span> 31 Januari 2005</p>
                        <p><span class="font-bold">NIK:</span> 3671093101050002</p>
                        <p><span class="font-bold">Nama Ibu:</span> ****</p>
                    </div>
                    <div class=" p-4 rounded-lg"  style="background-color: rgba(59, 62, 71, 0.4);">
                        <p><span class="font-bold">Nomor Hp:</span> 085959913761</p>
                        <p><span class="font-bold">Email SSO:</span> igunawan24@students.undip.ac.id</p>
                        <p><span class="font-bold">Email Pribadi:</span> igunawan24@gmail.com</p>
                        <p><span class="font-bold">Alamat Asal:</span> Jl. Kenanga Raya Blok D1 No.1<br/>Kelurahan Uwung Jaya<br/>RT 005 RW 008<br/>Kelurahan Uwung Jaya</p>
                        <p><span class="font-bold">Alamat Sekarang:</span> Jl. Gondang Barat III No.70</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <button class="bg-gradient-to-r from-orange-500 to-red-500  hover:from-orange-600 hover:to-red-600 text-white font-bold py-2 px-8 rounded-lg">Save</button>
            </div>
        </div>
    </div>
</body>
</html>

