<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengisian IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <div class="px-8 pt-5 mt-5 mb-5">
                <h2 class="text-center text-lg font-semibold mb-4">Jadwal Pengisian IRS</h2>
                <table class="table-auto p-5 w-full text-center rounded-lg border-collapse">
                    <thead>
                        <tr class="bg-[#878A91]">
                            <th class="px-4 py-2 w-1/6 border-r border-white rounded-tl-lg">Keterangan</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Jadwal Mulai</th>
                            <th class="px-4 py-2 w-1/3 border-r border-white">Jadwal Berakhir</th>
                            <th class="px-4 py-2 w-1/6 rounded-tr-lg">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalpengisian as $jadwal)
                            <tr data-id="{{ $jadwal->id }}" style="background-color: #23252A;">
                                <td class="px-4 py-2 border-r border-white">{{ $jadwal->keterangan }}</td>
                                <td class="px-4 py-2 border-r border-white">{{ $jadwal->jadwalmulai }}</td>
                                <td class="px-4 py-2 border-r border-white">{{ $jadwal->jadwalberakhir }}</td>                              
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

            <form id="editForm" style="display:none" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-gray-700 p-6 rounded-lg w-1/3">
                    <h2 class="text-lg font-semibold mb-4">Edit Jadwal</h2>
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-4">
                        <label class="block">Keterangan</label>
                        <input type="text" id="editKeterangan" name="keterangan" class="w-full px-4 py-2 text-black rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block">Jadwal Mulai</label>
                        <input type="date" id="editJadwalMulai" name="jadwalmulai" class="w-full px-4 py-2 text-black rounded-md">
                    </div>
                    <div class="mb-4">
                        <label class="block">Jadwal Berakhir</label>
                        <input type="date" id="editJadwalBerakhir" name="jadwalberakhir" class="w-full px-4 py-2 text-black rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditForm()" class="mr-4 px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Save</button>
                    </div>
                </div>
            </form>
            
            <div class="px-8 mt-5 flex justify-end">
                <div class="rounded-lg py-2 px-5 bg-[#34803C] hover:bg-[#2b6e32] min-w-[120px]">
                <a href="#" class="text-center block text-white"><strong>Set Jadwal</strong></a>
                </div>
            </div>
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