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
                <li class="pl-1 py-7 transition-colors duration-200 
                {{ request()->is('dashboardPembimbingAkademik') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl group">
                <a href="/dashboardPembimbingAkademik" class="flex items-center block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[32px] h-[32px] 
                        {{ request()->is('dashboardPembimbingAkademik') ? 'opacity-100 scale-100 ml-5' : 'opacity-0 transform scale-0' }} 
                        transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform 
                        {{ request()->is('dashboardPembimbingAkademik') ? 'translate-x-3' : '' }} 
                        group-hover:translate-x-3">
                        Dashboard 
                    </span>
                    </a>
                </li>
                <li class="pl-1 py-7 transition-colors duration-200 
                {{ request()->is('perwalian') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl group">
                <a href="/perwalian" class="flex items-center block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[34px] h-[34px] 
                        {{ request()->is('perwalian') ? 'opacity-100 scale-100 ml-5' : 'opacity-0 transform scale-0' }} 
                        transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform 
                        {{ request()->is('perwalian') ? 'translate-x-3' : '' }} 
                        group-hover:translate-x-3">
                        Perwalian
                    </span>
                    </a>
                </li> 
                {{-- <li class="pl-1 py-7 transition-colors duration-200 
                {{ request()->is('inputnilai') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl group">
                <a href="/inputnilai" class="flex items-center block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[32px] h-[32px] 
                        {{ request()->is('inputnilai') ? 'opacity-100 scale-100 ml-5' : 'opacity-0 transform scale-0' }} 
                        transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform 
                        {{ request()->is('inputnilai') ? 'translate-x-3' : '' }} 
                        group-hover:translate-x-3">
                        Input Nilai
                    </span>
                    </a>
                </li> --}}
                <li class="pl-1 py-7 transition-colors duration-200 
                {{ request()->is('jadwalmengajar') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl group">
                <a href="/jadwalmengajar" class="flex items-center block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[36px] h-[36px] 
                        {{ request()->is('jadwalmengajar') ? 'opacity-100 scale-100 ml-5' : 'opacity-0 transform scale-0' }} 
                        transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform 
                        {{ request()->is('jadwalmengajar') ? 'translate-x-3' : '' }} 
                        group-hover:translate-x-3">
                        Jadwal Mengajar
                    </span>
                    </a>
                </li>
                <li class="pl-1 py-7 transition-colors duration-200 
                {{ request()->is('verifikasiIRS') ? ($theme == 'light' ? 'bg-zinc-800 outline outline-2 outline-zinc-800 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]' : 'bg-zinc-100 outline outline-1 outline-zinc-700 shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)]') : '' }}
                rounded-r-3xl group">
                <a href="/verifikasiIRS" class="flex items-center block
                    {{ $theme == 'light' ? 'text-white hover:text-yellow-500 font-semibold' : 'text-gray-800 hover:text-yellow-500 font-semibold' }}">
                    <svg class="w-[32px] h-[32px] 
                        {{ request()->is('verifikasiIRS') ? 'opacity-100 scale-100 ml-5' : 'opacity-0 transform scale-0' }} 
                        transition-all duration-300 group-hover:opacity-100 group-hover:scale-100 group-hover:ml-5" 
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="transition-transform duration-100 transform 
                        {{ request()->is('verifikasiIRS') ? 'translate-x-3' : '' }} 
                        group-hover:translate-x-3">
                        Verifikasi IRS
                    </span>
                    </a>
                </li>            
            </ul>
        </nav>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname;
            const links = document.querySelectorAll('li a');

            links.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.parentElement.classList.add('active-state'); // Menambahkan kelas ke li yang sesuai
                }
            });
        });
    </script>
</body>

</html>