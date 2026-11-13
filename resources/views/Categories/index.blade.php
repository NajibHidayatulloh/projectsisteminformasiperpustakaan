
@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

    <h1>Daftar Kategori</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('categories.create') }}">Tambah Kategori</a>

    <br><br>

    <table border="1" cellpadding="10"  width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('categories.destroy', $category->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
