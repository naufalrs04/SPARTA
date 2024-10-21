<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <style>
        .active-state {
            transform: translateX(0.5rem);
            text-decoration: underline;
            text-underline-offset: 0.3em;
            background-color: #1E1F24;

            a {
                color: #F0B90B;
            }
            
        }
    </style>
</head>

<body>
    <aside class="flex-none w-1/6 box-border " style="background-color: #101115">
        <div class="p-10">
            <img class="w-auto" src="{{ asset('assets/Logo.png') }}" alt="Logo">
        </div>
        <nav class="mt-14 text-center">
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

                @if ($user->ba==1)
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/dashboardBagianAkademik" class="block text-white hover:text-yellow-400 font-semibold">
                        Dashboard
                    </a>
                </li>
                <li class="px-7 py-7 transition-transform duration-200 hover:translate-x-2 hover:bg-zinc-800 rounded-md">
                    <a href="/pembagiankelas" class="block text-white hover:text-yellow-400 font-semibold">Pembagian Kelas Departemen</a>
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
</body>

</html>