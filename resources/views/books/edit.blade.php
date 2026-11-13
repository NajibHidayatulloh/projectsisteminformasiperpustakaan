@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku</label>
            <input
                type="text"
                name="title"
                value="{{ $book->title }}"
            >
        </div>

        <div>
            <label>Penulis</label>
            <input
                type="text"
                name="author"
                value="{{ $book->author }}"
            >
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input
                type="number"
                name="publication_year"
                value="{{ $book->publication_year }}"
            >
        </div>

        <div>
            <label>Kategori</label>

            <select name="category_id">

                @foreach ($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ $book->category_id == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div>
            <label>Stok</label>
            <input
                type="number"
                name="stock"
                value="{{ $book->stock }}"
            >
        </div>

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>

    <a href="{{ route('books.index') }}">
        Kembali
    </a>

</div>

@endsection