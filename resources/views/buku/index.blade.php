@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Daftar Buku</h4>
        <a href="{{ route('buku.create') }}" class="btn btn-danger">+ Tambah Buku</a>
    </div>

    <div class="card">
        <div class="card-body pt-2 px-0 pb-2">

            @if (session('success'))
                <div class="alert alert-success text-white mx-3 mt-3">{{ session('success') }}</div>
            @endif

            <div class="table-responsive px-3 pt-0 pb-2">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengarang</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerbit</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukus as $item)  <!-- Ganti $buku menjadi $bukus -->
                            <tr>
                                <td><p class="text-sm font-weight-bold mb-0 ms-3">{{ $item->judul }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $item->pengarang }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $item->penerbit }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $item->tahun }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $item->kategori }}</p></td>
                                <td><p class="text-sm font-weight-bold mb-0">{{ $item->stok }}</p></td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('buku.edit', $item->id) }}" class="text-secondary font-weight-bold text-xs me-2">Edit</a>
                                    |
                                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger font-weight-bold text-xs border-0 bg-transparent ms-2" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-sm text-secondary py-4">Belum ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
