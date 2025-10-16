@extends('layouts.app')

@section('title', 'Izin Sakit Guru')

@section('content')
    <div class="mb-4">
        <h2><i class="bi bi-file-medical"></i> Form Izin Sakit</h2>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('teacher-absences.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Guru</label>
                    @if(isset($selected_teacher_id) && $selected_teacher_id)
                        @php
                            $selectedTeacher = $teachers->firstWhere('id', $selected_teacher_id);
                        @endphp
                        <div class="form-control-plaintext">{{ $selectedTeacher?->name ?? 'Guru terpilih' }}</div>
                        <input type="hidden" name="teacher_id" value="{{ $selected_teacher_id }}">
                    @else
                        <select name="teacher_id" id="teacher_id" class="form-select">
                            @foreach($teachers as $t)
                                <option value="{{ $t->id }}"
                                    @if(old('teacher_id') == $t->id) selected @endif
                                >{{ $t->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Izin</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ old('date') ?: now()->toDateString() }}" required>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">Alasan (opsional)</label>
                    <textarea name="reason" id="reason" class="form-control">{{ old('reason') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim Izin</button>
                </div>
            </form>
        </div>
    </div>
@endsection
