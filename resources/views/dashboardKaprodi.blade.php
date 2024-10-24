<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <style>
        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .welcome-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 0.5rem;
            color: white;
            border-right: 2px solid white;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }

        .welcome-message-static {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
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
            <div class="pl-8 pt-5 flex justify-left items-center">
                <p class="welcome-message-static">Welcome Back, </p>
                <span class="welcome-message" id="typewriter"></span>
                <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
            </div>

            <div class="bg-gray-800 px-8 pt-5 flex justify-center items-center" style="background-color: #17181C;">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Box Status Akademik -->
                    <div class="col-span-8 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Akademik</h2>

                        <!-- Box Utama Status Akademik -->
                        <div class="grid grid-cols-12 w-full rounded-lg flex-grow" style="background-color: #2A2C33;">
                            <div class="col-span-8 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B"><strong>Nama :</strong></p>
                                    <p>Luthfan Lazuardi, S.Kom, M.Cs</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>NIP :</strong></p>
                                    <p class="mb-1">10101010101010</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>Status:</strong></p>
                                    <p>Dosen</p>
                                </div>
                            </div>
                            <div class="col-span-12 text-white text-center rounded-md mx-5 mb-5 flex justify-center items-center" style="background-color: #34803C;">
                                <p><strong>AKTIF</strong></p>
                            </div>

                        </div>
                    </div>

                    <!-- Box Capaian Akademik -->
                    <div class="col-span-4 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center text-lg font-semibold mb-4">Status Penjadwalan</h2>

                        <!-- Box Utama Capaian Akademik -->
                        <div class="p-6 rounded-tl-lg rounded-tr-lg text-lg space-y-4 flex-grow flex flex-col items-center justify-center" style="background-color: #2A2C33">
                            <div class="text-center w-full mb-3">
                                <p style="color: #F0B90B">Mata Kuliah</p>
                                <p style="color:#ffff"><strong>2024/2025 Ganjil</strong></p>
                            </div>

                            <div class="text-center w-full">
                                <p class="text-white"><strong>Mata Kuliah Diajukan</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #880000">
                                    <p class="font-semibold text-3xl text-gray-50">34</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="background-color: #2A2C33;">
                            <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="background-color: #FFFFFF;">
                            </div>
                        </div>
                        <div class="p-7 rounded-bl-lg rounded-br-lg text-lg text-center space-y-4" style="background-color: #2A2C33;">
                            <p class="text-gray-300"><strong>Mata Kuliah Belum Diajukan</strong></p>
                            <div class="text-white text-center py-2 mx-5 rounded-lg mt-2" style="background-color: #C68E00;">
                                <p class="font-semibold text-3xl text-gray-50">42</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 px-8 py-10 flex justify-center items-center" style="background-color: #17181C;">
                <div class="grid grid-cols-12 w-full">
                    <div class="col-span-12 bg-gray-700 rounded-lg shadow-lg flex flex-col" style="background-color: #17181C;">
                        <h2 class="text-center items-center justify-center text-lg font-semibold mb-4 ">Status Pengajuan Jadwal Kuliah</h2>

                        {{-- box pengajuan jadwal --}}
                        <div class="grid grid-cols-12 w-full gap-7 p-3 rounded-lg flex-grow" style="background-color: #2A2C33;">
                            <div class="col-span-8 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>Pengajuan dilakukan oleh :</strong></p>
                                    <p style="font-size: 20px;">Dr. Kusworo Adi, S.Kom, M.Cs</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>jurusan :</strong></p>
                                    <p class="mb-1">INFORMATIKA</p>
                                </div>
                            </div>
                            <div class="justify-end col-span-4 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>Jumlah MataKuliah :</strong></p>
                                    <p style="font-size: 20px;">60 MataKuliah</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B; font-size: 20px;"><strong>Jumlah Jadwal :</strong></p>
                                    <p class="mb-1">190</p>
                                </div>
                            </div>
                            
                            <div class="col-span-12 text-white flex items-center justify-center p-4 rounded-md mx-5 mb-5" style="background-color: #34803C">
                                <p><strong>TERVERIFIKASI</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const messages = ["{{ $user['nama'] }} !" ]; // Pesan yang ingin ditampilkan
            let messageIndex = 0;
            let charIndex = 0;
            const typingSpeed = 100; 
            const erasingSpeed = 50; 
            const delayBetweenMessages = 2000; 
            const typewriterElement = document.getElementById("typewriter");

            function typeMessage() {
                if (charIndex < messages[messageIndex].length) {
                    typewriterElement.textContent += messages[messageIndex].charAt(charIndex);
                    charIndex++;
                    setTimeout(typeMessage, typingSpeed);
                } else {
                    setTimeout(eraseMessage, delayBetweenMessages);
                }
            }

            function eraseMessage() {
                if (charIndex > 0) {
                    typewriterElement.textContent = messages[messageIndex].substring(0, charIndex - 1);
                    charIndex--;
                    setTimeout(eraseMessage, erasingSpeed);
                } else {
                    messageIndex = (messageIndex + 1) % messages.length; // Loop pesan
                    setTimeout(typeMessage, typingSpeed);
                }
            }

            // Mulai mengetik pesan
            setTimeout(typeMessage, typingSpeed);
        });
    </script>
</body>

</html>