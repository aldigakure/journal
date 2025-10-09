@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-door-open"></i> Tambah Kelas</h2>
    <a href="{{ route('classes.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('classes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Grade (contoh: 10A)</label>
                <input type="text" name="grade" class="form-control" value="{{ old('grade') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Siswa</label>
                <input type="number" name="student_count" class="form-control" value="{{ old('student_count') }}">
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
