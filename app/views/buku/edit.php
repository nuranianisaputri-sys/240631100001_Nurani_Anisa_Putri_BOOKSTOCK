
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - BOOKSTOCK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .form-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.07);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="mb-4">
                <h3 class="fw-bold">Edit Buku</h3>
                <p class="text-muted">
                    Ubah informasi buku yang tersimpan di BOOKSTOCK.
                </p>
            </div>

            <div class="card form-card">

                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Formulir Edit Data Buku</h5>
                </div>

                <div class="card-body p-4">

                    <?php $errors = session()->getFlashdata('errors'); ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <strong>Periksa kembali data:</strong>

                            <?php foreach ($errors as $error): ?>
                                <div><?= esc($error) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('buku/update/' . $buku['id_buku']) ?>"
                          method="post">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>

                            <input
                                type="text"
                                name="judul_buku"
                                class="form-control"
                                value="<?= esc(old('judul_buku', $buku['judul_buku'])) ?>"
                                maxlength="150"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>

                            <input
                                type="text"
                                name="penulis"
                                class="form-control"
                                value="<?= esc(old('penulis', $buku['penulis'])) ?>"
                                maxlength="100"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>

                            <input
                                type="number"
                                name="tahun_terbit"
                                class="form-control"
                                value="<?= esc(old('tahun_terbit', $buku['tahun_terbit'])) ?>"
                                min="1"
                                max="2100"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kategori</label>

                            <input
                                type="text"
                                name="kategori"
                                class="form-control"
                                value="<?= esc(old('kategori', $buku['kategori'])) ?>"
                                maxlength="50"
                                required
                            >
                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>

                            <a href="<?= base_url('buku') ?>"
                               class="btn btn-secondary">
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>
            </div>

            <div class="text-center text-muted mt-4">
                <small>
                    © <?= date('Y') ?> BOOKSTOCK - Aplikasi Inventaris Buku
                </small>
            </div>

        </div>
    </div>

</div>

</body>
</html>
