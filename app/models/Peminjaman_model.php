<?php

class Peminjaman_model
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $query = "SELECT p.*, u.nama_lengkap, GROUP_CONCAT(a.nama_alat SEPARATOR ', ') as alat_pinjam
                  FROM " . $this->table . " p
                  JOIN users u ON p.user_id = u.id
                  LEFT JOIN detail_peminjaman dp ON p.id = dp.peminjaman_id
                  LEFT JOIN alat a ON dp.alat_id = a.id
                  GROUP BY p.id
                  ORDER BY p.tanggal_pinjam DESC";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPeminjamanByDate($startDate, $endDate)
    {
        $query = "SELECT p.*, u.nama_lengkap, GROUP_CONCAT(a.nama_alat SEPARATOR ', ') as alat_pinjam
                  FROM " . $this->table . " p
                  JOIN users u ON p.user_id = u.id
                  LEFT JOIN detail_peminjaman dp ON p.id = dp.peminjaman_id
                  LEFT JOIN alat a ON dp.alat_id = a.id
                  WHERE p.tanggal_pinjam BETWEEN :start AND :end
                  GROUP BY p.id
                  ORDER BY p.tanggal_pinjam ASC";

        $this->db->query($query);
        $this->db->bind('start', $startDate);
        $this->db->bind('end', $endDate);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPeminjamanByUserId($user_id)
    {
        $query = "SELECT p.*, GROUP_CONCAT(a.nama_alat SEPARATOR ', ') as alat_pinjam
                  FROM " . $this->table . " p
                  LEFT JOIN detail_peminjaman dp ON p.id = dp.peminjaman_id
                  LEFT JOIN alat a ON dp.alat_id = a.id
                  WHERE p.user_id = :user_id
                  GROUP BY p.id
                  ORDER BY p.tanggal_pinjam DESC";
        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function ajukanPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman (user_id, tanggal_pinjam, tanggal_kembali_rencana, status) VALUES (:user_id, :tgl_pinjam, :tgl_kembali, 'pending')";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);

        if ($this->db->execute()) {
            $peminjaman_id = $this->db->lastInsertId();

            foreach ($data['alat_id'] as $alat_id) {
                $q2 = "INSERT INTO detail_peminjaman (peminjaman_id, alat_id, jumlah) VALUES (:pid, :aid, 1)";
                $this->db->query($q2);
                $this->db->bind('pid', $peminjaman_id);
                $this->db->bind('aid', $alat_id);
                $this->db->execute();
            }
            return true;
        }
        return false;
    }

    public function terimaPeminjaman($id, $petugas_id)
    {
        $query = "UPDATE peminjaman SET status = 'approved', petugas_id = :petugas_id WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('petugas_id', $petugas_id);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function tolakPeminjaman($id, $petugas_id)
    {
        $query = "UPDATE peminjaman SET status = 'rejected', petugas_id = :petugas_id WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('petugas_id', $petugas_id);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function prosesPengembalian($data)
    {
        $query = "CALL proses_pengembalian(:id, :tgl_kembali)";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        return $this->db->execute();
    }
}
