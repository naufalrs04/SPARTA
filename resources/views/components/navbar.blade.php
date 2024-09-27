<div class="flex-grow" style="background-color: #17181C;">
    <!-- Navbar Atas-->
    <nav class="pr-8 pt-5 pb-5 flex justify-end items-center box-border border-b-2 border-black" style="background-color: #1E1F24;">
        <!-- Nama dan NIM -->
        <div class="text-right">
            <h2 class="text-xl font-semibold">{{$user['nama']}}</h2>
            <h2 class="text-lg text-gray-400">{{ $user['nim_nip'] }}</h2>
        </div>
        <!-- Foto Profil -->
        <div class="pl-8">
            <img src="https://via.placeholder.com/40" alt="Foto Profil" class="w-16 h-16 rounded-full">
        </div>
    </nav>
</div>