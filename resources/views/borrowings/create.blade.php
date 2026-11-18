@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

    <h1>Tambah Peminjaman</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div>
            <label>Anggota</label><br>
            <select name="member_id">
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Buku</label><br>
            <select name="book_id">
                <option value="">-- Pilih Buku --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" @selected(old('book_id') == $book->id)>
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
            @error('book_id')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Jumlah</label><br>
            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}">
            @error('quantity')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Tanggal Pinjam</label><br>
            <input type="date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}">
            @error('borrow_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('borrowings.index') }}">Batal</a>
    </form>

@endsection