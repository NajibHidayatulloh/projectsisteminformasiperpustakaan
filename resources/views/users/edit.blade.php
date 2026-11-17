
@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nama</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="password">Password Baru</label>
            <input type="password" id="password" name="password">
            <small>Kosongkan jika tidak ingin mengubah password.</small>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" id="password_confirmation"
                   name="password_confirmation">
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="admin"
                    {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
                <option value="petugas"
                    {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                    Petugas
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('users.index') }}">Kembali</a>
    </form>
</div>
@endsection
