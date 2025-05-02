@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Tambah Siswa</h4>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">← Kembali</a>
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

            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama siswa" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark fw-bold">Kelas</label>
                    <input type="text" name="class" class="form-control" placeholder="Masukkan kelas" required>
                </div>

                <button type="submit" class="btn btn-danger">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
