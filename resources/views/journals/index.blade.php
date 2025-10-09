@extends('layouts.app')

@section('title', 'Daftar Jurnal Mengajar')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-2">
    <h2><i class="bi bi-book"></i> Daftar Jurnal Mengajar</h2>
    <a href="{{ route('journals.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Jurnal
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Waktu</th>
                        <th>Materi</th>
                        <th>Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($journals as $index => $journal)
                    <tr>
                        <td>{{ $journals->firstItem() + $index }}</td>
                        <td>{{ $journal->date->format('d/m/Y') }}</td>
                        <td>{{ $journal->teacher->name }}</td>
                        <td>{{ $journal->subject->name }}</td>
                        <td>{{ $journal->classRoom->name }}</td>
                        <td>{{ $journal->start_time }} - {{ $journal->end_time }}</td>
                        <td>{{ Str::limit($journal->material, 30) }}</td>
                        <td>
                            <span class="badge bg-success">Hadir: {{ $journal->student_present }}</span>
                            <span class="badge bg-danger">Tidak: {{ $journal->student_absent }}</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column flex-sm-row gap-1">
                                <a href="{{ route('journals.show', $journal) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('journals.edit', $journal) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('journals.destroy', $journal) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus" 
                                            onclick="return confirm('Yakin ingin menghapus jurnal ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-2">Belum ada data jurnal</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $journals->links() }}
        </div>
    </div>
</div>
@endsection