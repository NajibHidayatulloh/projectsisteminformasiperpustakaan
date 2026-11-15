
@extends('layouts.auth')

@section('title', 'Login Perpustakaan')

@section('content')

    <h1>Login Sistem Perpustakaan</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label><br>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
            >
        </div>
        <br>

        <div>
            <label for="password">Password</label><br>
            <input
                type="password"
                name="password"
                id="password"
                required
            >
        </div>
        <br>

        <button type="submit">Login</button>
    </form>

@endsection
