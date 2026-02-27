# Aplikasi Manajemen Peminjaman Alat (APA)

Aplikasi web fullstack untuk manajemen peminjaman alat (Lab/Bengkel) berbasis PHP Native (MVC) dan MySQL.

## Fitur Utama
- **Role Based Access Control**: Admin, Petugas, Peminjam.
- **Manajemen Alat**: CRUD Alat dengan upload gambar.
- **Peminjaman & Pengembalian**: Flow pengajuan, persetujuan, dan pengembalian dengan denda.
- **Stok Otomatis**: Stok berkurang saat disetujui, bertambah saat kembali (via Database Trigger).
- **Denda Otomatis**: Perhitungan denda keterlambatan (via Database Function).

## Persyaratan Sistem
- XAMPP (Apache + MySQL/MariaDB)
- PHP >= 7.4 (Ekstensi `pdo_mysql` dan `gd` aktif)
- Browser Modern (Chrome/Firefox)

## Cara Instalasi
1. **Extract/Clone** folder `APA` ke dalam folder `htdocs` XAMPP (misal: `C:\xampp\htdocs\APA`).
2. **Hidupkan XAMPP**: Start Apache dan MySQL.
3. **Import Database**:
   - Buka PHPMyAdmin (`http://localhost/phpmyadmin`).
   - Buat database baru dengan nama `db_peminjaman`.
   - Import file `database/db_peminjaman.sql`.
4. **Konfigurasi** (Jika diperlukan):
   - Edit `app/config/config.php` jika password database bukan kosong.
5. **Jalankan**:
   - Buka browser dan akses `http://localhost/APA`.

## Akun Default
- **Admin**: `admin` / `admin123`
- **Petugas**: `petugas` / `petugas123`
- **Peminjam**: `user` / `user123`

## Struktur Database (ERD Simpel)

```mermaid
erDiagram
    ROLES {
        int id
        string role_name
    }
    USERS {
        int id
        int role_id
        string username
        string password
    }
    KATEGORI {
        int id
        string nama_kategori
    }
    ALAT {
        int id
        int kategori_id
        string nama_alat
        int stok
        string gambar
    }
    PEMINJAMAN {
        int id
        int user_id
        date tgl_pinjam
        date tgl_rencana
        date tgl_real
        enum status
        int denda
    }
    DETAIL_PEMINJAMAN {
        int id
        int peminjaman_id
        int alat_id
        int jumlah
    }

    USERS }|..|| ROLES : has
    ALAT }|..|| KATEGORI : has
    PEMINJAMAN }|..|| USERS : borrows_by
    DETAIL_PEMINJAMAN }|..|| PEMINJAMAN : contains
    DETAIL_PEMINJAMAN }|..|| ALAT : contains
```

## Alur Sistem (Flowchart)

```mermaid
graph TD
    A[Mulai] --> B{Login}
    B -- Admin --> C[Dashboard Admin]
    B -- Petugas --> D[Dashboard Petugas]
    B -- Peminjam --> E[Dashboard Peminjam]
    
    E --> F[Pilih Alat]
    F --> G[Ajukan Peminjaman]
    G --> H[Status Pending]
    
    D --> I{Cek Pengajuan}
    I -- Approve --> J[Stok Berkurang]
    J --> K[Status Approved]
    I -- Reject --> L[Status Rejected]
    
    K --> M[User Mengembalikan]
    M --> N[Petugas Input Tgl Kembali]
    N --> O{Terlambat?}
    O -- Ya --> P[Hitung Denda]
    O -- Tidak --> Q[Denda 0]
    
    P --> R[Update Status returned]
    Q --> R
    R --> S[Stok Bertambah]
    S --> T[Selesai]
```

## Struktur Folder
```
/app
  /config       # Konfigurasi DB
  /controllers  # Logika Aplikasi
  /core         # Framework MVC
  /models       # Akses Database
  /views        # Tampilan HTML
/assets         # CSS/JS custom
/database       # File SQL
/public         # Folder publik (uploads)
/index.php      # Entry point
```

---
Dibuat oleh AI Agent Antigravity.
