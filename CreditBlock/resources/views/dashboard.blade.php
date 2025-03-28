@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Notifikasi -->
    @if (session('notification'))
        {{-- <div class="bg-[#001125] border-l-4 border-light-blue text-sky-blue p-4 mb-8 rounded-r-lg shadow-lg animate-slide-in"> --}}
            {{-- <p>{{ session('notification') }}</p> --}}
        </div>
    @endif

    <h1 class="text-4xl font-bold text-sky-blue mb-10 drop-shadow-lg tracking-wide animate-fade-in">Dashboard</h1>

<!-- Card MetaMask/Wallet -->
<div class="bg-[#001125] border border-light-blue/20 rounded-xl shadow-2xl p-6 mb-10 card-hover transition-all duration-300">
    <div class="relative bg-gradient-to-br from-[#001125] via-[#0a1b33] to-[#1a2a44] rounded-lg p-6 text-white shadow-[0_0_20px_rgba(42,157,244,0.2)] overflow-hidden">
        <!-- Header Card -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <h3 class="text-xl font-bold text-sky-blue tracking-wider uppercase drop-shadow-md">MetaMask Wallet</h3>
                <p class="text-sm text-gray-400 mt-1 flex items-center">
                    <span class="mr-2 text-light-blue"><i class="fas fa-wallet"></i></span>
                    Saldo: <span class="font-semibold text-light-blue">0.025 ETH</span>
                </p>
            </div>
            <img src="https://metamask.io/images/metamask-logo.png" alt="MetaMask Logo" class="h-12 w-auto filter drop-shadow-[0_0_8px_rgba(42,157,244,0.5)]">
        </div>

        <!-- Alamat Wallet -->
        <div class="mt-2 bg-[#0a1b33]/50 p-3 rounded-md border border-light-blue/10">
            <p class="text-sm text-gray-300 flex items-center">
                <span class="mr-2 text-light-blue"><i class="fas fa-address-card"></i></span>
                Alamat: <span class="font-mono text-light-blue ml-1 truncate">0x123...abc</span>
            </p>
        </div>

        <!-- Tombol dan Indikator -->
        <div class="mt-6 flex items-center space-x-4">
            <button id="connect-metamask" class="relative bg-light-blue text-[#001125] px-5 py-2 rounded-full font-semibold text-sm uppercase tracking-wide transition-all duration-300 hover:bg-light-blue/90 hover:shadow-[0_0_15px_rgba(42,157,244,0.7)]">
                Hubungkan Wallet
                <span class="absolute inset-0 rounded-full border border-light-blue/50 opacity-0 hover:opacity-100 transition-opacity duration-300"></span>
            </button>
            <span id="wallet-indicator" class="h-3 w-3 bg-red-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(239,68,68,0.8)]" title="Wallet belum terkoneksi"></span>
        </div>

        <!-- Elemen Dekoratif Futuristik -->
        <div class="absolute top-0 left-0 h-1 w-20 bg-gradient-to-r from-transparent via-light-blue to-transparent opacity-50"></div>
        <div class="absolute bottom-0 right-0 h-32 w-32 bg-light-blue rounded-full opacity-10 -mr-16 -mb-16 transform scale-150"></div>
    </div>
</div>

<!-- Grafik Tren Riwayat Pembayaran -->
<div class="bg-[#001125] border border-light-blue/20 rounded-xl shadow-[0_0_20px_rgba(42,157,244,0.15)] p-6 mb-10 card-hover transition-all duration-500">
    <div class="relative bg-gradient-to-br from-[#001125] via-[#0a1b33] to-[#1a2a44] rounded-lg p-6 overflow-hidden">
        <h2 class="text-2xl font-bold text-sky-blue mb-6 tracking-wider uppercase drop-shadow-md">Tren Riwayat Pembayaran</h2>
        <canvas id="paymentTrendChart" class="w-full h-80"></canvas>
        <!-- Elemen Dekoratif -->
        <div class="absolute top-0 left-0 h-1 w-24 bg-gradient-to-r from-transparent via-light-blue to-transparent opacity-50"></div>
        <div class="absolute bottom-0 right-0 h-32 w-32 bg-light-blue rounded-full opacity-10 -mr-16 -mb-16 transform scale-150"></div>
    </div>
</div>

