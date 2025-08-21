@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Tugas</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $todo->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $todo->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Pilih Kategori</option>
                        <option value="Pekerjaan" {{ old('category', $todo->category) == 'Pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
                        <option value="Pribadi" {{ old('category', $todo->category) == 'Pribadi' ? 'selected' : '' }}>Pribadi</option>
                        <option value="Pendidikan" {{ old('category', $todo->category) == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="Lainnya" {{ old('category', $todo->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Tenggat Waktu</label>
                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline', $todo->deadline ? $todo->deadline->format('Y-m-d') : '') }}">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="completed" name="completed" {{ $todo->completed ? 'checked' : '' }}>
                    <label class="form-check-label" for="completed">Selesai</label>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection