<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Perpustakaan')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .navbar {
            background-color: #2563eb;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #dbeafe;
        }

        .main-content {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            min-height: 400px;
        }

        h1 {
            margin-bottom: 20px;
            color: #1e293b;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <h2>Sistem Perpustakaan</h2>

        <div>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('books.index') }}">Buku</a>
            <a href="{{ route('categories.index') }}">Kategori</a>
            <a href="{{ route('members.index') }}">Daftar Anggota</a>
            <a href="{{ route('borrowings.index') }}">Peminjaman</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}">Manajemen Pengguna</a>
            @endif

            @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="
                        background: transparent;
                        border: none;
                        color: white;
                        margin-left: 20px;
                        font-weight: bold;
                        cursor: pointer;
                        font-size: 16px;
                    ">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Konten halaman -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 Sistem Perpustakaan</p>
    </footer>

</body>
</html>