<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <p>
            <label for="title">Judul</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title') <br><small style="color:red">{{ $message }}</small> @enderror
        </p>

        <p>
            <label for="author">Penulis</label><br>
            <input type="text" name="author" id="author" value="{{ old('author') }}">
            @error('author') <br><small style="color:red">{{ $message }}</small> @enderror
        </p>

        <p>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <br><small style="color:red">{{ $message }}</small> @enderror
        </p>

        <p>
            <label for="year">Tahun Terbit</label><br>
            <input type="number" name="year" id="year" value="{{ old('year') }}">
            @error('year') <br><small style="color:red">{{ $message }}</small> @enderror
        </p>

        <p>
            <label for="stock">Stok</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}">
            @error('stock') <br><small style="color:red">{{ $message }}</small> @enderror
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>

</body>
</html>