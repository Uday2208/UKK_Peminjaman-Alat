-- Database Creation
CREATE DATABASE IF NOT EXISTS db_peminjaman;
USE db_peminjaman;

-- Roles Table
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- MD5 hash
    nama_lengkap VARCHAR(150),
    no_telp VARCHAR(20),
    alamat TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Categories Table
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL
);

-- Tools (Alat) Table
CREATE TABLE alat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategori_id INT NOT NULL,
    nama_alat VARCHAR(150) NOT NULL,
    deskripsi TEXT,
    stok INT NOT NULL DEFAULT 0,
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE
);

-- Loans (Peminjaman) Table
CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali_rencana DATE NOT NULL,
    tanggal_kembali_real DATE,
    status ENUM('pending', 'approved', 'rejected', 'returned') DEFAULT 'pending',
    keterangan TEXT,
    denda INT DEFAULT 0,
    petugas_id INT, -- Who approved/processed
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (petugas_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Loan Details Table (Many-to-Many Alat-Peminjaman)
CREATE TABLE detail_peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    peminjaman_id INT NOT NULL,
    alat_id INT NOT NULL,
    jumlah INT NOT NULL,
    FOREIGN KEY (peminjaman_id) REFERENCES peminjaman(id) ON DELETE CASCADE,
    FOREIGN KEY (alat_id) REFERENCES alat(id) ON DELETE CASCADE
);

-- Activity Log Table
CREATE TABLE log_aktivitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    aksi VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- No FK constraint on user_id to keep logs even if user deleted, handled by app logic or set null
);

-- SEED DATA
INSERT INTO roles (id, role_name) VALUES (1, 'admin'), (2, 'petugas'), (3, 'peminjam');

-- Passwords are MD5('admin123'), MD5('petugas123'), MD5('user123')
INSERT INTO users (role_id, username, password, nama_lengkap) VALUES 
(1, 'admin', MD5('admin123'), 'Administrator Sistem'),
(2, 'petugas', MD5('petugas123'), 'Petugas Lab'),
(3, 'user', MD5('user123'), 'Siswa Peminjam');

INSERT INTO kategori (nama_kategori) VALUES ('Elektronik'), ('Perkakas'), ('Audio Visual');

INSERT INTO alat (kategori_id, nama_alat, stok, deskripsi) VALUES 
(1, 'Arduino Uno R3', 10, 'Microcontroller board'),
(2, 'Obeng Set', 5, 'Set obeng lengkap'),
(3, 'Kamera DSLR Canon', 2, 'Kamera untuk dokumentasi');

-- TRIGGERS

-- Trigger: Reduce stock when loan is APPROVED
DELIMITER //
CREATE TRIGGER kurangi_stok_approve
AFTER UPDATE ON peminjaman
FOR EACH ROW
BEGIN
    IF NEW.status = 'approved' AND OLD.status = 'pending' THEN
        UPDATE alat a
        JOIN detail_peminjaman dp ON a.id = dp.alat_id
        SET a.stok = a.stok - dp.jumlah
        WHERE dp.peminjaman_id = NEW.id;
    END IF;
END //
DELIMITER ;

-- Trigger: Increase stock when loan is RETURNED
DELIMITER //
CREATE TRIGGER tambah_stok_kembali
AFTER UPDATE ON peminjaman
FOR EACH ROW
BEGIN
    IF NEW.status = 'returned' AND OLD.status != 'returned' THEN
        UPDATE alat a
        JOIN detail_peminjaman dp ON a.id = dp.alat_id
        SET a.stok = a.stok + dp.jumlah
        WHERE dp.peminjaman_id = NEW.id;
    END IF;
END //
DELIMITER ;

-- Function: Calculate Fine
DELIMITER //
CREATE FUNCTION hitung_denda(tgl_rencana DATE, tgl_real DATE) 
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE terlambat INT;
    DECLARE total_denda INT DEFAULT 0;
    
    SET terlambat = DATEDIFF(tgl_real, tgl_rencana);
    
    IF terlambat > 0 THEN
        SET total_denda = terlambat * 1000;
    END IF;
    
    RETURN total_denda;
END //
DELIMITER ;

-- Stored Procedure: Process Return
DELIMITER //
CREATE PROCEDURE proses_pengembalian(IN p_peminjaman_id INT, IN p_tgl_kembali DATE)
BEGIN
    DECLARE v_tgl_rencana DATE;
    DECLARE v_denda INT;
    
    -- Get planned return date
    SELECT tanggal_kembali_rencana INTO v_tgl_rencana 
    FROM peminjaman WHERE id = p_peminjaman_id;
    
    -- Calculate fine
    SET v_denda = hitung_denda(v_tgl_rencana, p_tgl_kembali);
    
    -- Update transaction
    UPDATE peminjaman 
    SET status = 'returned', 
        tanggal_kembali_real = p_tgl_kembali,
        denda = v_denda
    WHERE id = p_peminjaman_id;
    
END //
DELIMITER ;
