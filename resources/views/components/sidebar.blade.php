<aside class="flex-none w-1/6 box-border " style="background-color: #101115">
    <div class="p-10">
        <img class="w-auto" src="{{ asset('assets/Logo.png') }}" alt="Logo">
    </div>
    <nav class="mt-8 text-center">
        <ul>
            <li class="px-7 py-7">
                <a href="dashboardMahasiswa" class="block text-white">Dashboard</a>
            </li>

            @if ($user->ma==1)
            <li class="px-7 py-7">
                <a href="registrasi" class="block text-white">Registrasi</a>
            <li class="px-7 py-7">
                <a href="irs" class="block text-gray-300">IRS</a>
            </li>
            <li class="px-7 py-7">
                <a href="irs" class="block text-gray-300">KHS</a>
            </li>
            @endif

            @if ($user->pa==1 && $user->kp==0 && $user->dk==0)
            <li class="px-7 py-7">
                <a href="perwalian" class="block text-white">Perwalian</a>
            <li class="px-7 py-7">
                <a href="inputnilai" class="block text-gray-300">Input Nilai</a>
            </li>
            <li class="px-7 py-7">
                <a href="jadwalmengajar" class="block text-gray-300">Jadwal Mengajar</a>
            </li>
            <li class="px-7 py-7">
                <a href="verifikasiIRS" class="block text-white">Verifikasi IRS</a>
            @endif

            @if ($user->kp==1 && $user->pa==1)
            <li class="px-7 py-7">
                <a href="penyusunanjadwalkuliah" class="block text-white">Penyusunan Jadwal Kuliah</a>
            </li>
            <li class="px-7 py-7">
                <a href="jadwalpengisianIRS" class="block text-gray-300">Jadwal Pengisian IRS</a>
            </li>
            @endif

            @if ($user->dk==1 && $user->pa==1)
            <li class="px-7 py-7">
                <a href="" class="block text-white">Verifikasi Jadwal Departemen</a>
            <li class="px-7 py-7">
                <a href="" class="block text-gray-300">Penyusunan Jadwal Kuliah</a>
            </li>
            <li class="px-7 py-7">
                <a href="" class="block text-gray-300">Verifikasi Ruang Kuliah</a>
            </li>
            @endif

            @if ($user->ba==1)
            <li class="px-7 py-7">
                <a href="" class="block text-white">Pembagian Kelas Departemen</a>
            </li>
            @endif

            <li class="px-7 py-7">
                <a href="login" class="block text-white">Log Out</a>
            </li>
        </ul>
    </nav>
</aside>