<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="flex-none w-1/6 box-border " style="background-color: #101115">
            <div class="p-10">
                <img class="w-auto" src="{{ asset('assets/Logo.png') }}" alt="Logo">
            </div>
            <nav class="mt-8 text-center">
                <ul>
                    <li class="px-7 py-7">
                        <a href="dashboardMahasiswa" class="block text-white">Dashboard</a>
                    </li>
                    <li class="px-7 py-7">
                        <a href="registrasi" class="block text-gray-300">Registrasi</a>
                    </li>
                    <li class="px-7 py-7">
                        <a href="#" class="block text-gray-300">IRS</a>
                    </li>
                    <li class="px-7 py-7">
                        <a href="#" class="block text-gray-300">KHS</a>
                    </li>
                    <li class="px-7 py-7">
                        <a href="#" class="block text-gray-300">Log Out</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            <!-- Navbar Atas-->
            <nav class="pr-8 pt-5 pb-5 flex justify-end items-center box-border border-b-2 border-black" style="background-color: #1E1F24;">
                <!-- Nama dan NIM -->
                <div class="text-right">
                    <h2 class="text-xl font-semibold">{{ $data['nama'] }}</h2>
                    <h2 class="text-lg text-gray-400">{{ $data['nim'] }}</h2>
                </div>
                <!-- Foto Profil -->
                <div class="pl-8">
                    <img src="https://via.placeholder.com/40" alt="Foto Profil" class="w-16 h-16 rounded-full">
                </div>
            </nav>