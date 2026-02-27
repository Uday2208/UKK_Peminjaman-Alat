<?php

class Admin extends Controller
{
    public function __construct()
    {
        // Auth Middleware: Check if logged in and role is admin (1)
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['users_count'] = count($this->model('User_model')->getAllUsers());
        $data['alat_count'] = count($this->model('Alat_model')->getAllAlat());
        $data['peminjaman_count'] = count($this->model('Peminjaman_model')->getAllPeminjaman());

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/index', $data); // index view should now ONLY contain the content, not the html/head/body wrappers
        $this->view('templates/footer_tailwind');
    }

    // USER METHODS
    public function users()
    {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/users', $data);
        $this->view('templates/footer_tailwind');
    }

    public function userStore()
    {
        if ($this->model('User_model')->registerUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        }
    }

    public function userUpdate()
    {
        if ($this->model('User_model')->updateUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        }
    }

    public function userDelete($id)
    {
        if ($this->model('User_model')->deleteUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/admin/users');
            exit;
        }
    }

    public function getUserById($id)
    {
        echo json_encode($this->model('User_model')->getUserById($id));
    }

    // KATEGORI METHODS
    public function kategori()
    {
        $data['title'] = 'Manajemen Kategori';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/kategori', $data);
        $this->view('templates/footer_tailwind');
    }

    public function kategoriStore()
    {
        if ($this->model('Kategori_model')->tambahKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        }
    }

    public function kategoriUpdate()
    {
        if ($this->model('Kategori_model')->updateKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        }
    }

    public function kategoriDelete($id)
    {
        if ($this->model('Kategori_model')->deleteKategori($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/admin/kategori');
            exit;
        }
    }

    public function getKategoriById($id)
    {
        echo json_encode($this->model('Kategori_model')->getKategoriById($id));
    }

    // ALAT METHODS
    public function alat()
    {
        $data['title'] = 'Manajemen Alat';
        $data['alat'] = $this->model('Alat_model')->getAllAlat();
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/alat', $data);
        $this->view('templates/footer_tailwind');
    }

    public function alatStore()
    {
        $gambar = $this->uploadGambar();
        $data = $_POST;
        $data['gambar'] = $gambar ? $gambar : null;

        if ($this->model('Alat_model')->tambahAlat($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        }
    }

    public function alatUpdate()
    {
        $data = $_POST;
        $gambar = $_FILES['gambar']['name'] ? $this->uploadGambar() : null;
        $data['gambar'] = $gambar;

        if ($this->model('Alat_model')->updateAlat($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        } else {
            Flasher::setFlash('info', 'tidak ada perubahan atau gagal', 'warning');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        }
    }

    public function alatDelete($id)
    {
        if ($this->model('Alat_model')->deleteAlat($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/admin/alat');
            exit;
        }
    }

    public function getAlatById($id)
    {
        echo json_encode($this->model('Alat_model')->getAlatById($id));
    }

    // PEMINJAMAN METHODS
    public function peminjaman()
    {
        $data['title'] = 'Laporan Peminjaman';
        $start = $_GET['tgl_mulai'] ?? null;
        $end = $_GET['tgl_selesai'] ?? null;

        if ($start && $end) {
            $data['peminjaman'] = $this->model('Peminjaman_model')->getPeminjamanByDate($start, $end);
            $data['tgl_mulai'] = $start;
            $data['tgl_selesai'] = $end;
        } else {
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['tgl_mulai'] = date('Y-m-01');
            $data['tgl_selesai'] = date('Y-m-d');
        }

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/peminjaman', $data);
        $this->view('templates/footer_tailwind');
    }

    public function logs()
    {
        $data['title'] = 'System Logs';
        // For now, mock some logs or just show empty
        $data['logs'] = [];

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/logs', $data);
        $this->view('templates/footer_tailwind');
    }

    public function settings()
    {
        $data['title'] = 'System Settings';

        $this->view('templates/header_tailwind', $data);
        $this->view('admin/settings', $data);
        $this->view('templates/footer_tailwind');
    }

    public function cetakLaporan()
    {
        $start = $_GET['tgl_mulai'] ?? null;
        $end = $_GET['tgl_selesai'] ?? null;

        if ($start && $end) {
            $data['peminjaman'] = $this->model('Peminjaman_model')->getPeminjamanByDate($start, $end);
            $data['periode'] = date('d/m/Y', strtotime($start)) . ' - ' . date('d/m/Y', strtotime($end));
        } else {
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['periode'] = 'Semua Data';
        }

        $this->view('admin/cetak', $data);
    }

    // Helper
    private function uploadGambar()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($error === 4)
            return false;

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid))
            return false;

        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
        move_uploaded_file($tmpName, 'uploads/' . $namaFileBaru);

        return $namaFileBaru;
    }
}
