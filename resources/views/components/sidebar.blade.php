<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/faviconD-96x96.png') }}">

    <style>
        .active-state {
            /* transform: translateX(0.5rem); */
            /* text-decoration: underline; */

            a {
                color: #F0B90B;
            }
            
        }
    </style>
</head>

<body>
    <aside class="flex-none w-1/6 box-border backdrop-blur-sm" style="{{ $theme == 'light' ? 'background-color: rgba(16, 17, 21, 0.7);' : 'background-color: rgba(255, 255, 255, 0.7);' }}">
        <div class="p-10">
            <img class="w-auto" src="{{ $theme == 'light' ? asset('assets/Logo.png') : asset('assets/Logo_black.png') }}" alt="Logo">
        </div>
        <nav class="mt-14 mr-6 text-left">
            <ul>
                <!--Mahasiswa-->
                @if ($user->ma==1)
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/dashboardMahasiswa" class="block text-white hover:text-yellow-400 font-semibold">
                        Dashboard
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/registrasi" class="block text-white hover:text-yellow-400 font-semibold">Registrasi</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/pengisianirs" class="block text-white hover:text-yellow-400 font-semibold">IRS</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/khs" class="block text-white hover:text-yellow-400 font-semibold">KHS</a>
                </li>
                @endif

                <!--Pembimbing Akademik-->
                @if ($user->pa==1 && $user->kp==0 && $user->dk==0)
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/dashboardPembimbingAkademik" class="block text-white hover:text-yellow-400 font-semibold">
                        Dashboard
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/perwalian" class="block text-white hover:text-yellow-400 font-semibold">Perwalian</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/inputnilai" class="block text-white hover:text-yellow-400 font-semibold">Input Nilai</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/jadwalmengajar" class="block text-white hover:text-yellow-400 font-semibold">Jadwal Mengajar</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/verifikasiIRS" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi IRS</a>
                </li>
                @endif

                <!--Kaprodi-->
                @if ($user->kp==1 && $user->pa==1)
                <li class="px-7 py-7 transition-colors duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('dashboardKaprodi') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/dashboardKaprodi" class="flex items-center space-x-3 block
                        {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                        <svg class="w-[32px] h-[32px] transition-colors duration-200 text-current" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-3 transition-colors duration-200">Dashboard</span>
                    </a>
                </li>

                <li class="px-7 py-7 transition-colors duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('penyusunanjadwal') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/penyusunanjadwal" class="flex items-center space-x-3 block
                        {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold'  }}">
                        <svg class="w-[38px] h-[38px] transition-colors duration-200"  
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                        </svg>
                    <span class="ml-3 transition-colors duration-200">Penyusunan Jadwal Kuliah</span>
                    </a>
                </li>

                <li class="px-7 py-7 transition-colors duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('jadwalpengisianIRS') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/jadwalpengisianIRS" class="flex items-center space-x-3 block
                        {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold'  }}">
                        <svg class="w-[34px] h-[34px] transition-colors duration-200 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                        </svg>                          
                    <span class="ml-3 transition-colors duration-200">Jadwal Pengisian IRS</span>
                    </a>
                </li>
                @endif

                <!--Dekan-->
                @if ($user->dk==1 && $user->pa==1)
                <li class="px-7 py-7 transition-transform duration-200                 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('dashboardDekan') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/dashboardDekan" class="flex items-center space-x-3 block
                        {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                        <svg class="w-[32px] h-[32px] transition-colors duration-200 text-current" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-3 transition-colors duration-200">Dashboard</span>
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('verifikasijadwal') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/verifikasijadwal" class="flex items-center space-x-4 block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold'  }}">
                        <svg class="w-[38px] h-[38px] transition-colors duration-200" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-3 transition-colors duration-200">Verifikasi Jadwal Departemen</span>
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('verifikasiRuangKuliah') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                    <a href="/verifikasiRuangKuliah" class="flex items-center space-x-4 block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold'  }}">
                        <svg class="w-[38px] h-[38px] transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.512 8.72a2.46 2.46 0 0 1 3.479 0 2.461 2.461 0 0 1 0 3.479l-.004.005-1.094 1.08a.998.998 0 0 0-.194-.272l-3-3a1 1 0 0 0-.272-.193l1.085-1.1Zm-2.415 2.445L7.28 14.017a1 1 0 0 0-.289.702v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .703-.288l2.851-2.816a.995.995 0 0 1-.26-.189l-3-3a.998.998 0 0 1-.19-.26Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7 3a1 1 0 0 1 1 1v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1V4a1 1 0 0 1 1-1Zm10.67 8H19v8H5v-8h3.855l.53-.537a1 1 0 0 1 .87-.285c.097.015.233.13.277.087.045-.043-.073-.18-.09-.276a1 1 0 0 1 .274-.873l1.09-1.104a3.46 3.46 0 0 1 4.892 0l.001.002A3.461 3.461 0 0 1 17.67 11Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-3 transition-colors duration-200">Verifikasi Ruang Kuliah</span>
                        </a>
                </li>
                @endif

                <!--Bagian Akademik-->
                @if ($user->ba == 1)
                <li class="px-7 py-7 transition-colors duration-200 
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }} --}}
                {{ request()->is('dashboardBagianAkademik') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                <a href="/dashboardBagianAkademik" class="flex items-center space-x-3 block 
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[32px] h-[32px] transition-colors duration-200 text-current" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-3 transition-colors duration-200">Dashboard</span>
                </a>
                </li>

                <li class="px-7 py-7 transition-colors duration-200 rounded
                {{-- {{ $theme == 'light' ? 'hover:bg-zinc-800' : 'hover:bg-zinc-100' }}  --}}
                {{ request()->is('pembagiankelasInfo') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl">
                <a href="/pembagiankelasInfo" class="flex items-center block 
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold'  }}">
                    <svg class="w-[38px] h-[38px] transition-colors duration-200"  
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-3 transition-colors duration-200">Pembagian Kelas Departemen</span>
                </a>
                </li>
            
            
            @endif            
            </ul>
        </nav>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname;
            const links = document.querySelectorAll('li a');

            links.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.parentElement.classList.add('active-state');
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>

</html>