@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white">Daftar Siswa</h4>
        <a href="{{ route('students.create') }}" class="btn btn-danger">+ Tambah Siswa</a>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td><p class="text-sm font-weight-bold mb-0 ms-3">{{ $student->name }}</p></td>
                                            <td><p class="text-sm font-weight-bold mb-0">{{ $student->class }}</p></td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('students.edit', $student->id) }}" class="text-secondary font-weight-bold text-xs me-2">Edit</a>
                                                |
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger font-weight-bold text-xs border-0 bg-transparent ms-2" onclick="return confirm('Yakin ingin menghapus?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-sm text-secondary py-4">Belum ada data siswa.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</div>
@endsection
