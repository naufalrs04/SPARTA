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
    <aside class="flex-none w-1/6 box-border" style="{{ $theme == 'light' ? 'background-color: #101115;' : 'background-color: #ffffff;' }}" >
        <div class="p-10">
            <img class="w-auto" <img src="{{ $theme == 'light' ? asset('assets/Logo.png') : asset('assets/Logo_black.png') }}" alt="Logo">
        </div>
        <nav class="mt-14 mr-6 text-left" >
            <ul>
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

                @if ($user->kp==1 && $user->pa==1)
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/dashboardKaprodi" class="block text-white hover:text-yellow-400 font-semibold">
                        Dashboard
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/penyusunanjadwal" class="block text-white hover:text-yellow-400 font-semibold">Penyusunan Jadwal Kuliah</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md ">
                    <a href="/jadwalpengisianIRS" class="block text-white hover:text-yellow-400 font-semibold">Jadwal Pengisian IRS</a>
                </li>
                @endif

                @if ($user->dk==1 && $user->pa==1)
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/dashboardDekan" class="block text-white hover:text-yellow-400 font-semibold">
                        Dashboard
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/verifikasijadwal" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi Jadwal Departemen</a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/verifikasiRuangKuliah" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi Ruang Kuliah</a>
                </li>
                @endif

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
                    <svg class="w-[38px] h-[38px] transition-colors duration-200  
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