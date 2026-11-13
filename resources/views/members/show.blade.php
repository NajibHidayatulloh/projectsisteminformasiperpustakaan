
@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')

    <h1>Detail Anggota</h1>

    <p>
        <strong>Nama:</strong>
        {{ $member->name }}
    </p>

    <p>
        <strong>Nomor Telepon:</strong>
        {{ $member->phone }}
    </p>

    <p>
        <strong>Alamat:</strong>
        {{ $member->address }}
    </p>

    <a href="{{ route('members.index') }}">Kembali</a>

    <a href="{{ route('members.edit', $member->id) }}">
        Edit Anggota
    </a>

@endsection
