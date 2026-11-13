@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h1>Tambah Anggota</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama:</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <br>

        <div>
            <label>No. Telepon:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>
        <br>

        <div>
            <label>Alamat:</label><br>
            <textarea name="address" rows="3">{{ old('address') }}</textarea>
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection