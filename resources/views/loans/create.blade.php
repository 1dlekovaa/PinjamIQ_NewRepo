@extends('layouts.app') {{-- Ganti sesuai layout kamu --}}

@section('content')
<div class="container mt-4">
    <h2>Form Peminjaman Buku</h2>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="student_id" class="form-label">Pilih Siswa</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Pilih Buku</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="loan_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Pinjam</button>
    </form>
</div>
@endsection
