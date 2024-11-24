<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMJTVF1a1wMA2gO/YHbx+fyfJhN/0Q5ntv7zYY" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        :root {
            --color-text-light: #000;
            --color-border-light: #333;
            --color-text-dark: #fff;
            --color-border-dark: #fff;
        }
    
        /* Light Theme */
        .light-theme .welcome-message, 
        .light-theme .welcome-message-static {
            color: var(--color-text-light);
            border-right: 2px solid var(--color-border-light);
        }
    
        /* Dark Theme */
        .dark-theme .welcome-message, 
        .dark-theme .welcome-message-static {
            color: var(--color-text-dark);
            border-right: 2px solid var(--color-border-dark);
        }
    
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
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }
    
        .welcome-message-static {
            font-size: 1.5rem;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            width: fit-content;
        }

        #main-content{
            min-height: 100vh;
        }
    </style>
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-800' }}">
    <div class="flex min-h-screen backdrop-blur-sm" style="{{ $theme == 'light' ? 'background-color: #17181C; ' : 'background-color: #eeeeee; ' }}">
        <!-- Efek latar belakang -->
        <div class="absolute inset-0 z-[-1]">
            <div class="absolute inset-0 flex justify-center">
                <div class="bg-shape1 bg-teal opacity-50 bg-blur "></div>
                <div class="bg-shape2 bg-primary opacity-50 bg-blur "></div>
                <div class="bg-shape1 bg-purple opacity-50 bg-blur "></div>
            </div>
        </div> 

        <!-- Sidebar -->
        @include('components.sidebar_pa', ['theme' => $theme])

        <!-- Content -->
        <div class="flex-grow">

            <!-- Navbar -->
            @include('components.navbar', ['theme' => $theme])

            <div id="main-content" class="{{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="h-full">
                    <div class="pl-8 pt-5 flex justify-left items-center">
                        <p class="welcome-message-static">Welcome Back, </p>
                        <span class="welcome-message" id="typewriter"></span>
                        <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
                    </div>


                    <!-- Main Content -->
                    <div class="px-8 pt-5 flex justify-center items-center">
                        <div class="grid grid-cols-12 w-full gap-14 h-full">
                            <!-- Box Status Akademik -->
                            <div class="col-span-8 flex flex-col">
                                <div class="text-center">
                                    <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Status Dosen</h2>
                                </div>
                                
                                <!-- Box Utama Status Akademik -->
                                <div class="grid grid-cols-12 w-full rounded-3xl flex-grow outline outline-1 " style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                                    <div class="col-span-8 p-6 space-y-5 box-border border-black">
                                        <div>
                                            <p class="text-lg" style="color: #F0B90B"><strong>Nama :</strong></p>
                                            <p class="text-md">{{ $data['nama'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-lg" style="color: #F0B90B"><strong>NIP :</strong></p>
                                            <p class="mb-1 text-md">{{ $data['nim_nip'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-lg" style="color: #F0B90B"><strong>Semester Akademik :</strong></p>
                                            <p class="text-md">2024/2025 Ganjil</p>
                                        </div>
                                    </div>
                                    <div class="col-span-4 p-6 text-center rounded-tr-lg rounded-br-lg text-lg space-y-2 box-border border-black flex flex-col items-center gap-1.5">
                                    </div>
                                    <div class="content-center col-span-12 text-white text-center py-3 rounded-2xl mx-5 mb-5 bg-gradient-to-l from-green-500 via-green-600 to-green-700 {{ $theme == 'light' ? 'text-gray-100' : 'text-gray-100' }}">
                                        <p class="text-xl text-center "><strong>AKTIF</strong></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Box Capaian Akademik -->
                            <div class="col-span-4 flex flex-col">
                                <div class="text-center">
                                    <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Status Perwalian</h2>
                                </div>

                                <!-- Box Utama Capaian Akademik -->
                                <div class="rounded-3xl outline outline-1 " style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                                    <div class="p-6 text-lg space-y-4 flex-grow flex flex-col items-center justify-center">
                                        <div class="text-center w-full mb-3">
                                            <p class="font-bold" style="color: #F0B90B">Semester Akademik</p>
                                            <p style="{{ $theme == 'light' ? 'color: #fff;' : 'color: #222;' }}"><strong>2024/2025 Ganjil</strong></p>
                                        </div>

                                        <div class="text-center w-full">
                                            <p style="{{ $theme == 'light' ? 'color: #fff;' : 'color: #222;' }}"><strong>Mahasiswa Aktif</strong></p>
                                            <div class="text-white text-center py-2 mx-5 rounded-lg mt-2 bg-gradient-to-l from-red-500 via-red-700 to-red-800 {{ $theme == 'light' ? 'text-white' : 'text-black' }}">
                                                <p class="font-semibold text-3xl text-gray-50">34</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="{{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }}">
                                        <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="{{ $theme == 'light' ? 'background-color: #ffffff; ' : 'background-color: #2A2C33;' }}">
                                        </div>
                                    </div>
                                    <div class="p-6 text-lg space-y-4 flex-grow flex items-center justify-center">
                                        <div class="text-center w-full">
                                            <p style="{{ $theme == 'light' ? 'color: #fff;' : 'color: #222;' }}"><strong>Mahasiswa Cuti</strong></p>
                                            <div class="text-white text-center py-2 mx-5 rounded-lg mt-2 bg-gradient-to-l from-orange-500 via-orange-700 to-orange-800 {{ $theme == 'light' ? 'text-white' : 'text-black' }}">
                                                <p class="font-semibold text-3xl text-gray-50">16</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jadwal Mata Kuliah -->
                    <div id="box-jadwal-mata-kuliah" class="px-8 pt-10">
                        <div class="text-center h-full">
                            <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Jadwal Mata Kuliah</h2>
                        </div>
                        <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                            <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                                <thead>
                                    <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                        <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Waktu</th>
                                        <th class="px-4 py-2 w-1/2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Mata Kuliah</th>
                                        <th class="px-4 py-2 w-1/4 rounded-tr-lg">Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">

                                    </tr>
                                </tbody>
                            </table>
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