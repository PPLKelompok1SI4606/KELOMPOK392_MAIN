<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CreditBlock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #001125;
            color: #D0EFFF;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            margin: 0;
        }
        .gradient-bg {
            background: linear-gradient(145deg, #001125 0%, #2A9DF4 150%);
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #2A9DF4;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(42, 157, 244, 0.5);
        }
        ::-webkit-scrollbar-track {
            background: #001125;
        }
        /* Navbar Fixed */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(90deg, #001125 0%, #0a1b33 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            z-index: 50;
            border-bottom: 1px solid rgba(42, 157, 244, 0.2);
        }
        /* Sidebar Fixed */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 16rem;
            background: linear-gradient(180deg, #001125 0%, #0a1b33 100%);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.5);
            z-index: 40;
            border-right: 1px solid rgba(42, 157, 244, 0.2);
        }
        .sidebar-menu {
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            color: #D0EFFF;
            font-weight: 600;
        }
        .sidebar-menu:hover {
            background: #2A9DF4;
            color: #001125;
            transform: translateX(8px);
            box-shadow: 0 0 15px rgba(42, 157, 244, 0.5);
        }
        .navbar-button {
            position: relative;
            background: #2A9DF4;
            color: #001125;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .navbar-button:hover {
            background: #D0EFFF;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(42, 157, 244, 0.7);
        }
        .navbar-button::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            border: 1px solid rgba(42, 157, 244, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .navbar-button:hover::after {
            opacity: 1;
        }
        /* Konten Utama */
        .content-wrapper {
            padding-top: 5rem; /* Sesuaikan dengan tinggi navbar */
            padding-left: 17rem; /* Sesuaikan dengan lebar sidebar */
            min-height: 100vh;
        }
        /* Hover Card */
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(42, 157, 244, 0.3);
            border-color: #2A9DF4;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'dark-blue': '#001125',
                        'light-blue': '#2A9DF4',
                        'sky-blue': '#D0EFFF',
                    }
                }
            }
        }
    </script>
</head>
<body class="antialiased">
    <!-- Navbar Fixed -->
    <header class="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto filter drop-shadow-[0_0_8px_rgba(42,157,244,0.5)] transition-transform hover:scale-105">
                <span class="text-sky-blue font-bold text-2xl tracking-widest uppercase drop-shadow-md">CreditBlock</span>
            </div>
            <div class="flex items-center space-x-6">
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="navbar-button">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar dan Konten Utama -->
    <div class="flex content-wrapper">
        <!-- Sidebar Fixed -->
        <aside class="sidebar-fixed">
            <nav class="mt-24 px-4">
                <ul class="space-y-3">
                    @php
                        $icons = [
                            'Dashboard' => 'fas fa-tachometer-alt',
                            'Ajukan Pinjaman' => 'fas fa-hand-holding-usd',
                            'Profil' => 'fas fa-user',
                            'Riwayat Pembayaran' => 'fas fa-history',
                            'Kontak Dukungan' => 'fas fa-headset'
                        ];
                    @endphp
                    @foreach (['Dashboard', 'Ajukan Pinjaman', 'Profil', 'Riwayat Pembayaran', 'Kontak Dukungan'] as $menu)
                        <li>
                            <a href="#" class="sidebar-menu">
                                <i class="{{ $icons[$menu] }} mr-3 text-light-blue w-5 drop-shadow-[0_0_5px_rgba(42,157,244,0.5)]"></i>
                                {{ $menu }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-8 gradient-bg">
            @yield('content')
        </main>
    </div>
</body>
</html>
