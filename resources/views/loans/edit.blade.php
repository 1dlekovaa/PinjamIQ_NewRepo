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
            <label for="buku_id" class="form-label">Pilih Buku</label>
            <select name="buku_id" id="buku_id" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}" {{ $loan->buku_id == $buku->id ? 'selected' : '' }}>
                        {{ $buku->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrowed_at" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="borrowed_at" id="borrowed_at" class="form-control" value="{{ $loan->borrowed_at->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="due_at" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_at" id="due_at" class="form-control" value="{{ $loan->due_at->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Belum Dikembalikan" {{ $loan->status == 'Belum Dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                <option value="Sudah Dikembalikan" {{ $loan->status == 'Sudah Dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="returned_at" class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="returned_at" id="returned_at" class="form-control" value="{{ $loan->returned_at ? $loan->returned_at->format('Y-m-d') : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
