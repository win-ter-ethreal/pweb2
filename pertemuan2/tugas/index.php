<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Nilai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title text-center">Form Input Nilai</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
                                <select id="mata_kuliah" name="mata_kuliah" class="form-select" required>
                                    <option value="Pemrograman Web">Pemrograman Web</option>
                                    <option value="Basis Data">Basis Data</option>
                                    <option value="Jaringan Komputer">Jaringan Komputer</option>
                                    <option value="UI/UX">UI/UX</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nilai_uts" class="form-label">Nilai UTS</label>
                                <input type="number" id="nilai_uts" name="nilai_uts" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nilai_uas" class="form-label">Nilai UAS</label>
                                <input type="number" id="nilai_uas" name="nilai_uas" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nilai_tugas" class="form-label">Nilai Praktikum</label>
                                <input type="number" id="nilai_tugas" name="nilai_tugas" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['save'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $mata_kuliah = $_POST['mata_kuliah'];
            $nilai_uts = $_POST['nilai_uts'];
            $nilai_uas = $_POST['nilai_uas'];
            $nilai_tugas = $_POST['nilai_tugas'];

            // Hitung nilai total
            $nilai_total = $nilai_uts * 0.3 + $nilai_uas * 0.35 + $nilai_tugas * 0.35;

            // Tentukan status
            $status = "";
            if ($nilai_total >= 56) {
                $status = "Lulus";
            } else {
                $status = "Tidak Lulus";
            }

            // Tentukan grade
            if ($nilai_total > 100 || $nilai_total < 0) {
                $grade = "I"; 
            } elseif ($nilai_total >= 85) {
                $grade = "A";
            } elseif ($nilai_total >= 70) {
                $grade = "B";
            } elseif ($nilai_total >= 56) {
                $grade = "C";
            } elseif ($nilai_total >= 36) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            // Tentukan keterangan menggunakan switch case
            $keterangan = "";
            switch ($grade) {
                case "A":
                    $keterangan = "Sangat Memuaskan";
                    break;
                case "B":
                    $keterangan = "Memuaskan";
                    break;
                case "C":
                    $keterangan = "Cukup";
                    break;
                case "D":
                    $keterangan = "Kurang";
                    break;
                case "E":
                    $keterangan = "Sangat Kurang";
                    break;
                case "I":
                    $keterangan = "Tidak Ada";
                    break;
                default:
                    $keterangan = "Grade tidak valid";
                    break;
            }

            // Tampilkan hasil
            echo '
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h2 class="card-title text-center">Hasil Perhitungan Nilai</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama Lengkap:</strong> ' . $nama . '</p>
                            <p><strong>Mata Kuliah:</strong> ' . $mata_kuliah . '</p>
                            <p><strong>Nilai UTS:</strong> ' . $nilai_uts . '</p>
                            <p><strong>Nilai UAS:</strong> ' . $nilai_uas . '</p>
                            <p><strong>Nilai Tugas:</strong> ' . $nilai_tugas . '</p>
                            <p><strong>Nilai Total:</strong> ' . $nilai_total . '</p>
                            <p><strong>Status:</strong> ' . $status . '</p>
                            <p><strong>Grade:</strong> ' . $grade . '</p>
                            <p><strong>Keterangan:</strong> ' . $keterangan . '</p>
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
