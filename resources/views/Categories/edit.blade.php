<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

    <h1>Edit Kategori</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kategori</label>
        <input type="text"
               name="name"
               value="{{ old('name', $category->name) }}">

        <button type="submit">Update</button>
    </form>

    <br>

    <a href="{{ route('categories.index') }}">Kembali</a>

</body>
</html>