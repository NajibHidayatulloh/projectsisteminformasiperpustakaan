<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Buku</h1>

    <a href="{{ route('books.create') }}">Tambah Buku</a>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category_id }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->stock }}</td>
            <td>
                <a href="#">Detail</a>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>

</body>
</html>