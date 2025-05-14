@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Tambah Buku</h4>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>

    <div class="card">
        <div class="card-body px-4 py-4">
            @if ($errors->any())
                <div class="alert alert-danger text-white">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" placeholder="Masukkan nama pengarang" value="{{ old('pengarang') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" placeholder="Masukkan nama penerbit" value="{{ old('penerbit') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Tahun</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Masukkan tahun terbit" value="{{ old('tahun') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Masukkan kategori buku" value="{{ old('kategori') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" value="{{ old('stok') }}" required>
                </div>

                <button type="submit" class="btn btn-danger">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
