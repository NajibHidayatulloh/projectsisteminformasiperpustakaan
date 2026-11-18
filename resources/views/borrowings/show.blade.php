@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>

    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="card mb-4">
        <div class="card-header">
            Informasi Peminjaman
        </div>

        <div class="card-body">
            <p><strong>Anggota:</strong> {{ $borrowing->member->name ?? '-' }}</p>
            <p><strong>Petugas:</strong> {{ $borrowing->user->name ?? '-' }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $borrowing->borrow_date }}</p>
            <p><strong>Tanggal Jatuh Tempo:</strong> {{ $borrowing->due_date }}</p>
            <p><strong>Tanggal Kembali:</strong> {{ $borrowing->return_date ?? 'Belum dikembalikan' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($borrowing->status) }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Daftar Buku yang Dipinjam
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Jumlah Dipinjam</th>
                        <th>Stok Saat Ini</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($borrowing->details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->book->title ?? 'Buku tidak ditemukan' }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->book->stock ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Tidak ada buku dalam peminjaman ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection