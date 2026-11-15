
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Autentikasi') - Library Management</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Styling form login */
        .auth-card h1 {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .auth-card label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 8px;
        }

        .auth-card input {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .auth-card input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.15);
        }

        .auth-card button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .auth-card button[type="submit"]:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <!-- Logo / Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16
                        bg-blue-600 text-white rounded-2xl shadow-lg mb-4">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-9 h-9" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 6.253v13m0-13C10.832 5.477
                          9.246 5 7.5 5S4.168 5.477 3 6.253v13
                          C4.168 18.477 5.754 18 7.5 18s3.332.477
                          4.5 1.253m0-13C13.168 5.477 14.754
                          5 16.5 5S19.832 5.477 21 6.253v13
                          C19.832 18.477 18.246 18 16.5 18
                          s-3.332.477-4.5 1.253"/>
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-slate-800">
                Library Management
            </h1>

            <p class="text-sm text-slate-500 mt-2">
                Sistem Informasi Manajemen Perpustakaan
            </p>
        </div>

        <!-- Content -->
        <div class="auth-card bg-white rounded-2xl shadow-xl p-8">
            @yield('content')
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-slate-400 mt-6">
            &copy; {{ date('Y') }} Library Management. All rights reserved.
        </p>

    </div>

</body>
</html>
