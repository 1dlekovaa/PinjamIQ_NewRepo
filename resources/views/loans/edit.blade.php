@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Peminjaman Buku</h2>

    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Pilih Siswa</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $loan->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Pilih Buku</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="loan_date" class="form-control" value="{{ $loan->loan_date->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
