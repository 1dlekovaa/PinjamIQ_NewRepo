@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Daftar Peminjaman Buku</h4>
        <a href="{{ route('loans.create') }}" class="btn btn-danger">+ Tambah Peminjaman</a>
    </div>

    <div class="card">
        <div class="card-body pt-2 px-0 pb-2">

            @if(session('success'))
                <div class="alert alert-success text-white mx-3 mt-3">{{ session('success') }}</div>
            @endif

            <div class="table-responsive px-3 pt-0 pb-2">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pinjam</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Petugas</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($loans as $loan)
                            <tr>
                                <td><p class="text-sm font-weight-bold mb-0 ms-3">{{ $loop->iteration }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $loan->student->name }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $loan->buku->judul }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $loan->borrowed_at->format('d-m-Y') }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $loan->status }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $loan->user ? $loan->user->name : '-' }}</p></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('loans.edit', $loan->id) }}" class="text-secondary font-weight-bold text-xs me-2">Edit</a>
                                    |
                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger font-weight-bold text-xs border-0 bg-transparent ms-2" onclick="return confirm('Yakin hapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-sm text-secondary py-4">Data peminjaman kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
