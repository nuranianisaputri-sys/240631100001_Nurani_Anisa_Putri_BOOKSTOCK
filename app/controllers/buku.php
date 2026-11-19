<?php
namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    // Menampilkan daftar buku
    public function index()
    {
        $model = new BukuModel();

        $data = [
            'judul' => 'Data Inventaris Buku',
            'buku'  => $model->findAll()
        ];

        return view('buku/index', $data);
    }

    // Menampilkan formulir tambah buku
    public function create()
    {
        return view('buku/create');
    }

    // Menyimpan data buku baru
    public function simpan()
    {
        $rules = [
            'judul_buku'   => 'required|min_length[2]|max_length[150]',
            'penulis'      => 'required|max_length[100]',
            'tahun_terbit' => 'required|integer|greater_than[0]|less_than_equal_to[2100]',
            'kategori'     => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new BukuModel();

        $model->insert([
            'judul_buku'   => $this->request->getPost('judul_buku'),
            'penulis'      => $this->request->getPost('penulis'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'kategori'     => $this->request->getPost('kategori')
        ]);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    // Menampilkan formulir edit buku
    public function edit($id)
    {
        $model = new BukuModel();
        $data['buku'] = $model->find($id);

        if (!$data['buku']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data buku tidak ditemukan.'
            );
        }

        return view('buku/edit', $data);
    }

    // Memperbarui data buku
    public function update($id)
    {
        $rules = [
            'judul_buku'   => 'required|min_length[2]|max_length[150]',
            'penulis'      => 'required|max_length[100]',
            'tahun_terbit' => 'required|integer|greater_than[0]|less_than_equal_to[2100]',
            'kategori'     => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new BukuModel();

        if (!$model->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data buku tidak ditemukan.'
            );
        }

        $model->update($id, [
            'judul_buku'   => $this->request->getPost('judul_buku'),
            'penulis'      => $this->request->getPost('penulis'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'kategori'     => $this->request->getPost('kategori')
        ]);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    // Menghapus data buku
    public function hapus($id)
    {
        $model = new BukuModel();

        if (!$model->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data buku tidak ditemukan.'
            );
        }

        $model->delete($id);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil dihapus.');
    }

    // Menampilkan halaman statistik
    public function statistik()
    {
        $model = new BukuModel();
        $daftarBuku = $model->findAll();

        $kategoriStats = [];
        $tahunStats = [];
        $penulisList = [];

        foreach ($daftarBuku as $item) {
            // Menghitung jumlah buku berdasarkan kategori
            $kategori = trim($item['kategori'] ?? '');

            if ($kategori === '') {
                $kategori = 'Tanpa Kategori';
            }

            if (!isset($kategoriStats[$kategori])) {
                $kategoriStats[$kategori] = 0;
            }

            $kategoriStats[$kategori]++;

            // Menghitung jumlah buku berdasarkan tahun terbit
            $tahun = trim((string) ($item['tahun_terbit'] ?? ''));

            if ($tahun === '') {
                $tahun = 'Tidak Diketahui';
            }

            if (!isset($tahunStats[$tahun])) {
                $tahunStats[$tahun] = 0;
            }

            $tahunStats[$tahun]++;

            // Mengumpulkan nama penulis
            $penulis = trim($item['penulis'] ?? '');

            if ($penulis !== '') {
                $penulisList[] = $penulis;
            }
        }

        // Mengurutkan tahun terbit
        uksort($tahunStats, function ($a, $b) {
            if (is_numeric($a) && is_numeric($b)) {
                return (int) $a <=> (int) $b;
            }

            return strcmp($a, $b);
        });

        // Mengubah data kategori menjadi array
        $kategoriData = [];

        foreach ($kategoriStats as $nama => $jumlah) {
            $kategoriData[] = [
                'nama' => $nama,
                'jumlah' => $jumlah
            ];
        }

        // Mengubah data tahun menjadi array
        $tahunData = [];

        foreach ($tahunStats as $tahun => $jumlah) {
            $tahunData[] = [
                'tahun' => $tahun,
                'jumlah' => $jumlah
            ];
        }

        $data = [
            'totalBuku'     => count($daftarBuku),
            'totalKategori' => count($kategoriStats),
            'totalPenulis'  => count(array_unique($penulisList)),
            'kategoriData'  => $kategoriData,
            'tahunData'     => $tahunData
        ];

        return view('buku/statistik', $data);
    }
}
