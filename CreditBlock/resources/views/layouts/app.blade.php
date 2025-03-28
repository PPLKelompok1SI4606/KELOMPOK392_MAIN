<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PinjamChain</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #001125;
            color: #D0EFFF;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 30px rgba(42, 157, 244, 0.3);
            border-color: #2A9DF4;
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
        }
        ::-webkit-scrollbar-track {
            background: #001125;
        }
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 16rem;
            z-index: 40;
            background: #001125;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.5);
        }
        .sidebar-menu {
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all 0.3s ease;
        }
        .sidebar-menu:hover {
            background: #2A9DF4;
            color: #001125;
            transform: translateX(5px);
        }
        .navbar {
            background: #001125;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        .navbar-button {
            background: #2A9DF4;
            color: #001125;
            padding: 0.5rem 1.5rem;
            border-radius: 9999px;
            transition: all 0.3s ease;
        }
        .navbar-button:hover {
            background: #D0EFFF;
            transform: scale(1.05);
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
    <!-- Navbar -->
    <header class="navbar sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto filter drop-shadow-lg transition-transform hover:scale-105">
                <span class="text-sky-blue font-bold text-xl tracking-wider">PinjamChain</span>
            </div>
            <div class="flex items-center space-x-6">
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="navbar-button font-semibold">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar dan Konten Utama -->
    <div class="flex min-h-screen">
        <!-- Sidebar (Fixed) -->
        <aside class="sidebar-fixed hidden md:block transition-all duration-300">
            <nav class="mt-24 px-4">
                <ul class="space-y-4">
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
                            <a href="#" class="flex items-center px-4 py-3 text-sky-blue hover:text-dark-blue sidebar-menu rounded-lg">
                                <i class="{{ $icons[$menu] }} mr-3 text-light-blue w-5"></i>
                                {{ $menu }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-6 lg:p-10 gradient-bg ml-0 md:ml-64">
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('block');
        });
    </script>
</body>
</html>
