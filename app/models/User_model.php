<?php

class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getAllUsers()
    {
        $this->db->query('SELECT u.*, r.role_name FROM ' . $this->table . ' u JOIN roles r ON u.role_id = r.id');
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function registerUser($data)
    {
        $query = "INSERT INTO users (username, password, nama_lengkap, role_id) VALUES (:username, :password, :nama_lengkap, :role_id)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password'])); // MD5 as requested
        $this->db->bind('nama_lengkap', $data['nama']);
        $this->db->bind('role_id', $data['role_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($data)
    {
        $query = "UPDATE users SET username = :username, nama_lengkap = :nama_lengkap, role_id = :role_id";

        // Update password only if provided
        if (!empty($data['password'])) {
            $query .= ", password = :password";
        }

        $query .= " WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('nama_lengkap', $data['nama']);
        $this->db->bind('role_id', $data['role_id']);
        $this->db->bind('id', $data['id']);

        if (!empty($data['password'])) {
            $this->db->bind('password', md5($data['password']));
        }

        return $this->db->execute();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
