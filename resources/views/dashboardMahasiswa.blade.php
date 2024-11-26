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
        @include('components.sidebar', ['theme' => $theme])

        <!-- Content -->
        <div class="flex-grow">
            @include('components.navbar', ['theme' => $theme])

            <!-- Main Content -->
            <div class="pl-8 pt-5 flex justify-left items-center {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <p class="welcome-message-static">Welcome Back, </p>
                <span class="welcome-message" id="typewriter"></span>
                <span class="text-2xl" aria-label="Waving Hand" role="img">👋</span>
            </div>

            <div class="px-8 pt-6 flex justify-center items-center {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="grid grid-cols-12 w-full gap-14">
                    <!-- Box Status Akademik -->
                    <div class="col-span-8 rounded-lg flex flex-col">
                        <div class="text-center">
                            <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Status Akademik</h2>
                        </div>

                        <!-- Box Utama Status Akademik -->
                        <div class="grid grid-cols-12 w-full rounded-3xl flex-grow outline outline-1 " style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                            <div class="col-span-8 p-6 rounded-tl-lg rounded-bl-lg text-lg space-y-5 box-border border-black">
                                <div>
                                    <p style="color: #F0B90B"><strong>Nama :</strong></p>
                                    <p>{{ $nama_mahasiswa }}</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>NIM :</strong></p>
                                    <p class="mb-1">{{ $user->nim_nip }}</p>
                                </div>
                                <div>
                                    <p style="color: #F0B90B"><strong>Semester Akademik :</strong></p>
                                    <p>2024/2025 Ganjil</p>
                                </div>
                            </div>
                            <div class="col-span-4 p-6 text-center rounded-tr-lg rounded-br-lg text-lg space-y-2 box-border border-black flex flex-col items-center gap-1.5">
                                <p style="color: #F0B90B"><strong>Semester Studi :</strong></p>
                                <div class="box-border border-2 w-20 h-20 flex justify-center items-center rounded-lg" style="border-color: #F0B90B">
                                    <span class="text-5xl"><strong>{{$data['semester']}}</strong></span>
                                </div>
                            </div>
                            @if($data['status']==1)
                            <div class="col-span-12 text-white text-xl flex items-center justify-center py-3 rounded-xl mx-5 mb-5 bg-gradient-to-l from-green-500 via-green-600 to-green-700">
                                <p><strong>AKTIF</strong></p>
                            </div>
                            @else
                            <div class="col-span-12 text-white text-xl flex items-center justify-center py-3 rounded-xl mx-5 mb-5 bg-gradient-to-l from-red-500 via-red-600 to-red-700">
                                <p><strong>TIDAK AKTIF</strong></p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Box Capaian Akademik -->
                    <div class="col-span-4 flex flex-col">
                        <div class="text-center">
                            <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Capaian Akademik</h2>
                        </div>

                        <!-- Box Utama Capaian Akademik -->
                        <div class="p-6 overflow-x-auto rounded-3xl" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                            <div class="p-7 text-lg space-y-4 flex-grow flex items-center justify-center">
                                <div class="text-center w-full">
                                    <p><strong>IPK</strong></p>
                                    <div class="text-center py-2 mx-5 rounded-lg mt-2 bg-gradient-to-l from-red-500 via-red-600 to-red-700">
                                        <p class="font-bold text-3xl text-white">{{ $data['IPK'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-5 space-y-4 flex-grow flex items-center justify-center" style="{{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }}">
                                <div class="p-0.5 rounded-lg text-lg space-y-4 flex-grow flex items-center justify-center" style="{{ $theme == 'light' ? 'background-color: #ffffff; ' : 'background-color: #2A2C33;' }}">
                                </div>
                            </div>
                            <div class="p-7 rounded-bl-lg rounded-br-lg text-lg text-center space-y-4" style="{{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #ffffff;' }}">
                                <p><strong>Total SKS</strong></p>
                                <div class="text-white text-center py-2 mx-5 rounded-lg mt-2 bg-gradient-to-l from-orange-500 via-orange-600 to-orange-700">
                                    <p class="font-semibold text-3xl">42</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Jadwal Kuliah-->
            <div class="px-8 pt-10 pb-48 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="text-center">
                    <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Jadwal Kuliah</h2>
                </div>
                <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)">
                <table class="w-full text-center border-collapse" name="tabel_jadwal">
                    <thead>
                        <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                            <th class="px-4 py-2 w-1/4 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Waktu</th>
                            <th class="px-4 py-2 w-1/2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Mata Kuliah</th>
                            <th class="px-4 py-2 w-1/4">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal_kuliah as $jadwal)
                                <tr class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                    <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                        {{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                    </td>
                                        <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                            {{$jadwal->nama_mk}} - {{$jadwal->kelas}}
                                        </td>
                                    <td class="px-4 py-2">
                                        {{$jadwal->ruang}}
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
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