<!-- Card Horizontal -->
<div class="grid grid-cols-2 gap-6 mb-10">
    <!-- Card Status Pinjaman -->
    <div class="bg-[#001125] border border-light-blue/20 rounded-xl shadow-[0_0_20px_rgba(42,157,244,0.15)] p-6 card-hover transition-all duration-500">
        <div class="relative bg-gradient-to-br from-[#001125] via-[#0a1b33] to-[#1a2a44] rounded-lg p-6 overflow-hidden">
            <!-- Header Card -->
            <div class="flex items-center space-x-4 mb-4">
                <i class="fas fa-money-bill-wave text-3xl text-sky-blue filter drop-shadow-[0_0_8px_rgba(42,157,244,0.5)]"></i>
                <div>
                    <h3 class="text-sm font-bold text-sky-blue tracking-wider uppercase drop-shadow-md">Pinjaman Saya</h3>
                    <p class="text-2xl font-extrabold text-light-blue mt-1">Rp {{ number_format(5000000, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Detail -->
            <div class="mt-2 space-y-3">
                <p class="text-sky-blue text-sm flex items-center">
                    <span class="mr-2 text-light-blue"><i class="fas fa-money-check-alt"></i></span>
                    Cicilan Berikutnya:
                    <span class="text-light-blue font-semibold ml-1">Rp {{ number_format(1000000, 0, ',', '.') }}</span>
                    <span class="text-gray-400 ml-1">- 5 Apr 2025</span>
                </p>
                <p class="text-sky-blue text-sm flex items-center">
                    <span class="mr-2 text-light-blue"><i class="fas fa-circle-notch"></i></span>
                    Status:
                    <span class="inline-block bg-green-500/20 text-green-300 text-xs font-semibold px-3 py-1 rounded-full ml-2 shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                        Aktif
                    </span>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center space-x-4">
                <button class="relative bg-light-blue text-[#001125] px-5 py-2 rounded-full font-semibold text-sm uppercase tracking-wide transition-all duration-300 hover:bg-light-blue/90 hover:shadow-[0_0_15px_rgba(42,157,244,0.7)]">
                    Bayar Cicilan
                    <span class="absolute inset-0 rounded-full border border-light-blue/50 opacity-0 hover:opacity-100 transition-opacity duration-300"></span>
                </button>
                <a href="#" class="relative text-sky-blue text-sm font-semibold uppercase tracking-wide transition-all duration-300 hover:text-light-blue group">
                    Lihat Detail
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-light-blue transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>
            </div>

            <!-- Elemen Dekoratif -->
            <div class="absolute top-0 left-0 h-1 w-20 bg-gradient-to-r from-transparent via-light-blue to-transparent opacity-50"></div>
            <div class="absolute bottom-0 right-0 h-24 w-24 bg-light-blue rounded-full opacity-10 -mr-12 -mb-12 transform scale-150"></div>
        </div>
    </div>

    <!-- Card Status Pengajuan -->
    <div class="bg-[#001125] border border-light-blue/20 rounded-xl shadow-[0_0_20px_rgba(42,157,244,0.15)] p-6 card-hover transition-all duration-500">
        <div class="relative bg-gradient-to-br from-[#001125] via-[#0a1b33] to-[#1a2a44] rounded-lg p-6 overflow-hidden">
            <!-- Header Card -->
            <div class="flex items-center space-x-4 mb-4">
                <i class="fas fa-file-alt text-3xl text-sky-blue filter drop-shadow-[0_0_8px_rgba(42,157,244,0.5)]"></i>
                <div>
                    <h3 class="text-sm font-bold text-sky-blue tracking-wider uppercase drop-shadow-md">Pengajuan Pinjaman</h3>
                    <p class="text-2xl font-extrabold text-light-blue mt-1">Rp {{ number_format(10000000, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Detail -->
            <div class="mt-2 space-y-3">
                <p class="text-sky-blue text-sm flex items-center">
                    <span class="mr-2 text-light-blue"><i class="fas fa-hourglass-half"></i></span>
                    Status:
                    <span class="inline-block bg-yellow-500/20 text-yellow-300 text-xs font-semibold px-3 py-1 rounded-full ml-2 shadow-[0_0_10px_rgba(234,179,8,0.5)]">
                        Menunggu
                    </span>
                </p>
                <p class="text-sky-blue text-sm flex items-center">
                    <span class="mr-2 text-light-blue"><i class="fas fa-calendar-alt"></i></span>
                    Jangka Waktu: <span class="text-light-blue font-semibold ml-1">12 Bulan</span>
                </p>
            </div>

            <!-- Action Link -->
            <div class="mt-6">
                <a href="#" class="relative text-sky-blue text-sm font-semibold uppercase tracking-wide transition-all duration-300 hover:text-light-blue group">
                    Lihat Status
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-light-blue transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </a>
            </div>

            <!-- Elemen Dekoratif -->
            <div class="absolute top-0 left-0 h-1 w-20 bg-gradient-to-r from-transparent via-light-blue to-transparent opacity-50"></div>
            <div class="absolute bottom-0 right-0 h-24 w-24 bg-light-blue rounded-full opacity-10 -mr-12 -mb-12 transform scale-150"></div>
        </div>
    </div>
</div>

<!-- Tabel Riwayat Pembayaran -->
<div class="bg-[#001125] border border-light-blue/20 rounded-xl shadow-[0_0_20px_rgba(42,157,244,0.15)] p-6 transition-all duration-500 card-hover">
    <div class="relative bg-gradient-to-br from-[#001125] via-[#0a1b33] to-[#1a2a44] rounded-lg p-6 overflow-hidden">
        <!-- Header -->
        <h2 class="text-xl font-bold text-sky-blue mb-6 tracking-wider uppercase drop-shadow-md">Riwayat Pembayaran</h2>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full text-sky-blue text-sm">
                <thead>
                    <tr class="bg-light-blue/10 text-[#D0EFFF] shadow-[0_2px_10px_rgba(42,157,244,0.2)]">
                        <th class="px-6 py-4 text-left rounded-tl-lg font-semibold uppercase tracking-wide">Tanggal</th>
                        <th class="px-6 py-4 text-left font-semibold uppercase tracking-wide">Nominal</th>
                        <th class="px-6 py-4 text-left rounded-tr-lg font-semibold uppercase tracking-wide">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-light-blue/10 hover:bg-light-blue/20 transition-all duration-300">
                        <td class="px-6 py-4 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-light-blue"></i>
                            1 Mar 2025
                        </td>
                        <td class="px-6 py-4 font-mono">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-500/20 text-green-300 text-xs font-semibold px-3 py-1 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                                Lunas
                            </span>
                        </td>
                    </tr>
                    <tr class="border-b border-light-blue/10 hover:bg-light-blue/20 transition-all duration-300">
                        <td class="px-6 py-4 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-light-blue"></i>
                            1 Feb 2025
                        </td>
                        <td class="px-6 py-4 font-mono">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-500/20 text-green-300 text-xs font-semibold px-3 py-1 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                                Lunas
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-light-blue/20 transition-all duration-300">
                        <td class="px-6 py-4 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-light-blue"></i>
                            1 Jan 2025
                        </td>
                        <td class="px-6 py-4 font-mono">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-green-500/20 text-green-300 text-xs font-semibold px-3 py-1 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.5)]">
                                Lunas
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Links -->
        <div class="mt-6 flex items-center space-x-6">
            <a href="#" class="relative text-sky-blue text-sm font-semibold uppercase tracking-wide transition-all duration-300 hover:text-light-blue group">
                Lihat Semua
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-light-blue transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
            <a href="#" class="relative text-sky-blue text-sm font-semibold uppercase tracking-wide transition-all duration-300 hover:text-light-blue group">
                Cetak Laporan (PDF)
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-light-blue transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
        </div>

        <!-- Elemen Dekoratif -->
        <div class="absolute top-0 left-0 h-1 w-24 bg-gradient-to-r from-transparent via-light-blue to-transparent opacity-50"></div>
        <div class="absolute bottom-0 right-0 h-32 w-32 bg-light-blue rounded-full opacity-10 -mr-16 -mb-16 transform scale-150"></div>
    </div>
</div>
</div>

<!-- Chart.js CDN dan Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('paymentTrendChart').getContext('2d');
    const paymentTrendChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan 2025', 'Feb 2025', 'Mar 2025','April 2025'],
            datasets: [{
                label: 'Jumlah Pembayaran (Rp)',
                data: [1500000, 1600000, 1700000,1600000],
                borderColor: '#2A9DF4',
                backgroundColor: 'rgba(42, 157, 244, 0.1)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#D0EFFF',
                pointBorderColor: '#2A9DF4',
                pointRadius: 6,
                pointHoverRadius: 8,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    grid: { color: 'rgba(42, 157, 244, 0.1)' },
                    ticks: { color: '#D0EFFF', font: { size: 12 } }
                },
                y: {
                    grid: { color: 'rgba(42, 157, 244, 0.1)' },
                    ticks: { color: '#D0EFFF', beginAtZero: true, font: { size: 12 } }
                }
            },
            plugins: {
                legend: { labels: { color: '#D0EFFF', font: { size: 14 } } }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideIn {
        from { transform: translateX(-100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    .animate-fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    .animate-slide-in {
        animation: slideIn 0.8s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(42, 157, 244, 0.2);
    }
</style>
@endsection
