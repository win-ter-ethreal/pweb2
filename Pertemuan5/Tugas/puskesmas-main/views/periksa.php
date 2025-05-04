<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="card w-100">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemeriksaan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pasien_id">Pasien</label>
                                        <select class="form-control" name="pasien_id" required>
                                            <option value="">Pilih Pasien</option>
                                            <?php
                                            require_once('Controllers/pasien.php');
                                            
                                            $pasiens = $pasien->index();
                                            foreach($pasiens as $p) {
                                                echo "<option value='".$p['id']."'>".$p['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="paramedik_id">Paramedik</label>
                                        <select class="form-control" name="paramedik_id" required>
                                            <option value="">Pilih Paramedik</option>
                                            <?php
                                            require_once('Controllers/paramedik.php');
                                            
                                            $paramediks = $paramedik->index();
                                            foreach($paramediks as $par) {
                                                echo "<option value='".$par['id']."'>".$par['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input class="form-control" name="tanggal" type="date" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="berat">Berat Badan</label>
                                        <input class="form-control" name="berat" type="number" placeholder="Berat Badan" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="tensi">Tensi</label>
                                        <input class="form-control" name="tensi" type="text" placeholder="Tensi" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" placeholder="Keterangan" style="height: 10rem;" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="type" value="tambah" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                
                    <table border="1" class="table">
                        <thead  class="thead-dark"  >
                            <tr>
                                <th>no</th>
                                <th>pasien</th>
                                <th>paramedik</th>
                                <th>tanggal</th>
                                <th>berat</th>
                                <th>tensi</th>
                                <th>keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('Controllers/periksa.php');
                            require_once('Controllers/pasien.php');
                            require_once('Controllers/paramedik.php');
                            
                            $nomor = 1;
                            $row = $periksa->index();
                            $pasien = $pasien->index();
                            $paramedik = $paramedik->index();
                            
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['nama_pasien'] . "</td>
                                <td>" . $list['nama_paramedik'] . "</td>
                                <td>" . $list['tanggal'] . "</td>
                                <td>" . $list['berat'] . "</td>
                                <td>" . $list['tensi'] . "</td>
                                <td>" . $list['keterangan'] . "</td>
                                <td>
                                    <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal".$list['id']."'>
                                        Edit
                                    </button>
                                    <div class='modal fade' id='editModal".$list['id']."' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Edit Data Periksa</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form method='POST'>
                                                    <div class='modal-body'>
                                                        <input type='hidden' name='id' value='".$list['id']."'>
                                                        <input type='hidden' name='type' value='edit'>

                                                        <div class='form-group'>
                                                            <label>Pasien</label>
                                                            <select class='form-control' name='pasien_id' required>
                                                                <option value=''>Pilih Pasien</option>";
                                                                foreach($pasien as $p) {
                                                                    $selected = ($p['id'] == $list['pasien_id']) ? 'selected' : '';
                                                                    echo "<option value='".$p['id']."' ".$selected.">".$p['nama']."</option>";
                                                                }
                                                            echo "</select>
                                                        </div>

                                                        <div class='form-group'>
                                                            <label>Paramedik</label>
                                                            <select class='form-control' name='paramedik_id' required>
                                                                <option value=''>Pilih Paramedik</option>";
                                                                foreach($paramedik as $pm) {
                                                                    $selected = ($pm['id'] == $list['paramedik_id']) ? 'selected' : '';
                                                                    echo "<option value='".$pm['id']."' ".$selected.">".$pm['nama']."</option>";
                                                                }
                                                            echo "</select>
                                                        </div>

                                                        <div class='form-group'>
                                                            <label>Tanggal</label>
                                                            <input type='date' class='form-control' name='tanggal' value='".$list['tanggal']."' required>
                                                        </div>

                                                        <div class='form-group'>
                                                            <label>Berat (kg)</label>
                                                            <input type='number' step='0.01' class='form-control' name='berat' value='".$list['berat']."' required>
                                                        </div>

                                                        <div class='form-group'>
                                                            <label>Tensi</label>
                                                            <input type='text' class='form-control' name='tensi' value='".$list['tensi']."' required>
                                                        </div>

                                                        <div class='form-group'>
                                                            <label>Keterangan</label>
                                                            <textarea class='form-control' name='keterangan'>".$list['keterangan']."</textarea>
                                                        </div>
                                                    </div>

                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                                                        <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form method='post' style='display:inline'>
                                        <input type='hidden' name='id' value='".$list['id']."'>
                                        <input type='hidden' name='type' value='delete'>
                                        <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</button>
                                    </form>
                                </td>
                                </tr>
                                ";
                            }
                            if(isset($_POST['type'])) {
                                if($_POST['type'] == 'tambah') {
                                    $data = [
                                        'pasien_id' => $_POST['pasien_id'],
                                        'paramedik_id' => $_POST['paramedik_id'],
                                        'tanggal' => $_POST['tanggal'],
                                        'berat' => $_POST['berat'],
                                        'tensi' => $_POST['tensi'],
                                        'keterangan' => $_POST['keterangan']
                                    ];
                                    
                                    $periksa->create($data);
                                    echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=periksa">';
                                } elseif($_POST['type'] == 'edit') {
                                    $data = [
                                        'pasien_id' => $_POST['pasien_id'],
                                        'paramedik_id' => $_POST['paramedik_id'],
                                        'tanggal' => $_POST['tanggal'],
                                        'berat' => $_POST['berat'],
                                        'tensi' => $_POST['tensi'],
                                        'keterangan' => $_POST['keterangan']
                                    ];
                                    
                                    $periksa->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=periksa">';
                                } elseif($_POST['type'] == 'delete') {
                                    $periksa->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=periksa">';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Pemeriksaan
                    </button>
                    </div>
                </div>
            </div>
            
            <!-- /.card -->
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <!-- /.card -->
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>