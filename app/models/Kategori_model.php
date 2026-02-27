<?php

class Kategori_model
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO kategori (nama_kategori) VALUES (:nama_kategori)";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        return $this->db->execute();
    }

    public function updateKategori($data)
    {
        $query = "UPDATE kategori SET nama_kategori = :nama_kategori WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        $this->db->bind('id', $data['id']);
        return $this->db->execute();
    }

    public function deleteKategori($id)
    {
        $query = "DELETE FROM kategori WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
