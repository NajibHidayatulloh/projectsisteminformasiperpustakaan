
@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

    <h1>Tambah Peminjaman</h1>

    <form>
        <label>Anggota</label>
        <select name="member_id">
            @foreach ($members as $member)
                <option value="{{ $member->id }}">
                    {{ $member->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Buku</label>
        <select name="book_id">
            @foreach ($books as $book)
                <option value="{{ $book->id }}">
                    {{ $book->title }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Jumlah</label>
        <input type="number" name="quantity" min="1" value="1">

        <br><br>

        <label>Tanggal Pinjam</label>
        <input type="date" name="borrow_date">

        <br><br>

        <button type="button" disabled>
            Simpan (Tugas 25)
        </button>
    </form>

@endsection
