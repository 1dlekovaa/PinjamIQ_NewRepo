@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Form Peminjaman Buku</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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
            <label for="buku_id" class="form-label">Pilih Buku</label>
            <select name="buku_id" id="buku_id" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }} (stok: {{ $buku->stok }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrowed_at" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="borrowed_at" id="borrowed_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="due_at" class="form-label">Tanggal Kembali</label>
            <input type="date" name="due_at" id="due_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Belum Dikembalikan" selected>Belum Dikembalikan</option>
                <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="returned_at" class="form-label">Tanggal Pengembalian (opsional)</label>
            <input type="date" name="returned_at" id="returned_at" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Pinjam</button>
    </form>
</div>
@endsection
