<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembagian Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Content -->
        <div class="flex-grow" style="background-color: #17181C;">
            <!-- Navbar -->
            @include('components.navbar')

            <!-- Main Content -->
                <div class="px-8 pt-5 mt-5 mb-5 rounded-tl-lg">
                    <h2 class="text-center text-lg font-semibold mb-4">Pembagian Kelas Departemen</h2>
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr style="background-color: rgba(135, 138, 145, 0.37);">
                                <th class="px-4 py-2 w-1/4 border-r border-white rounded-tl-lg">Departemen</th>
                                <th class="px-4 py-2 w-1/2 border-r border-white">Status</th>
                                <th class="px-4 py-2 w-1/4 rounded-tr-lg">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Informatika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p>Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Fisika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p>Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Matematika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #880000;">
                                        <p> Not Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Statistika</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #880000;">
                                        <p>Not Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Kimia</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p>Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                            <tr style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">Biologi</td>
                                
                                <td class="px-3 py-3 border-r border-white text-center flex justify-center items-center">
                                    <div class="w-32 text-white text-center rounded-md px-2 py-2" style="background-color: #34803C;">
                                        <p>Set</p>
                                    </div>
                                </td>                                
                                <td class="px-5 py-2 text-center">
                                    <button class="w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        Info
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            
        </div>
    </div>
</body>

</html>