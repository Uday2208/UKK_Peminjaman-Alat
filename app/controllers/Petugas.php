<?php

class Petugas extends Controller
{
    public function __construct()
    {
        // Auth Middleware: Check if logged in and role is petugas (2)
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Petugas';
        $peminjaman = $this->model('Peminjaman_model')->getAllPeminjaman();
        $data['peminjaman'] = $peminjaman;
        $data['alat'] = $this->model('Alat_model')->getAllAlat(); // Added for new dashboard design
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori(); // Probably needed for filters? Or just join in model.

        // Calculate Stats
        $data['menunggu_validasi'] = 0;
        $data['peminjaman_aktif'] = 0;
        $data['selesai'] = 0;

        foreach ($peminjaman as $p) {
            if ($p['status'] == 'pending')
                $data['menunggu_validasi']++;
            if ($p['status'] == 'approved')
                $data['peminjaman_aktif']++;
            if ($p['status'] == 'returned' || $p['status'] == 'rejected')
                $data['selesai']++;
        }

        $this->view('templates/header_petugas_tailwind', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer_tailwind'); // Reuse footer
    }

    public function peminjaman()
    {
        $data['title'] = 'Kelola Peminjaman';
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();

        $this->view('templates/header_petugas_tailwind', $data);
        $this->view('petugas/peminjaman', $data);
        $this->view('templates/footer_tailwind');
    }

    public function approve($id)
    {
        if ($this->model('Peminjaman_model')->terimaPeminjaman($id, $_SESSION['user_id']) > 0) {
            Flasher::setFlash('berhasil', 'disetujui', 'success');
        } else {
            Flasher::setFlash('gagal', 'disetujui', 'danger');
        }
        header('Location: ' . BASE_URL . '/petugas/peminjaman');
        exit;
    }

    public function reject($id)
    {
        if ($this->model('Peminjaman_model')->tolakPeminjaman($id, $_SESSION['user_id']) > 0) {
            Flasher::setFlash('berhasil', 'ditolak', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditolak', 'danger');
        }
        header('Location: ' . BASE_URL . '/petugas/peminjaman');
        exit;
    }

    public function pengembalian()
    {
        $data['title'] = 'Proses Pengembalian';
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();

        $this->view('templates/header_petugas_tailwind', $data);
        $this->view('petugas/pengembalian', $data);
        $this->view('templates/footer_tailwind');
    }

    public function prosesKembali()
    {
        if ($this->model('Peminjaman_model')->prosesPengembalian($_POST) > 0) {
            Flasher::setFlash('berhasil', 'dikembalikan', 'success');
        } else {
            Flasher::setFlash('gagal', 'dikembalikan', 'danger'); // Might fail if already returned logic not handled in SP
        }
        header('Location: ' . BASE_URL . '/petugas/pengembalian');
        exit;
    }
}
