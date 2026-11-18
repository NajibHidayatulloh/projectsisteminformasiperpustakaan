
@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

    <h1>Data Peminjaman</h1>

    <a href="{{ route('borrowings.create') }}">
        Tambah Peminjaman
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->id }}</td>
                    <td>{{ $borrowing->member->name }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->borrow_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->status }}</td>
                    <td>
                         <a href="{{ route('borrowings.show', $borrowing->id) }}"> Detail</a>
    @if ($borrowing->status === 'borrowed')
        <form
            action="{{ route('borrowings.return', $borrowing->id) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')"
        >
            @csrf
            @method('PATCH')

            <button type="submit">Kembalikan</button>
        </form>
    @else
        Sudah dikembalikan
    @endif
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        Belum ada data peminjaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
