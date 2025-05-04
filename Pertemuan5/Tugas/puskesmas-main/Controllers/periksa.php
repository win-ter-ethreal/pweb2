<?php
require_once 'Config/DB.php';

class Periksa
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->prepare("
    SELECT 
        periksa.*,
        pasien.nama AS nama_pasien,
        paramedik.nama AS nama_paramedik
    FROM periksa
    INNER JOIN pasien ON periksa.pasien_id = pasien.id
    INNER JOIN paramedik ON periksa.paramedik_id = paramedik.id
");
$stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO periksa (pasien_id, paramedik_id, tanggal, berat, tensi, keterangan) VALUES (?,?,?,?,?,?)");
        return $stmt->execute([$data['pasien_id'], $data['paramedik_id'], $data['tanggal'], $data['berat'], $data['tensi'], $data['keterangan']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE periksa SET pasien_id = ?, paramedik_id = ?, tanggal = ?, berat = ?, tensi = ?, keterangan = ? WHERE id = ?");
        return $stmt->execute([$data['pasien_id'], $data['paramedik_id'], $data['tanggal'], $data['berat'], $data['tensi'], $data['keterangan'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM periksa WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

$periksa = new Periksa($pdo);
