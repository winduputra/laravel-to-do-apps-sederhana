@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Tugas</h5>
            <a href="{{ route('todos.create') }}" class="btn btn-primary">Tambah Tugas</a>
        </div>
        <div class="card-body">
            <!-- Form Pencarian dan Filter -->
            <form action="{{ route('todos.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari tugas..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="category" class="form-select">
                            <option value="">Semua Kategori</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>

            @if(count($todos) > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ route('todos.index', array_merge(request()->all(), ['sort' => 'title', 'direction' => request('direction') == 'asc' && request('sort') == 'title' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Judul
                                        @if(request('sort') == 'title')
                                            <i class="bi bi-arrow-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Deskripsi</th>
                                <th>
                                    <a href="{{ route('todos.index', array_merge(request()->all(), ['sort' => 'category', 'direction' => request('direction') == 'asc' && request('sort') == 'category' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Kategori
                                        @if(request('sort') == 'category')
                                            <i class="bi bi-arrow-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Status</th>
                                <th>
                                    <a href="{{ route('todos.index', array_merge(request()->all(), ['sort' => 'deadline', 'direction' => request('direction') == 'asc' && request('sort') == 'deadline' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Deadline
                                        @if(request('sort') == 'deadline')
                                            <i class="bi bi-arrow-{{ request('direction') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('todos.index', array_merge(request()->all(), ['sort' => 'created_at', 'direction' => request('direction') == 'asc' && request('sort') == 'created_at' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Dibuat Pada
                                        @if(request('sort') == 'created_at' || !request('sort'))
                                            <i class="bi bi-arrow-{{ request('direction', 'desc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($todo->description, 30) }}</td>
                                    <td>
                                        @if($todo->category)
                                            <span class="badge bg-info">{{ $todo->category }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($todo->completed)
                                            <span class="badge bg-success">Selesai</span>
                                        @else
                                            <span class="badge bg-warning">Belum Selesai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($todo->deadline)
                                            <span class="{{ \Carbon\Carbon::parse($todo->deadline)->isPast() && !$todo->completed ? 'text-danger' : '' }}">
                                                {{ \Carbon\Carbon::parse($todo->deadline)->format('d M Y') }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $todo->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger" value="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    Belum ada tugas. Silakan tambahkan tugas baru.
                </div>
            @endif
        </div>
    </div>
@endsection