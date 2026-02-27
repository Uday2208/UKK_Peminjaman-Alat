<?php

class Peminjam extends Controller
{
    public function __construct()
    {
        // Auth Middleware: Check if logged in and role is peminjam (3)
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Peminjam';
        $data['alat'] = $this->model('Alat_model')->getAllAlat();

        $all_loans = $this->model('Peminjaman_model')->getPeminjamanByUserId($_SESSION['user_id']);
        $data['total_pinjam'] = count($all_loans);
        $data['pinjam_aktif'] = 0;
        $data['denda_total'] = 0;

        foreach ($all_loans as $p) {
            if ($p['status'] == 'approved')
                $data['pinjam_aktif']++;
            $data['denda_total'] += $p['denda'];
        }

        $this->view('templates/header_peminjam_tailwind', $data);
        $this->view('peminjam/index', $data);
        $this->view('templates/footer_tailwind');
    }

    public function alat()
    {
        // Alias for index or specialized view
        $this->index();
    }

    public function ajukan()
    {
        // Prepare data
        // Convert single alat_id to array for model compatibility if needed, or update model
        $data = $_POST;
        $data['user_id'] = $_SESSION['user_id'];

        // Ensure alat_id is array for the loop in model, or handle single
        if (!is_array($data['alat_id'])) {
            $data['alat_id'] = [$data['alat_id']];
        }

        if ($this->model('Peminjaman_model')->ajukanPeminjaman($data) > 0) {
            Flasher::setFlash('berhasil', 'diajukan', 'success');
        } else {
            Flasher::setFlash('gagal', 'diajukan', 'danger');
        }
        header('Location: ' . BASE_URL . '/peminjam/riwayat');
        exit;
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Peminjaman';
        // Need specific method to get loan by user_id
        $data['peminjaman'] = $this->model('Peminjaman_model')->getPeminjamanByUserId($_SESSION['user_id']);

        $this->view('templates/header_peminjam_tailwind', $data);
        $this->view('peminjam/riwayat', $data);
        $this->view('templates/footer_tailwind');
    }
}
