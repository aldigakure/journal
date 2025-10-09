@extends('layouts.app')

@section('title', 'Edit Jurnal Mengajar')

@section('content')
<div class="mb-4">
    <h2><i class="bi bi-pencil-square"></i> Edit Jurnal Mengajar</h2>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('journals.update', $journal) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">Guru <span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <select name="teacher_id" id="teacher_id" class="form-select @error('teacher_id') is-invalid @enderror" {{ $teachers->isEmpty() ? 'disabled' : 'required' }}>
                                <option value="">-- Pilih Guru --</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $journal->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }} ({{ $teacher->nip }})
                                    </option>
                                @endforeach
                            </select>
                            <a href="{{ route('teachers.create') }}" class="btn btn-outline-secondary">Tambah Guru</a>
                        </div>
                        @if($teachers->isEmpty())
                            <div class="form-text text-danger">Belum ada data guru. Silakan tambahkan guru terlebih dahulu.</div>
                        @endif
                        @error('teacher_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <select name="subject_id" id="subject_id" class="form-select @error('subject_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ old('subject_id', $journal->subject_id) == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="class_id" id="class_id" class="form-select @error('class_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id', $journal->class_id) == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" 
                               value="{{ old('date', $journal->date->format('Y-m-d')) }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6 col-md-2">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                        <input type="time" name="start_time" id="start_time" class="form-control @error('start_time') is-invalid @enderror" 
                               value="{{ old('start_time', $journal->start_time) }}" required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6 col-md-2">
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                        <input type="time" name="end_time" id="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                               value="{{ old('end_time', $journal->end_time) }}" required>
                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Materi Pembelajaran <span class="text-danger">*</span></label>
                <input type="text" name="material" id="material" class="form-control @error('material') is-invalid @enderror" 
                       value="{{ old('material', $journal->material) }}" required>
                @error('material')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Kegiatan</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $journal->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="student_present" class="form-label">Jumlah Siswa Hadir <span class="text-danger">*</span></label>
                        <input type="number" name="student_present" id="student_present" class="form-control @error('student_present') is-invalid @enderror" 
                               value="{{ old('student_present', $journal->student_present) }}" min="0" required>
                        @error('student_present')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="student_absent" class="form-label">Jumlah Siswa Tidak Hadir <span class="text-danger">*</span></label>
                        <input type="number" name="student_absent" id="student_absent" class="form-control @error('student_absent') is-invalid @enderror" 
                               value="{{ old('student_absent', $journal->student_absent) }}" min="0" required>
                        @error('student_absent')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Tambahan</label>
                <textarea name="notes" id="notes" rows="2" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $journal->notes) }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex flex-wrap justify-content-end gap-2">
                <a href="{{ route('journals.index') }}" class="btn btn-secondary w-100 w-md-auto mb-2">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary w-100 w-md-auto" {{ $teachers->isEmpty() ? 'disabled' : '' }}>
                    <i class="bi bi-save"></i> Update Jurnal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection