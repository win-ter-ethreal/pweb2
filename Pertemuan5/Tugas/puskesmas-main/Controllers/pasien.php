<?php
require_once 'Config/DB.php';

class Pasien
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM pasien");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?,?,?,?,?,?,?,?)");
        return $stmt->execute([$data['kode'], $data['nama'], $data['tmp_lahir'], $data['tgl_lahir'], $data['gender'], $data['email'], $data['alamat'], $data['kelurahan_id']]);

    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE pasien SET kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ? WHERE id = ?");
        return $stmt->execute([$data['kode'], $data['nama'], $data['tmp_lahir'], $data['tgl_lahir'], $data['gender'], $data['email'], $data['alamat'], $data['kelurahan_id'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pasien WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$pasien = new Pasien($pdo);
