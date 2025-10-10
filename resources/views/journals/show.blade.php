@extends('layouts.app')

@section('title', 'Detail Jurnal Mengajar')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-eye"></i> Detail Jurnal Mengajar</h2>
        <div class="btn-group">
            <a href="{{ route('journals.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('journals.edit', $journal) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Tanggal</dt>
                <dd class="col-sm-9">{{ $journal->date->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Guru</dt>
                <dd class="col-sm-9">{{ $journal->teacher->name ?? $journal->teacher_name }}</dd>

                <dt class="col-sm-3">Mata Pelajaran</dt>
                <dd class="col-sm-9">{{ $journal->subject->name ?? $journal->subject_name }}</dd>

                <dt class="col-sm-3">Kelas</dt>
                <dd class="col-sm-9">{{ $journal->classRoom->name ?? $journal->class_name }}</dd>

                <dt class="col-sm-3">Waktu</dt>
                <dd class="col-sm-9">{{ $journal->start_time }} - {{ $journal->end_time }}</dd>

                <dt class="col-sm-3">Materi</dt>
                <dd class="col-sm-9">{{ $journal->material }}</dd>

                <dt class="col-sm-3">Deskripsi</dt>
                <dd class="col-sm-9">{{ $journal->description ?? '-' }}</dd>

                <dt class="col-sm-3">Kehadiran</dt>
                <dd class="col-sm-9">
                    <span class="badge bg-success">Hadir: {{ $journal->student_present }}</span>
                    <span class="badge bg-danger">Tidak: {{ $journal->student_absent }}</span>
                </dd>

                <dt class="col-sm-3">Catatan</dt>
                <dd class="col-sm-9">{{ $journal->notes ?? '-' }}</dd>
            </dl>
        </div>
    </div>
@endsection
