@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Detail Buku</h1>

    <div>
        <p><strong>Judul:</strong> {{ $book->title }}</p>

        <p><strong>Penulis:</strong> {{ $book->author }}</p>

        <p><strong>Tahun Terbit:</strong>
            {{ $book->publication_year }}
        </p>

        <p><strong>Kategori:</strong>
            {{ $book->category->name ?? '-' }}
        </p>

        <p><strong>Stok:</strong> {{ $book->stock }}</p>
    </div>

    <a href="{{ route('books.index') }}">
        Kembali
    </a>

    <a href="{{ route('books.edit', $book->id) }}">
        Edit Buku
    </a>

</div>

@endsection