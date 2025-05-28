@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Peminjaman Buku</h2>

    <a href="{{ route('loans.create') }}" class="btn btn-success mb-3">Tambah Peminjaman Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->student->name }}</td>
                <td>{{ $loan->book->title }}</td>
                <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data peminjaman.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
