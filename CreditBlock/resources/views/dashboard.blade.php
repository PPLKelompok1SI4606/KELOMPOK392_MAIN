@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Notifikasi -->
    @if (session('notification'))
        <div class="bg-[#001125] border-l-4 border-light-blue text-sky-blue p-4 mb-8 rounded-r-lg shadow-lg animate-slide-in">
            <p>{{ session('notification') }}</p>
        </div>
    @endif

    <h1 class="text-4xl font-bold text-sky-blue mb-10 drop-shadow-lg tracking-wide animate-fade-in">Dashboard</h1>

    <!-- Card MetaMask/Wallet -->
    <div class="bg-[#001125] border border-light-blue/30 rounded-xl shadow-2xl p-6 mb-10 card-hover transition-all duration-300">
        <div class="relative bg-gradient-to-r from-[#001125] to-gray-800 rounded-lg p-6 text-white shadow-lg" style="background-image: linear-gradient(135deg, #001125, #1a2a44);">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-sky-blue tracking-wide">Wallet MetaMask</h3>
                    <p class="text-sm text-gray-300 mt-1">Saldo: <span class="font-bold text-light-blue">0.025 ETH</span></p>
                </div>
                <img src="https://metamask.io/images/metamask-logo.png" alt="MetaMask Logo" class="h-10 w-auto">
            </div>
            <div class="mt-4">
                <p class="text-sm text-gray-300">Alamat: <span class="font-mono text-light-blue">0x123...abc</span></p>
            </div>
            <div class="mt-4 flex items-center space-x-4">
                <button id="connect-metamask" class="bg-light-blue text-[#001125] px-4 py-2 rounded-lg hover:bg-light-blue/80 transition duration-300 text-sm font-semibold">Hubungkan Wallet</button>
                <span id="wallet-indicator" class="h-3 w-3 bg-red-500 rounded-full animate-pulse" title="Wallet belum terkoneksi"></span>
            </div>
            <div class="absolute bottom-0 right-0 h-24 w-24 opacity-10 bg-light-blue rounded-full -mr-12 -mb-12"></div>
        </div>
    </div>

    <!-- Grafik Tren Riwayat Pembayaran -->
    <div class="bg-[#001125] border border-light-blue/30 rounded-xl shadow-2xl p-6 mb-10 card-hover transition-all duration-300">
        <h2 class="text-2xl font-semibold text-sky-blue mb-6 tracking-wide">Tren Riwayat Pembayaran</h2>
        <canvas id="paymentTrendChart" class="w-full h-72"></canvas>
    </div>

    <!-- Card Horizontal -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <!-- Card Status Pinjaman -->
        <div class="bg-[#001125] border border-light-blue/30 rounded-xl shadow-xl p-6 card-hover transition-all duration-300">
            <div class="flex items-center space-x-4">
                <i class="fas fa-money-bill-wave text-3xl text-sky-blue"></i>
                <div>
                    <h3 class="text-sm font-semibold text-sky-blue tracking-wide">Pinjaman Saya</h3>
                    <p class="text-2xl font-bold text-light-blue mt-1">Rp {{ number_format(5000000, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-4 space-y-2">
                <p class="text-sky-blue text-sm">
                    Cicilan Berikutnya: <span class="text-light-blue font-bold">Rp {{ number_format(1000000, 0, ',', '.') }}</span> - 5 Apr 2025
                </p>
                <p class="text-sky-blue text-sm">
                    Status: <span class="inline-block bg-green-500/20 text-green-300 text-xs px-3 py-1 rounded-full">Aktif</span>
                </p>
            </div>
            <div class="mt-4 flex items-center space-x-4">
                <button class="bg-light-blue text-[#001125] px-4 py-2 rounded-lg hover:bg-light-blue/80 transition duration-300 text-sm font-semibold">Bayar Cicilan</button>
                <a href="#" class="text-sky-blue hover:text-light-blue transition text-sm">Lihat Detail</a>
            </div>
        </div>

        <!-- Card Status Pengajuan -->
        <div class="bg-[#001125] border border-light-blue/30 rounded-xl shadow-xl p-6 card-hover transition-all duration-300">
            <div class="flex items-center space-x-4">
                <i class="fas fa-file-alt text-3xl text-sky-blue"></i>
                <div>
                    <h3 class="text-sm font-semibold text-sky-blue tracking-wide">Pengajuan Pinjaman</h3>
                    <p class="text-2xl font-bold text-light-blue mt-1">Rp {{ number_format(10000000, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-4 space-y-2">
                <p class="text-sky-blue text-sm">
                    Status: <span class="inline-block bg-yellow-500/20 text-yellow-300 text-xs px-3 py-1 rounded-full">Menunggu</span>
                </p>
                <p class="text-sky-blue text-sm">Jangka Waktu: 12 Bulan</p>
            </div>
            <div class="mt-4">
                <a href="#" class="text-sky-blue hover:text-light-blue transition text-sm">Lihat Status</a>
            </div>
        </div>
    </div>

    <!-- Tabel Riwayat Pembayaran -->
    <div class="bg-[#001125] border border-light-blue/30 rounded-xl shadow-xl p-6">
        <h2 class="text-xl font-semibold text-sky-blue mb-6 tracking-wide">Riwayat Pembayaran</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sky-blue text-sm">
                <thead>
                    <tr class="bg-light-blue/20 text-[#001125]">
                        <th class="px-4 py-3 text-left rounded-tl-lg">Tanggal</th>
                        <th class="px-4 py-3 text-left">Nominal</th>
                        <th class="px-4 py-3 text-left rounded-tr-lg">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-light-blue/10 hover:bg-light-blue/10 transition duration-200">
                        <td class="px-4 py-3">1 Mar 2025</td>
                        <td class="px-4 py-3">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-4 py-3"><span class="text-green-300">Lunas</span></td>
                    </tr>
                    <tr class="border-b border-light-blue/10 hover:bg-light-blue/10 transition duration-200">
                        <td class="px-4 py-3">1 Feb 2025</td>
                        <td class="px-4 py-3">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-4 py-3"><span class="text-green-300">Lunas</span></td>
                    </tr>
                    <tr class="hover:bg-light-blue/10 transition duration-200">
                        <td class="px-4 py-3">1 Jan 2025</td>
                        <td class="px-4 py-3">Rp {{ number_format(1000000, 0, ',', '.') }}</td>
                        <td class="px-4 py-3"><span class="text-green-300">Lunas</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6 flex items-center space-x-6">
            <a href="#" class="text-sky-blue hover:text-light-blue transition text-sm">Lihat Semua</a>
            <a href="#" class="text-sky-blue hover:text-light-blue transition text-sm">Cetak Laporan (PDF)</a>
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
