<?php

class MenuController
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getAllDataMenu()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM menu");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getDataMenuById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM menu WHERE id_menu = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function addDataMenu($nama_menu, $harga, $kategori)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO menu (nama_menu, harga, kategori) VALUES (:nama_menu, :harga, :kategori)");
            $stmt->bindParam(':nama_menu', $nama_menu);
            $stmt->bindParam(':harga', $harga, PDO::PARAM_INT);
            $stmt->bindParam(':kategori', $kategori);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function editData($id, $nama_menu, $harga, $kategori)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE menu SET nama_menu = :nama_menu, harga = :harga, kategori = :kategori WHERE id_menu = :id");
            $stmt->bindParam(':nama_menu', $nama_menu);
            $stmt->bindParam(':harga', $harga, PDO::PARAM_INT);
            $stmt->bindParam(':kategori', $kategori);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteDataById($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM menu WHERE id_menu = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
