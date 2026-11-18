@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard Sistem Perpustakaan</h1>
    <p style="margin-bottom: 24px; color: #555;">
        Selamat datang, <strong>{{ auth()->user()->name }}</strong> ({{ ucfirst(auth()->user()->role) }}).
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
        <div style="background-color: #eff6ff; border-left: 5px solid #2563eb; padding: 20px; border-radius: 8px;">
            <p style="font-size: 14px; color: #1e40af; font-weight: bold;">Jumlah Judul Buku</p>
            <h2 style="font-size: 32px; color: #1e3a8a; margin-top: 8px;">{{ $totalBookTitles }}</h2>
        </div>

        <div style="background-color: #f0fdf4; border-left: 5px solid #16a34a; padding: 20px; border-radius: 8px;">
            <p style="font-size: 14px; color: #166534; font-weight: bold;">Total Stok Buku</p>
            <h2 style="font-size: 32px; color: #14532d; margin-top: 8px;">{{ $totalBookStock }}</h2>
        </div>

        <div style="background-color: #fefce8; border-left: 5px solid #ca8a04; padding: 20px; border-radius: 8px;">
            <p style="font-size: 14px; color: #854d0e; font-weight: bold;">Jumlah Anggota</p>
            <h2 style="font-size: 32px; color: #713f12; margin-top: 8px;">{{ $totalMembers }}</h2>
        </div>

        <div style="background-color: #fef2f2; border-left: 5px solid #dc2626; padding: 20px; border-radius: 8px;">
            <p style="font-size: 14px; color: #991b1b; font-weight: bold;">Peminjaman Berlangsung</p>
            <h2 style="font-size: 32px; color: #7f1d1d; margin-top: 8px;">{{ $activeBorrowings }}</h2>
        </div>
    </div>
@endsection