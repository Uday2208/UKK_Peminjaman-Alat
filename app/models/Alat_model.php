<?php

class Alat_model
{
    private $table = 'alat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAlat()
    {
        $this->db->query('SELECT a.*, k.nama_kategori FROM ' . $this->table . ' a JOIN kategori k ON a.kategori_id = k.id');
        return $this->db->resultSet();
    }

    public function getAlatById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahAlat($data)
    {
        $query = "INSERT INTO alat (nama_alat, kategori_id, stok, deskripsi, gambar) VALUES (:nama_alat, :kategori_id, :stok, :deskripsi, :gambar)";
        $this->db->query($query);
        $this->db->bind('nama_alat', $data['nama_alat']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);

        return $this->db->execute();
    }

    public function updateAlat($data)
    {
        $query = "UPDATE alat SET nama_alat = :nama_alat, kategori_id = :kategori_id, stok = :stok, deskripsi = :deskripsi";

        if ($data['gambar'] != null) {
            $query .= ", gambar = :gambar";
        }

        $query .= " WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama_alat', $data['nama_alat']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);

        if ($data['gambar'] != null) {
            $this->db->bind('gambar', $data['gambar']);
        }

        return $this->db->execute();
    }

    public function deleteAlat($id)
    {
        $query = "DELETE FROM alat WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
