
<?php
$totalBuku = count($buku);

$kategoriList = array_values(array_unique(array_filter(
    array_map('trim', array_column($buku, 'kategori'))
)));

$penulisList = array_values(array_unique(array_filter(
    array_map('trim', array_column($buku, 'penulis'))
)));

$success = session()->getFlashdata('success');

$hari = [
    'Minggu', 'Senin', 'Selasa', 'Rabu',
    'Kamis', 'Jumat', 'Sabtu'
];

$bulan = [
    1 => 'Januari', 'Februari', 'Maret',
    'April', 'Mei', 'Juni', 'Juli',
    'Agustus', 'September', 'Oktober',
    'November', 'Desember'
];

$tanggalHariIni = $hari[(int) date('w')] . ', ' .
    date('j') . ' ' . $bulan[(int) date('n')] . ' ' . date('Y');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BOOKSTOCK - Dashboard Inventaris Buku</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #fff7f0;
            --cream-dark: #f6e8df;
            --pink-light: #fcebed;
            --pink: #f2cdd4;
            --pink-medium: #e9aebb;
            --pink-dark: #c8758d;
            --brown: #51434a;
            --brown-light: #806d73;
            --white: #ffffff;
        }

        * {
            font-family: 'Nunito', sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--brown);
            min-height: 100vh;
        }

        .page-wrapper {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 90% 8%, rgba(242,205,212,.45), transparent 18%),
                radial-gradient(circle at 75% 90%, rgba(238,223,213,.55), transparent 20%),
                var(--cream);
        }

        /* SIDEBAR */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #f8dfe4, #f3cbd4);
            padding: 28px 18px;
            position: relative;
            overflow: hidden;
            border-radius: 0 25px 25px 0;
            box-shadow: 4px 0 20px rgba(151, 100, 117, .08);
        }

        .brand {
            text-align: center;
            margin-bottom: 45px;
            position: relative;
            z-index: 1;
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
            margin-bottom: 2px;
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

        .sidebar-menu {
            position: relative;
            z-index: 2;
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
            box-shadow: 0 5px 12px rgba(200,117,141,.2);
        }

        /* ORNAMEN SIDEBAR */
        .sidebar-decoration {
            display: none;
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
            z-index: 0;
        }

        /* KONTEN UTAMA */
        .main-content {
            padding: 30px 35px;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 15px;
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

        /* WELCOME BANNER */
        .welcome-banner {
            background: linear-gradient(110deg, #f8dfe4, #fff0e5);
            border-radius: 22px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
            min-height: 145px;
        }

        .welcome-banner h2 {
            font-weight: 800;
            color: var(--brown);
            margin-bottom: 7px;
        }

        .welcome-banner p {
            color: var(--brown-light);
            margin-bottom: 0;
        }

        .welcome-flower {
            position: absolute;
            right: 45px;
            top: 8px;
            font-size: 90px;
            color: #d78b9e;
            opacity: .35;
            transform: rotate(15deg);
            pointer-events: none;
        }

        .welcome-flower.second {
            right: 145px;
            top: 65px;
            font-size: 45px;
        }

        /* STATISTIK */
        .stat-card {
            border: 1px solid rgba(230,190,197,.35);
            border-radius: 19px;
            padding: 20px;
            height: 100%;
            position: relative;
            overflow: hidden;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(151,100,117,.10);
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
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: rgba(255,255,255,.7);
            color: var(--pink-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 13px;
        }

        .stat-card h3 {
            font-weight: 800;
            font-size: 29px;
            margin-bottom: 0;
            color: var(--brown);
        }

        .stat-card p {
            color: var(--brown-light);
            font-size: 13px;
            margin-bottom: 0;
            font-weight: 700;
        }

        /* TOMBOL */
        .btn-pink {
            background: var(--pink-dark);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 11px 18px;
            font-weight: 800;
            text-decoration: none;
            transition: .2s;
        }

        .btn-pink:hover {
            background: #b96780;
            color: white;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: #f8e5c9;
            color: #966c38;
            border: none;
            border-radius: 8px;
            font-weight: 800;
        }

        .btn-edit:hover {
            background: #f0d8b4;
            color: #80582a;
        }

        .btn-delete {
            background: #f9dce1;
            color: #b65368;
            border: none;
            border-radius: 8px;
            font-weight: 800;
        }

        .btn-delete:hover {
            background: #f2c5ce;
            color: #9c4055;
        }

        /* PANEL TABEL */
        .content-card {
            background: white;
            border: 1px solid #f2e4e2;
            border-radius: 20px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(151,100,117,.05);
            margin-top: 25px;
        }

        .section-title {
            font-weight: 800;
            color: var(--brown);
            font-size: 19px;
        }

        .section-title i {
            color: var(--pink-dark);
            margin-right: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #f0dce0;
            border-radius: 11px;
            padding: 10px 13px;
            color: var(--brown);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--pink-medium);
            box-shadow: 0 0 0 3px rgba(233,174,187,.18);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #fcebed;
            color: #795663;
            font-size: 13px;
            font-weight: 800;
            padding: 15px 13px;
            border-bottom: 1px solid #f1dce1;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 13px;
            color: var(--brown);
            font-size: 13px;
            border-color: #f5e9e9;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #fff9f8;
        }

        .category-badge {
            display: inline-block;
            background: #f8e3e8;
            color: #a35e75;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .empty-state {
            padding: 35px 15px !important;
            text-align: center;
            color: #a18a90 !important;
        }

        .empty-state i {
            font-size: 35px;
            display: block;
            margin-bottom: 10px;
            color: var(--pink-medium);
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #a18a90;
            font-size: 12px;
            padding: 25px 10px 10px;
        }

        /* RESPONSIVE */
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
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome-banner {
                padding: 22px;
            }

            .welcome-banner h2 {
                font-size: 22px;
            }

            .welcome-flower {
                right: 10px;
                font-size: 65px;
            }

            .content-card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">
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

                        <a href="<?= base_url('buku') ?>" class="active">
                            <i class="bi bi-house-door-fill"></i>
                            Dashboard
                        </a>

                        <a href="<?= base_url('buku/create') ?>">
                            <i class="bi bi-plus-circle-fill"></i>
                            Tambah Buku
                        </a>

                        <a href="#daftar-buku">
                            <i class="bi bi-journals"></i>
                            Data Buku
                        </a>

                        <div class="menu-label">INFORMASI</div>

                        <!-- Menu Statistik menuju halaman terpisah -->
                        <a href="<?= base_url('buku/statistik') ?>">
                            <i class="bi bi-bar-chart-fill"></i>
                            Statistik
                        </a>

                    </div>

                    <!-- Dekorasi teks lama dihilangkan agar tidak bertumpuk -->

                </aside>
            </div>

            <!-- KONTEN UTAMA -->
            <div class="col-lg-10">
                <main class="main-content">

                    <!-- TOPBAR -->
                    <div class="topbar">

                        <div>
                            <span class="text-muted small fw-bold">
                                BOOKSTOCK / DASHBOARD
                            </span>
                        </div>

                        <div class="date-label">
                            <i class="bi bi-calendar-heart me-2"></i>
                            <?= esc($tanggalHariIni) ?>

                            <span class="mx-2">|</span>

                            <i class="bi bi-person-circle me-1"></i>
                            Admin
                        </div>

                    </div>

                    <!-- NOTIFIKASI -->
                    <?php if ($success): ?>

                        <div class="alert alert-success alert-dismissible fade show rounded-4">

                            <i class="bi bi-check-circle-fill me-2"></i>
                            <?= esc($success) ?>

                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert">
                            </button>

                        </div>

                    <?php endif; ?>

                    <!-- WELCOME BANNER -->
                    <section class="welcome-banner">

                        <div class="position-relative" style="z-index: 1;">

                            <h2>Selamat Datang, Admin! 🌸</h2>

                            <p>
                                Kelola koleksi buku di BOOKSTOCK
                                dengan lebih mudah dan terorganisir.
                            </p>

                        </div>

                        <span class="welcome-flower">✿</span>
                        <span class="welcome-flower second">❀</span>

                    </section>

                    <!-- KARTU STATISTIK -->
                    <section id="statistik">

                        <div class="row g-3">

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

                                    <h3><?= count($kategoriList) ?></h3>
                                    <p>Jumlah Kategori</p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stat-card stat-rose">

                                    <div class="stat-icon">
                                        <i class="bi bi-people-fill"></i>
                                    </div>

                                    <h3><?= count($penulisList) ?></h3>
                                    <p>Jumlah Penulis</p>

                                </div>
                            </div>

                        </div>

                    </section>

                    <!-- DAFTAR BUKU -->
                    <section class="content-card" id="daftar-buku">

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                            <div>
                                <h5 class="section-title mb-1">
                                    <i class="bi bi-journal-bookmark-fill"></i>
                                    Daftar Inventaris Buku
                                </h5>

                                <small class="text-muted">
                                    Kelola seluruh koleksi buku yang tersimpan.
                                </small>
                            </div>

                            <a href="<?= base_url('buku/create') ?>" class="btn-pink">
                                <i class="bi bi-plus-lg me-1"></i>
                                Tambah Buku
                            </a>

                        </div>

                        <!-- PENCARIAN DAN FILTER -->
                        <div class="row g-2 mb-3">

                            <div class="col-md-7">

                                <div class="input-group">

                                    <span class="input-group-text bg-white border-end-0"
                                          style="border-color:#f0dce0; border-radius:11px 0 0 11px;">

                                        <i class="bi bi-search" style="color:#c8758d;"></i>

                                    </span>

                                    <input
                                        type="text"
                                        id="searchBuku"
                                        class="form-control border-start-0"
                                        placeholder="Cari judul buku atau nama penulis..."
                                        style="border-radius:0 11px 11px 0;"
                                    >

                                </div>

                            </div>

                            <div class="col-md-5">

                                <select id="filterKategori" class="form-select">

                                    <option value="">Semua Kategori</option>

                                    <?php foreach ($kategoriList as $kategori): ?>

                                        <option value="<?= esc($kategori, 'attr') ?>">
                                            <?= esc($kategori) ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                        <!-- TABEL BUKU -->
                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead>
                                    <tr>
                                        <th width="55">No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Tahun Terbit</th>
                                        <th>Kategori</th>
                                        <th width="155">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody id="tabelBuku">

                                    <?php if (!empty($buku)): ?>

                                        <?php $no = 1; ?>

                                        <?php foreach ($buku as $item): ?>

                                            <tr
                                                class="baris-buku"
                                                data-search="<?= esc(strtolower($item['judul_buku'] . ' ' . $item['penulis']), 'attr') ?>"
                                                data-category="<?= esc($item['kategori'], 'attr') ?>"
                                            >

                                                <td><?= $no++ ?></td>

                                                <td class="fw-bold">
                                                    <?= esc($item['judul_buku']) ?>
                                                </td>

                                                <td>
                                                    <?= esc($item['penulis']) ?>
                                                </td>

                                                <td>
                                                    <?= esc($item['tahun_terbit']) ?>
                                                </td>

                                                <td>
                                                    <span class="category-badge">
                                                        <?= esc($item['kategori']) ?>
                                                    </span>
                                                </td>

                                                <td>

                                                    <div class="d-flex gap-1">

                                                        <!-- EDIT -->
                                                        <a
                                                            href="<?= base_url('buku/edit/' . $item['id_buku']) ?>"
                                                            class="btn btn-sm btn-edit"
                                                            title="Edit buku"
                                                        >
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <!-- HAPUS -->
                                                        <form
                                                            action="<?= base_url('buku/hapus/' . $item['id_buku']) ?>"
                                                            method="post"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')"
                                                        >

                                                            <?= csrf_field() ?>

                                                            <button
                                                                type="submit"
                                                                class="btn btn-sm btn-delete"
                                                                title="Hapus buku"
                                                            >
                                                                <i class="bi bi-trash3-fill"></i>
                                                            </button>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                        <tr id="noSearchResult" style="display:none;">

                                            <td colspan="6" class="empty-state">

                                                <i class="bi bi-search"></i>

                                                Buku yang dicari tidak ditemukan.

                                            </td>

                                        </tr>

                                    <?php else: ?>

                                        <tr>

                                            <td colspan="6" class="empty-state">

                                                <i class="bi bi-journal-x"></i>

                                                <strong>Belum ada koleksi buku.</strong>

                                                <div class="mt-2">
                                                    Silakan tambahkan buku pertama kamu.
                                                </div>

                                                <a href="<?= base_url('buku/create') ?>"
                                                   class="btn-pink d-inline-block mt-3">

                                                    <i class="bi bi-plus-lg me-1"></i>
                                                    Tambah Buku

                                                </a>

                                            </td>

                                        </tr>

                                    <?php endif; ?>

                                </tbody>

                            </table>

                        </div>

                        <!-- INFORMASI JUMLAH DATA -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

                            <small class="text-muted" id="jumlahData">
                                Menampilkan <?= $totalBuku ?> data buku
                            </small>

                            <small class="text-muted">
                                BOOKSTOCK ♡ Your little library
                            </small>

                        </div>

                    </section>

                    <!-- FOOTER -->
                    <footer class="footer">

                        © <?= date('Y') ?> BOOKSTOCK

                        <span class="mx-1">•</span>

                        Sistem Inventaris Buku

                        <span class="mx-1">♡</span>

                    </footer>

                </main>
            </div>

        </div>
    </div>
</div>

<!-- BOOTSTRAP JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- PENCARIAN DAN FILTER -->
<script>
    const searchInput = document.getElementById('searchBuku');
    const filterKategori = document.getElementById('filterKategori');
    const barisBuku = document.querySelectorAll('.baris-buku');
    const noSearchResult = document.getElementById('noSearchResult');
    const jumlahData = document.getElementById('jumlahData');

    function filterBuku() {

        const kataKunci = searchInput.value.toLowerCase().trim();
        const kategoriDipilih = filterKategori.value.toLowerCase();

        let jumlahTampil = 0;

        barisBuku.forEach(function(baris) {

            const teksBuku = baris.dataset.search;
            const kategoriBuku = baris.dataset.category.toLowerCase();

            const cocokPencarian = teksBuku.includes(kataKunci);

            const cocokKategori =
                kategoriDipilih === '' ||
                kategoriBuku === kategoriDipilih;

            if (cocokPencarian && cocokKategori) {

                baris.style.display = '';
                jumlahTampil++;

            } else {

                baris.style.display = 'none';

            }

        });

        if (noSearchResult) {
            noSearchResult.style.display =
                jumlahTampil === 0 ? '' : 'none';
        }

        if (jumlahData) {
            jumlahData.textContent =
                'Menampilkan ' + jumlahTampil +
                ' dari ' + barisBuku.length +
                ' data buku';
        }

    }

    searchInput.addEventListener('input', filterBuku);
    filterKategori.addEventListener('change', filterBuku);
</script>

</body>
</html>
