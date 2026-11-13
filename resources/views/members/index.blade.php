
@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')

    <h1>Daftar Anggota</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('members.create') }}">Tambah Anggota</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->address }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('members.edit', $member->id) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        Belum ada data anggota.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
