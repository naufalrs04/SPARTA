<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengisian IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body class="{{ $theme == 'light' ? 'text-gray-100' : 'text-gray-900' }}">
    <div class="flex min-h-screen backdrop-blur-sm" style="{{ $theme == 'light' ? 'background-color: #17181C;' : 'background-color: #eeeeee;' }}">
        <!-- Efek latar belakang -->
        <div class="absolute inset-0 z-[-1]">
            <div class="absolute inset-0 flex justify-center">
                <div class="bg-shape1 bg-teal opacity-50 bg-blur"></div>
                <div class="bg-shape2 bg-primary opacity-50 bg-blur"></div>
                <div class="bg-shape1 bg-purple opacity-50 bg-blur"></div>
            </div>
        </div> 

        <!-- Sidebar -->
        @include('components.sidebar', ['theme' => $theme])

        <!-- Content -->
        <div class="flex-grow">
            <!-- Navbar -->
            @include('components.navbar', ['theme' => $theme])

            <!-- Main Content -->
            <div class="pb-64 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">
                <div class="px-10 pt-5 mb-5">
                    <div class="text-center">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block  px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Jadwal Pengisian IRS</h2>
                    </div>
                    <div class="overflow-x-auto rounded-3xl {{ $theme == 'light' ? 'border border-black' : 'border border-black' }}" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5)"> 
                    <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                        <thead>
                            <tr class="{{ $theme == 'light' ? 'bg-gray-700' : 'bg-gray-200' }}">
                                <th class="px-4 py-2 w-1/6 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Keterangan</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jadwal Mulai</th>
                                <th class="px-4 py-2 w-1/3 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">Jadwal Berakhir</th>
                                <th class="px-4 py-2 w-1/6">Info</th>
                            </tr>
                        </thead>
                        @foreach ($jadwalpengisian as $jadwal)
                            <tr data-id="{{ $jadwal->id }}" class="{{ $theme == 'light' ? 'bg-[#2A2C33]' : 'bg-[#EEEEEE]' }}">
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">{{ $jadwal->keterangan }}</td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                    {!! $jadwal->jadwalmulai ?? '<em>Anda belum melakukan pengaturan</em>' !!}
                                </td>
                                <td class="px-4 py-2 border-r {{ $theme == 'light' ? 'border-gray-600' : 'border-gray-300' }}">
                                    {!! $jadwal->jadwalberakhir ?? '<em>Anda belum melakukan pengaturan</em>' !!}
                                </td>
                                <td class="px-5 py-2 text-center">
                                    <button class="edit-btn w-16 text-white rounded-md px-3 py-2 bg-gray-400 hover:bg-gray-500">
                                        <strong>Edit</strong>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-1 pr-1 mt-8 flex justify-end">
                    <div class="py-2 px-5 rounded-xl bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white font-medium">
                    <a href="#" class="text-center block text-white"><strong>Set Jadwal</strong></a>
                    </div>
                </div>
            </div>
            <div class="mb-64 {{ $theme == 'light' ? 'bg-gray-900/50' : 'bg-white-900/50' }}">

            </div>

            <form id="editForm" style="display:none" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-gray-700 p-6 rounded-3xl w-1/3 outline outline-1" style="box-shadow: 4px 6px 1px 1px rgba(0, 0, 0, 2.5); {{ $theme == 'light' ? 'background-color: #2A2C33;' : 'background-color: #EEEEEE;' }} {{ $theme == 'light' ? 'outline: 1px solid #000000;' : 'outline: 1px solid #000000;' }}">
                    <div class="text-center">
                        <h2 class="text-center text-lg font-semibold mb-4 rounded-lg inline-block px-2 bg-opacity-50 {{ $theme == 'light' ? '' : 'bg-[#ffeeb6]' }}">Edit Jadwal</h2>
                    </div>
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-4">
                        <label class="block pl-2 font-medium">Keterangan</label>
                        <input type="text" id="editKeterangan" name="keterangan" class="w-full px-4 py-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-white' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}">
                    </div>
                    <div class="mb-4">
                        <label class="block pl-2 font-medium">Jadwal Mulai</label>
                        <input type="date" id="editJadwalMulai" name="jadwalmulai" class="w-full px-4 py-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-white' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}">
                    </div>
                    <div class="mb-4">
                        <label class="block pl-2 font-medium">Jadwal Berakhir</label>
                        <input type="date" id="editJadwalBerakhir" name="jadwalberakhir" class="w-full px-4 py-2 border rounded-xl {{ $theme == 'light' ? 'bg-gray-700 border-gray-900 hover:border-gray-500 text-white' : 'bg-gray-300 border-gray-400 hover:border-gray-600 text-gray-600' }}">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditForm()" class="mr-4 px-4 py-2 rounded-xl bg-gradient-to-l from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white font-semibold">Cancel</button>
                        <button type="submit" class="px-4 py-2 rounded-xl bg-gradient-to-l from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br hover:shadow-[0px_6px_1px_1px_rgba(0,_0,_0,_0.8)] hover:outline hover:outline-1 hover:outline-zinc-800 transition duration-200 ease-in-out text-white font-semibold">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            const csrfToken = '{{ csrf_token() }}';

            $('.edit-btn').click(function () {
                const row = $(this).closest('tr');
                $('#editId').val(row.data('id'));
                $('#editKeterangan').val(row.find('td:eq(0)').text().trim());
                $('#editJadwalMulai').val(row.find('td:eq(1)').text().trim());
                $('#editJadwalBerakhir').val(row.find('td:eq(2)').text().trim());
                $('#editForm').show();
            });

            function closeEditForm() {
                $('#editForm').hide();
            }
            window.closeEditForm = closeEditForm;

            $('#editForm').submit(function (e) {
                e.preventDefault();

                const id = $('#editId').val();
                const keterangan = $('#editKeterangan').val();
                const jadwalmulai = $('#editJadwalMulai').val();
                const jadwalberakhir = $('#editJadwalBerakhir').val();

                $.ajax({
                    url: `/jadwal-pengisian/${id}`,
                    type: 'POST',
                    data: {
                        _method: 'PATCH',
                        _token: csrfToken,
                        keterangan: keterangan,
                        jadwalmulai: jadwalmulai,
                        jadwalberakhir: jadwalberakhir
                    },
                    success: function (response) {
                        if (response.success) {
                            const row = $(`tr[data-id="${id}"]`);
                            row.find('td:eq(0)').text(keterangan);
                            row.find('td:eq(1)').text(jadwalmulai);
                            row.find('td:eq(2)').text(jadwalberakhir);
                            closeEditForm();
                        }
                    },
                    error: function () {
                        alert('Failed to update jadwal. Please try again.');
                    }
                });
            });
        });
    </script>
    
</body>

</html>