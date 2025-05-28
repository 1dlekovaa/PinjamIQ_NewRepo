<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    // Menampilkan semua peminjaman
    public function index()
    {
        $loans = Loan::with(['book', 'user'])->get();
        return view('loans.index', compact('loans'));
    }

    // Form untuk membuat peminjaman baru
    public function create()

    {
        $books = Book::where('available_quantity', '>', 0)->get();
        return view('loans.create', compact('books'));

         $students = Student::all();
        $books = Book::all();

    return view('loans.create', compact('students', 'books'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
        ]);

        $loan = Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
            'status' => 'pending',
        ]);

        // Kurangi stok buku
        $book = Book::find($request->book_id);
        $book->available_quantity -= 1;
        $book->save();

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil diajukan.');
    }
}
