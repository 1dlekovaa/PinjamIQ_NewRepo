<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Buku;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    // Tampilkan semua data peminjaman
    public function index()
    {
        $loans = Loan::with(['buku', 'student', 'user'])->get();
        return view('loans.index', compact('loans'));
    }

    // Tampilkan form untuk membuat peminjaman
    public function create()
    {
        $students = Student::all();
        $bukus = Buku::where('stok', '>', 0)->get();

        return view('loans.create', compact('students', 'bukus'));
    }

    // Simpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'buku_id' => 'required|exists:bukus,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        $loan = Loan::create([
            'student_id'  => $request->student_id,
            'buku_id'     => $request->buku_id,
            'borrowed_at' => $request->borrowed_at,
            'due_at'      => $request->due_at,
            'status'      => 'Belum Dikembalikan',
            'user_id'     => Auth::id(), // Petugas yang mencatat
        ]);

        $buku->stok -= 1;
        $buku->save();

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil diajukan.');
    }

    // Tampilkan form edit peminjaman
    public function edit($id)
    {
        $loan = Loan::findOrFail($id);
        $students = Student::all();
        $bukus = Buku::all();

        return view('loans.edit', compact('loan', 'students', 'bukus'));
    }

    // Update data peminjaman
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'buku_id' => 'required|exists:bukus,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
            'status' => 'required|in:Belum Dikembalikan,Sudah Dikembalikan',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        $loan = Loan::findOrFail($id);
        $oldBukuId = $loan->buku_id;

        // Jika buku diganti, update stok
        if ($request->buku_id != $oldBukuId) {
            $oldBuku = Buku::find($oldBukuId);
            $oldBuku->stok += 1;
            $oldBuku->save();

            $newBuku = Buku::find($request->buku_id);
            if ($newBuku->stok < 1) {
                return redirect()->back()->with('error', 'Stok buku baru tidak mencukupi.');
            }
            $newBuku->stok -= 1;
            $newBuku->save();
        }

        // Jika status sudah dikembalikan dan sebelumnya belum, tambah stok buku
        if ($request->status == 'Sudah Dikembalikan' && $loan->status != 'Sudah Dikembalikan') {
            $buku = Buku::find($request->buku_id);
            $buku->stok += 1;
            $buku->save();
        }

        $loan->update([
            'student_id' => $request->student_id,
            'buku_id' => $request->buku_id,
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
            'status' => $request->status,
            'returned_at' => $request->returned_at,
        ]);

        return redirect()->route('loans.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    // Hapus data peminjaman
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);

        // Kembalikan stok buku jika belum dikembalikan
        if ($loan->status == 'Belum Dikembalikan') {
            $buku = $loan->buku;
            $buku->stok += 1;
            $buku->save();
        }

        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
