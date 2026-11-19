
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Statistik - BOOKSTOCK</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fff7f0;
            --pink-light: #fcebed;
            --pink: #f2cdd4;
            --pink-dark: #c8758d;
            --brown: #51434a;
            --brown-light: #806d73;
        }

        * {
            font-family: 'Nunito', sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--brown);
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #f8dfe4, #f3cbd4);
            padding: 28px 18px;
            border-radius: 0 25px 25px 0;
            position: relative;
            overflow: hidden;
        }

        .brand {
            text-align: center;
            margin-bottom: 45px;
        }

        .brand-icon {
            width: 65px;
            height: 65px;
            border-radius: 20px;
            background: rgba(255,255,255,.65);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            color: var(--pink-dark);
            font-size: 32px;
        }

        .brand h4 {
            font-weight: 800;
            letter-spacing: 1px;
            color: var(--brown);
        }

        .brand small {
            color: var(--brown-light);
            font-size: 12px;
        }

        .menu-label {
            color: #95747e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin: 20px 12px 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 13px;
            color: #735560;
            text-decoration: none;
            font-weight: 700;
            transition: .2s;
        }

        .sidebar-menu a i {
            font-size: 19px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--pink-dark);
            color: white;
        }

        .sidebar::after {
            content: "✿";
            position: absolute;
            right: 20px;
            bottom: 18px;
            font-size: 55px;
            color: #bc7c8d;
            opacity: .25;
            pointer-events: none;
        }

        .main-content {
            padding: 30px 35px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
        }

        .date-label {
            background: white;
            border: 1px solid #f4dfe2;
            border-radius: 30px;
            padding: 9px 16px;
            color: var(--brown-light);
            font-size: 13px;
            font-weight: 700;
        }

        .welcome-banner {
            background: linear-gradient(110deg, #f8dfe4, #fff0e5);
            border-radius: 22px;
            padding: 28px;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .welcome-banner h2 {
            font-weight: 800;
        }

        .welcome-banner p {
            color: var(--brown-light);
            margin-bottom: 0;
        }

        .welcome-flower {
            position: absolute;
            right: 35px;
            top: 0;
            font-size: 85px;
            color: #d78b9e;
            opacity: .35;
        }

        .stat-card {
            border: 1px solid rgba(230,190,197,.35);
            border-radius: 19px;
            padding: 20px;
            height: 100%;
        }

        .stat-pink {
            background: #fce4e8;
        }

        .stat-cream {
            background: #f9e9dd;
        }

        .stat-rose {
            background: #f2d5dc;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: rgba(255,255,255,.7);
            color: var(--pink-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            font-size: 28px;
            font-weight: 800;
            margin: 0;
        }

        .stat-card p {
            color: var(--brown-light);
            margin: 0;
            font-size: 13px;
            font-weight: 700;
        }

        .chart-card,
        .table-card {
            background: white;
            border: 1px solid #f2e4e2;
            border-radius: 20px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(151,100,117,.05);
            height: 100%;
        }

        .section-title {
            font-weight: 800;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .section-subtitle {
            font-size: 12px;
            color: var(--brown-light);
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            height: 280px;
        }

        .empty-chart {
            min-height: 230px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: #a18a90;
        }

        .empty-chart i {
            font-size: 40px;
            color: var(--pink);
            margin-bottom: 10px;
        }

        .table thead th {
            background: #fcebed;
            color: #795663;
            font-size: 13px;
            border-bottom: 1px solid #f1dce1;
            white-space: nowrap;
        }

        .table td,
        .table th {
            padding: 13px;
            vertical-align: middle;
        }

        .category-badge {
            background: #f8e3e8;
            color: #a35e75;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 800;
        }

        .btn-pink {
            background: var(--pink-dark);
            color: white;
            border: none;
            border-radius: 11px;
            padding: 10px 16px;
            font-weight: 800;
            text-decoration: none;
        }

        .btn-pink:hover {
            background: #b96780;
            color: white;
        }

        .footer {
            text-align: center;
            color: #a18a90;
            font-size: 12px;
            padding: 25px 10px 10px;
        }

        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                border-radius: 0 0 20px 20px;
            }

            .sidebar::after {
                display: none;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main-content {
                padding: 22px 16px;
            }
        }

        @media (max-width: 576px) {
            .welcome-banner h2 {
                font-size: 22px;
            }

            .chart-card,
            .table-card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-lg-2 p-0">

            <aside class="sidebar">

                <div class="brand">
                    <div class="brand-icon">
                        <i class="bi bi-book-half"></i>
                    </div>

                    <h4>BOOKSTOCK</h4>
                    <small>A little space for every story ♡</small>
                </div>

                <div class="sidebar-menu">

                    <div class="menu-label">MENU UTAMA</div>

                    <a href="<?= base_url('buku') ?>">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>

                    <a href="<?= base_url('buku/create') ?>">
                        <i class="bi bi-plus-circle-fill"></i>
                        Tambah Buku
                    </a>

                    <a href="<?= base_url('buku') ?>#daftar-buku">
                        <i class="bi bi-journals"></i>
                        Data Buku
                    </a>

                    <div class="menu-label">INFORMASI</div>

                    <a href="<?= base_url('buku/statistik') ?>" class="active">
                        <i class="bi bi-bar-chart-fill"></i>
                        Statistik
                    </a>

                </div>

            </aside>

        </div>

        <!-- KONTEN -->
        <div class="col-lg-10">

            <main class="main-content">

                <!-- HEADER -->
                <div class="topbar">

                    <div>
                        <span class="text-muted small fw-bold">
                            BOOKSTOCK / STATISTIK
                        </span>
                    </div>

                    <div class="date-label">
                        <i class="bi bi-calendar-heart me-2"></i>
                        <?= esc(date('d-m-Y')) ?>

                        <span class="mx-2">|</span>

                        <i class="bi bi-person-circle me-1"></i>
                        Admin
                    </div>

                </div>

                <!-- WELCOME -->
                <section class="welcome-banner">

                    <div class="position-relative" style="z-index:1;">

                        <h2>Statistik Koleksi Buku 🌸</h2>

                        <p>
                            Pantau perkembangan dan persebaran koleksi
                            buku yang tersimpan di BOOKSTOCK.
                        </p>

                    </div>

                    <span class="welcome-flower">✿</span>

                </section>

                <!-- KARTU STATISTIK -->
                <div class="row g-3 mb-4">

                    <div class="col-md-4">
                        <div class="stat-card stat-pink">

                            <div class="stat-icon">
                                <i class="bi bi-book-half"></i>
                            </div>

                            <h3><?= $totalBuku ?></h3>
                            <p>Total Koleksi Buku</p>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card stat-cream">

                            <div class="stat-icon">
                                <i class="bi bi-tags-fill"></i>
                            </div>

                            <h3><?= $totalKategori ?></h3>
                            <p>Jumlah Kategori</p>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-card stat-rose">

                            <div class="stat-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <h3><?= $totalPenulis ?></h3>
                            <p>Jumlah Penulis</p>

                        </div>
                    </div>

                </div>

                <!-- GRAFIK -->
                <div class="row g-4">

                    <!-- GRAFIK KATEGORI -->
                    <div class="col-lg-6">

                        <div class="chart-card">

                            <h5 class="section-title">
                                <i class="bi bi-pie-chart-fill me-2" style="color:#c8758d;"></i>
                                Buku Berdasarkan Kategori
                            </h5>

                            <p class="section-subtitle">
                                Perbandingan jumlah koleksi untuk setiap kategori.
                            </p>

                            <?php if (!empty($kategoriData)): ?>

                                <div class="chart-container">
                                    <canvas id="kategoriChart"></canvas>
                                </div>

                            <?php else: ?>

                                <div class="empty-chart">
                                    <i class="bi bi-pie-chart"></i>
                                    <strong>Belum ada data kategori</strong>
                                    <small>Tambahkan buku untuk melihat grafik.</small>
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                    <!-- GRAFIK TAHUN -->
                    <div class="col-lg-6">

                        <div class="chart-card">

                            <h5 class="section-title">
                                <i class="bi bi-bar-chart-fill me-2" style="color:#c8758d;"></i>
                                Buku Berdasarkan Tahun Terbit
                            </h5>

                            <p class="section-subtitle">
                                Jumlah buku berdasarkan tahun penerbitannya.
                            </p>

                            <?php if (!empty($tahunData)): ?>

                                <div class="chart-container">
                                    <canvas id="tahunChart"></canvas>
                                </div>

                            <?php else: ?>

                                <div class="empty-chart">
                                    <i class="bi bi-bar-chart"></i>
                                    <strong>Belum ada data tahun terbit</strong>
                                    <small>Tambahkan buku untuk melihat grafik.</small>
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <!-- TABEL RINGKASAN KATEGORI -->
                <section class="table-card mt-4">

                    <h5 class="section-title">
                        <i class="bi bi-list-check me-2" style="color:#c8758d;"></i>
                        Ringkasan Koleksi per Kategori
                    </h5>

                    <p class="section-subtitle">
                        Rincian jumlah buku yang tersimpan dalam setiap kategori.
                    </p>

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Buku</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (!empty($kategoriData)): ?>

                                    <?php foreach ($kategoriData as $index => $kategori): ?>

                                        <?php
                                            $persentase = $totalBuku > 0
                                                ? ($kategori['jumlah'] / $totalBuku) * 100
                                                : 0;
                                        ?>

                                        <tr>

                                            <td><?= $index + 1 ?></td>

                                            <td>
                                                <span class="category-badge">
                                                    <?= esc($kategori['nama']) ?>
                                                </span>
                                            </td>

                                            <td class="fw-bold">
                                                <?= $kategori['jumlah'] ?> buku
                                            </td>

                                            <td>
                                                <?= number_format($persentase, 1) ?>%
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            Belum terdapat data kategori.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </section>

                <!-- TOMBOL KEMBALI -->
                <div class="mt-4">
                    <a href="<?= base_url('buku') ?>" class="btn-pink">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke Dashboard
                    </a>
                </div>

                <!-- FOOTER -->
                <footer class="footer">
                    © <?= date('Y') ?> BOOKSTOCK
                    <span class="mx-1">•</span>
                    Sistem Inventaris Buku ♡
                </footer>

            </main>

        </div>

    </div>
</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data dari database melalui Controller
    const kategoriLabels = <?= json_encode(
        array_column($kategoriData, 'nama'),
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
    ) ?>;

    const kategoriValues = <?= json_encode(
        array_column($kategoriData, 'jumlah')
    ) ?>;

    const tahunLabels = <?= json_encode(
        array_column($tahunData, 'tahun'),
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
    ) ?>;

    const tahunValues = <?= json_encode(
        array_column($tahunData, 'jumlah')
    ) ?>;

    // Grafik kategori
    const kategoriCanvas = document.getElementById('kategoriChart');

    if (kategoriCanvas) {

        new Chart(kategoriCanvas, {
            type: 'doughnut',

            data: {
                labels: kategoriLabels,

                datasets: [{
                    data: kategoriValues,

                    backgroundColor: [
                        '#E9AEBB',
                        '#F5D9D0',
                        '#DDAFC2',
                        '#E8C9A9',
                        '#C9B4CB',
                        '#EFC4C8',
                        '#D6C5B2'
                    ],

                    borderWidth: 3,
                    borderColor: '#ffffff'
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        position: 'bottom',

                        labels: {
                            padding: 18,
                            usePointStyle: true,
                            font: {
                                family: 'Nunito'
                            }
                        }
                    }
                },

                cutout: '58%'
            }
        });

    }

    // Grafik tahun terbit
    const tahunCanvas = document.getElementById('tahunChart');

    if (tahunCanvas) {

        new Chart(tahunCanvas, {
            type: 'bar',

            data: {
                labels: tahunLabels,

                datasets: [{
                    label: 'Jumlah Buku',
                    data: tahunValues,

                    backgroundColor: '#E9AEBB',
                    borderColor: '#C8758D',
                    borderWidth: 1,
                    borderRadius: 8,
                    maxBarThickness: 55
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

    }
</script>

</body>
</html>
