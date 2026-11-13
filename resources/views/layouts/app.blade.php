
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

        /* Navbar */
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

        /* Konten utama */
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

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h2>Sistem Perpustakaan</h2>

        <div>
            <a href="{{ route('books.index') }}">Buku</a>
            <a href="{{ route('categories.index') }}">Kategori</a>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Sistem Perpustakaan</p>
    </footer>

</body>
</html>
