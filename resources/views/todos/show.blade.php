@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Tugas</h5>
            <span class="badge {{ $todo->completed ? 'bg-success' : 'bg-warning' }}">
                {{ $todo->completed ? 'Selesai' : 'Belum Selesai' }}
            </span>
        </div>
        <div class="card-body">
            <h4>{{ $todo->title }}</h4>
            <p class="text-muted">Dibuat pada: {{ $todo->created_at->format('d M Y H:i') }}</p>
            
            <div class="mb-4">
                <h6>Deskripsi:</h6>
                <p>{{ $todo->description ?: 'Tidak ada deskripsi' }}</p>
            </div>

            <div class="mb-4">
                <h6>Kategori:</h6>
                <p>
                    @if($todo->category)
                        <span class="badge bg-info">{{ $todo->category }}</span>
                    @else
                        <span class="text-muted">Tidak ada kategori</span>
                    @endif
                </p>
            </div>

            <div class="mb-4">
                <h6>Deadline:</h6>
                <p>
                    @if($todo->deadline)
                        <span class="{{ \Carbon\Carbon::parse($todo->deadline)->isPast() && !$todo->completed ? 'text-danger' : '' }}">
                            {{ \Carbon\Carbon::parse($todo->deadline)->format('d M Y') }}
                        </span>
                    @else
                        <span class="text-muted">Tidak ada deadline</span>
                    @endif
                </p>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">Kembali</a>
                <div>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection