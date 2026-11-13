
@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

    <h1>Edit Anggota</h1>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Nama Anggota</label><br>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $member->name) }}"
            >

            @error('name')
                <br><small style="color:red">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="phone">Nomor Telepon</label><br>
            <input
                type="text"
                name="phone"
                id="phone"
                value="{{ old('phone', $member->phone) }}"
            >

            @error('phone')
                <br><small style="color:red">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="address">Alamat</label><br>
            <textarea name="address" id="address">{{ old('address', $member->address) }}</textarea>

            @error('address')
                <br><small style="color:red">{{ $message }}</small>
            @enderror
        </p>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('members.index') }}">Batal</a>

    </form>

@endsection
