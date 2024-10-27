<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\irs;
use App\Models\Mata_Kuliah;
use App\Models\Ruangan;
use App\Models\Mahasiswa;
use App\Models\irs_rekap;

class PengisianIRS extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
    
        // Data dari tabel irs
        $list_mata_kuliah = irs::all();
        foreach ($list_mata_kuliah as $mata_kuliah) {
            $mata_kuliah->kode = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->kode;
            $mata_kuliah->nama = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->nama;
            $mata_kuliah->sks = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->sks;
    
            // Waktu
            $mata_kuliah->hari = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->hari;
            $mata_kuliah->jam_mulai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_mulai;
            $mata_kuliah->jam_selesai = Mata_Kuliah::where('id', $mata_kuliah->mata_kuliah_id)->first()->jam_selesai;
            $mata_kuliah->jadwal = $mata_kuliah->hari . ', ' . $mata_kuliah->jam_mulai . ' - ' . $mata_kuliah->jam_selesai;
    
            // Ruangan
            $mata_kuliah->nama_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->nama;
            $mata_kuliah->kapasitas_ruangan = Ruangan::where('id', $mata_kuliah->ruangan_id)->first()->kapasitas;
        }
    
        // Data dari tabel irs_rekap
        $irs_rekap = irs_rekap::all();
        foreach ($irs_rekap as $rekap) {
            $rekap->kode = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->kode;
            $rekap->nama = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->nama;
            $rekap->sks = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->sks;
    
            // Waktu
            $rekap->hari = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->hari;
            $rekap->jam_mulai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_mulai;
            $rekap->jam_selesai = Mata_Kuliah::where('id', $rekap->mata_kuliah_id)->first()->jam_selesai;
            $rekap->jadwal = $rekap->hari . ', ' . $rekap->jam_mulai . ' - ' . $rekap->jam_selesai;
    
            // Ruangan
            $rekap->nama_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->nama;
            $rekap->kapasitas_ruangan = Ruangan::where('id', $rekap->ruangan_id)->first()->kapasitas;
        }
    
        // Kirim data ke view
        return view('pengisianirs', compact('user', 'list_mata_kuliah', 'irs_rekap'));
    }
    


    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
            'ruangan_id' => 'required|integer|exists:ruangans,id',
        ]);

        $mahasiswa_id = Auth::id();
       
        // Masukkan data ke tabel irs_rekap
        $irsRekap = irs_rekap::updateOrCreate(
            [
                'mahasiswa_id' => $mahasiswa_id,
                'mata_kuliah_id' => $validated['mata_kuliah_id'],
            ],
            [
                'ruangan_id' => $validated['ruangan_id'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil diambil',
            'data' => $irsRekap
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}



    public function delete(Request $request)
{
    $validated = $request->validate([
        'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
    ]);

    try {
        $mahasiswa_id = Auth::id();

        // Hapus mata kuliah dari database
        Irs_rekap::where('mahasiswa_id', $mahasiswa_id)
            ->where('mata_kuliah_id', $validated['mata_kuliah_id'])
            ->delete();

        return response()->json(['success' => true, 'message' => 'Mata kuliah berhasil dihapus.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

}

// <script>
//                 // Store taken courses IDs globally
//                 let takenCoursesIds = new Set();

//                 // Initialize taken courses on page load
//                 document.addEventListener('DOMContentLoaded', function() {
//                     // Get all courses from the summary table and store their IDs
//                     const summaryTable = document.querySelector('table:first-of-type tbody');
//                     Array.from(summaryTable.rows).forEach(row => {
//                         const courseId = row.getAttribute('data-course-id');
//                         if (courseId) {
//                             takenCoursesIds.add(parseInt(courseId));
//                             updateCourseButton(courseId, true);
//                         }
//                     });
//                 });

//                 // Update button appearance and functionality
//                 function updateCourseButton(courseId, isTaken) {
//                     const courseRow = document.querySelector(`tr[data-course-id="${courseId}"]`);
//                     if (!courseRow) return;

//                     const buttonCell = courseRow.querySelector('td:nth-child(5)'); // Adjust index if needed
//                     if (isTaken) {
//                         buttonCell.innerHTML = `
//             <form action="/irs-rekap/delete" method="POST" class="delete-form">
//                 @csrf
//                 <input type="hidden" name="mata_kuliah_id" value="${courseId}">
//                 <div class="text-white text-center items-center justify-center mx-2 my-1 rounded-md cursor-pointer bg-[#880000] hover:bg-red-800 font-bold">
//                     <button type="submit" class="batal-mata-kuliah" data-course-id="${courseId}">
//                         Batalkan
//                     </button>
//                 </div>
//             </form>
//         `;
//                     } else {
//                         buttonCell.innerHTML = `
//             <form action="/irs-rekap" method="POST" class="add-form">
//                 @csrf
//                 <input type="hidden" name="mata_kuliah_id" value="${courseId}">
//                 <input type="hidden" name="ruangan_id" value="1">
//                 <div class="text-white text-center items-center justify-center mx-2 my-1 rounded-md cursor-pointer bg-[#34803C] hover:bg-green-800 font-bold">
//                     <button class="ambil-mata-kuliah"
//                         data-course-id="${courseId}"
//                         data-kode="${courseRow.cells[1].textContent}"
//                         data-nama="${courseRow.cells[2].textContent}"
//                         data-hari-jam="${courseRow.cells[3].textContent}"
//                         data-sks="${courseRow.getAttribute('data-sks')}"
//                         type="submit">
//                         Ambil
//                     </button>
//                 </div>
//             </form>
//         `;
//                     }
//                 }

//                 // Handle form submissions (both add and delete)
//                 document.addEventListener('click', function(event) {
//                     const button = event.target.closest('button');
//                     if (!button) return;

//                     event.preventDefault();
//                     const form = button.closest('form');
//                     const isDelete = form.classList.contains('delete-form');
//                     const courseId = button.getAttribute('data-course-id');

//                     if (isDelete) {
//                         handleDeleteCourse(form, courseId);
//                     } else if (button.classList.contains('ambil-mata-kuliah')) {
//                         handleAddCourse(form, button);
//                     }
//                 });

//                 // Handle course deletion
//                 function handleDeleteCourse(form, courseId) {
//                     Swal.fire({
//                         title: 'Konfirmasi Pembatalan',
//                         text: 'Apakah Anda yakin ingin membatalkan mata kuliah ini?',
//                         icon: 'warning',
//                         showCancelButton: true,
//                         confirmButtonColor: '#880000',
//                         cancelButtonColor: '#6B7280',
//                         confirmButtonText: 'Ya, Batalkan',
//                         cancelButtonText: 'Tidak',
//                         reverseButtons: true
//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             const formData = new FormData(form);

//                             fetch(form.action, {
//                                     method: 'POST',
//                                     body: formData,
//                                     headers: {
//                                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
//                                         'Accept': 'application/json',
//                                         'X-Requested-With': 'XMLHttpRequest'
//                                     },
//                                 })
//                                 .then(response => response.json())
//                                 .then(data => {
//                                     if (data.success) {
//                                         // Remove course from summary table
//                                         removeCourseFromSummary(courseId);

//                                         // Update button state
//                                         takenCoursesIds.delete(parseInt(courseId));
//                                         updateCourseButton(courseId, false);

//                                         // Show success message
//                                         Swal.fire({
//                                             title: 'Berhasil!',
//                                             text: 'Mata kuliah berhasil dibatalkan',
//                                             icon: 'success',
//                                             timer: 1500,
//                                             showConfirmButton: false
//                                         });
//                                     } else {
//                                         throw new Error(data.message ||
//                                             'Terjadi kesalahan saat membatalkan mata kuliah');
//                                     }
//                                 })
//                                 .catch(error => {
//                                     console.error('Error:', error);
//                                     Swal.fire({
//                                         title: 'Error',
//                                         text: error.message,
//                                         icon: 'error'
//                                     });
//                                 });
//                         }
//                     });
//                 }

//                 // Handle adding course (modified version of your existing code)
//                 function handleAddCourse(form, button) {
//                     const courseData = {
//                         id: button.getAttribute('data-course-id'),
//                         kode: button.getAttribute('data-kode'),
//                         nama: button.getAttribute('data-nama'),
//                         waktu: button.getAttribute('data-hari-jam'),
//                         sks: parseInt(button.getAttribute('data-sks'))
//                     };

//                     Swal.fire({
//                         title: 'Konfirmasi Pengambilan Mata Kuliah',
//                         html: `
//             <div class="text-left">
//                 <p class="mb-2"><strong>Kode:</strong> ${courseData.kode}</p>
//                 <p class="mb-2"><strong>Mata Kuliah:</strong> ${courseData.nama}</p>
//                 <p class="mb-2"><strong>Jadwal:</strong> ${courseData.waktu}</p>
//                 <p class="mb-2"><strong>SKS:</strong> ${courseData.sks}</p>
//             </div>
//             <p class="mt-4">Apakah Anda yakin ingin mengambil mata kuliah ini?</p>
//         `,
//                         icon: 'question',
//                         showCancelButton: true,
//                         confirmButtonColor: '#34803C',
//                         cancelButtonColor: '#880000',
//                         confirmButtonText: 'Ya, Ambil',
//                         cancelButtonText: 'Batal',
//                         reverseButtons: true
//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             const formData = new FormData(form);

//                             fetch(form.action, {
//                                     method: 'POST',
//                                     body: formData,
//                                     headers: {
//                                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
//                                         'Accept': 'application/json',
//                                         'X-Requested-With': 'XMLHttpRequest'
//                                     },
//                                 })
//                                 .then(response => {
//                                     if (!response.ok) {
//                                         return response.json().then(err => Promise.reject(err));
//                                     }
//                                     return response.json();
//                                 })
//                                 .then(data => {
//                                     if (data.success) {
//                                         // Add course to summary and update UI
//                                         addCourseToSummary(courseData);
//                                         takenCoursesIds.add(parseInt(courseData.id));
//                                         updateCourseButton(courseData.id, true);
//                                         updateTotalSKS(courseData.sks);

//                                         Swal.fire({
//                                             title: 'Berhasil!',
//                                             text: 'Mata kuliah berhasil ditambahkan',
//                                             icon: 'success',
//                                             timer: 1500,
//                                             showConfirmButton: false
//                                         });
//                                     } else {
//                                         throw new Error(data.message || 'Terjadi kesalahan');
//                                     }
//                                 })
//                                 .catch(error => {
//                                     console.error('Error:', error);
//                                     let errorMessage = error.message ||
//                                     'Terjadi kesalahan saat menambahkan mata kuliah';

//                                     if (error.errors) {
//                                         errorMessage = Object.values(error.errors).flat().join('\n');
//                                     }

//                                     Swal.fire({
//                                         title: 'Peringatan',
//                                         text: errorMessage,
//                                         icon: 'warning'
//                                     });
//                                 });
//                         }
//                     });
//                 }

//                 // Function to remove course from summary table
//                 function removeCourseFromSummary(courseId) {
//                     const summaryTable = document.querySelector('table:first-of-type tbody');
//                     const courseRow = summaryTable.querySelector(`tr[data-course-id="${courseId}"]`);

//                     if (courseRow) {
//                         // Get SKS value before removing
//                         const sks = parseInt(courseRow.querySelector('td:last-child').textContent);

//                         // Remove the row
//                         courseRow.remove();

//                         // Update row numbers
//                         Array.from(summaryTable.rows).forEach((row, index) => {
//                             row.cells[0].textContent = index + 1;
//                         });

//                         // Update total SKS
//                         updateTotalSKS(-sks);
//                     }
//                 }

//                 // Modified addCourseToSummary function
//                 function addCourseToSummary(course) {
//                     const summaryTable = document.querySelector('table:first-of-type tbody');
//                     const newRow = document.createElement('tr');
//                     newRow.setAttribute('data-course-id', course.id);
//                     newRow.setAttribute('data-sks', course.sks);
//                     newRow.style.backgroundColor = '#23252A';

//                     const rowNumber = summaryTable.rows.length + 1;

//                     newRow.innerHTML = `
//         <td class="px-4 py-2 border-r border-white">${rowNumber}</td>
//         <td class="px-4 py-2 w-1/3 border-r border-white">${course.kode}</td>
//         <td class="px-4 py-2 w-1/3 border-r border-white">${course.nama}</td>
//         <td class="px-4 py-2 w-1/3 border-r border-white">${course.waktu}</td>
//         <td class="px-4 py-2 border-white">${course.sks}</td>
//     `;

//                     summaryTable.appendChild(newRow);
//                 }

//                 // Modified updateTotalSKS function to handle both addition and subtraction
//                 function updateTotalSKS(sksDelta) {
//                     const totalSksElement = document.getElementById('totalSks');
//                     const currentTotal = parseInt(totalSksElement.textContent || '0');
//                     const newTotal = currentTotal + sksDelta;
//                     totalSksElement.textContent = newTotal;

//                     // Show/hide the SKS sidebar based on total
//                     const sksSidebar = document.getElementById('sksSidebar');
//                     if (newTotal > 0) {
//                         sksSidebar.classList.add('show');
//                     } else {
//                         sksSidebar.classList.remove('show');
//                     }
//                 }
//             </script>