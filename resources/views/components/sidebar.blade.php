<aside class="flex-none w-1/6 box-border " style="background-color: #101115">
    <div class="p-10">
        <img class="w-auto" src="{{ asset('assets/Logo.png') }}" alt="Logo">
    </div>
    <nav class="mt-8 text-center">
    <ul>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="dashboardMahasiswa" class="block text-white hover:text-yellow-400 font-semibold">
                Dashboard
            </a>
        </li>

        @if ($user->ma==1)
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="registrasi" class="block text-white hover:text-yellow-400 font-semibold">Registrasi</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="pengisianirs" class="block text-white hover:text-yellow-400 font-semibold">IRS</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="khs" class="block text-white hover:text-yellow-400 font-semibold">KHS</a>
        </li>
        @endif

        @if ($user->pa==1 && $user->kp==0 && $user->dk==0)
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="perwalian" class="block text-white hover:text-yellow-400 font-semibold">Perwalian</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="inputnilai" class="block text-white hover:text-yellow-400 font-semibold">Input Nilai</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="jadwalmengajar" class="block text-white hover:text-yellow-400 font-semibold">Jadwal Mengajar</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="verifikasiIRS" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi IRS</a>
        </li>
        @endif

        @if ($user->kp==1 && $user->pa==1)
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="penyusunanjadwalkuliah" class="block text-white hover:text-yellow-400 font-semibold">Penyusunan Jadwal Kuliah</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="jadwalpengisianIRS" class="block text-white hover:text-yellow-400 font-semibold">Jadwal Pengisian IRS</a>
        </li>
        @endif

        @if ($user->dk==1 && $user->pa==1)
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi Jadwal Departemen</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="" class="block text-white hover:text-yellow-400 font-semibold">Penyusunan Jadwal Kuliah</a>
        </li>
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="" class="block text-white hover:text-yellow-400 font-semibold">Verifikasi Ruang Kuliah</a>
        </li>
        @endif

        @if ($user->ba==1)
        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded">
            <a href="" class="block text-white hover:text-yellow-400 font-semibold">Pembagian Kelas Departemen</a>
        </li>
        @endif

        <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-1 hover:bg-gray-700 rounded flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left mr-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
            </svg>
            <a href="login" class="text-white hover:text-yellow-400 font-semibold flex items-center">
                Log Out
            </a>
        </li>
    </ul>
</nav>


</aside>