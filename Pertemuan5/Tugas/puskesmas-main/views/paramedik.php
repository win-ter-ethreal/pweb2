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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Paramedik</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="Nama" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="l" type="radio" name="gender" value="L" required />
                                            <label class="form-check-label" for="l">L</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="p" type="radio" name="gender" value="P" required />
                                            <label class="form-check-label" for="p">P</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input class="form-control" name="tmp_lahir" type="text" placeholder="Tempat Lahir" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input class="form-control" name="tgl_lahir" type="date" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <input class="form-control" name="kategori" type="text" placeholder="Kategori" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="telpon">Telpon</label>
                                        <input class="form-control" name="telpon" type="text" placeholder="Telpon" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="Alamat" style="height: 10rem;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Unit Kerja</label>
                                        <select class="form-control" name="unit_kerja_id" required>
                                            <option value="">Pilih Unit Kerja</option>
                                            <?php
                                            require_once('Controllers/unit_kerja.php');
                                            
                                            $unit_kerjas = $unit_kerja->index();
                                            foreach($unit_kerjas as $uk) {
                                                echo "<option value='".$uk['id']."'>".$uk['nama']."</option>";
                                            }
                                            ?>
                                        </select>
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
                        <thead  class="thead-dark">
                            <tr>
                                <th>no</th>
                                <th>nama pasien</th>
                                <th>jenis kelamin</th>
                                <th>tempat lahir</th>
                                <th>tanggal lahir</th>
                                <th>kategori</th>
                                <th>telepon</th>
                                <th>alamat</th>
                                <th>kantor</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('Controllers/paramedik.php');
                            require_once('Controllers/Unit_kerja.php');
                            $nomor = 1;
                            $unit_kerja = $unit_kerja->index();
                            $row = $paramedik->show();
                            foreach ($row as $list) {
                                echo "
                                <tr>
                                <td>" . $nomor++ . "</td>
                                <td>" . $list['nama'] . "</td>
                                <td>" . $list['gender'] . "</td>
                                <td>" . $list['tmp_lahir'] . "</td>
                                <td>" . $list['tgl_lahir'] . "</td>
                                <td>" . $list['kategori'] . "</td>
                                <td>" . $list['telpon'] . "</td>
                                <td>" . $list['alamat'] . "</td>
                                <td>" . $list['kantor'] . "</td>
                                <td>
                                    <button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal".$list['id']."'>
                                        Edit
                                    </button>
                                    <div class='modal fade' id='editModal".$list['id']."' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Edit Data Paramedik</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form method='post'>
                                                    <div class='modal-body'>
                                                        <input type='hidden' name='id' value='".$list['id']."'>
                                                        <input type='hidden' name='type' value='edit'>
                                                        <div class='form-group'>
                                                            <label>Nama</label>
                                                            <input type='text' class='form-control' name='nama' value='".$list['nama']."' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Gender</label>
                                                            <select class='form-control' name='gender' required>
                                                                <option value='L' ".($list['gender'] == 'L' ? 'selected' : '').">Laki-laki</option>
                                                                <option value='P' ".($list['gender'] == 'P' ? 'selected' : '').">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Tempat Lahir</label>
                                                            <input type='text' class='form-control' name='tmp_lahir' value='".$list['tmp_lahir']."' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Tanggal Lahir</label>
                                                            <input type='date' class='form-control' name='tgl_lahir' value='".$list['tgl_lahir']."' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Kategori</label>
                                                            <select class='form-control' name='kategori' required>
                                                                <option value='Umum' ".($list['kategori'] == 'Umum' ? 'selected' : '').">Umum</option>
                                                                <option value='Spesialis' ".($list['kategori'] == 'Spesialis' ? 'selected' : '').">Spesialis</option>
                                                            </select>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Telpon</label>
                                                            <input type='text' class='form-control' name='telpon' value='".$list['telpon']."' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Alamat</label>
                                                            <textarea class='form-control' name='alamat' required>".$list['alamat']."</textarea>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label>Unit Kerja</label>
                                                            <select class='form-control' name='unit_kerja_id' required>";
                                                            foreach($unit_kerja as $uk) {
                                                                $selected = ($uk['id'] == $list['unit_kerja_id']) ? 'selected' : '';
                                                                echo "<option value='".$uk['id']."' ".$selected.">".$uk['nama']."</option>";
                                                            }
                                                            echo "</select>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='submit' class='btn btn-primary'>Save changes</button>
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
                            if(isset($_POST['type'])){
                                if($_POST['type']=='tambah'){
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'gender' => $_POST['gender'],
                                        'tmp_lahir' => $_POST['tmp_lahir'],
                                        'tgl_lahir' => $_POST['tgl_lahir'],
                                        'kategori' => $_POST['kategori'],
                                        'telpon' => $_POST['telpon'],
                                        'alamat' => $_POST['alamat'],
                                        'unit_kerja_id' => $_POST['unit_kerja_id']
                                    ];
                                    
                                    $paramedik->create($data);
                                    echo '<script>alert("Data berhasil ditambahkan")</script><meta http-equiv="refresh" content="0; url=?url=paramedik">';
                                } elseif($_POST['type']=='edit') {
                                    $data = [
                                        'nama' => $_POST['nama'],
                                        'gender' => $_POST['gender'],
                                        'tmp_lahir' => $_POST['tmp_lahir'],
                                        'tgl_lahir' => $_POST['tgl_lahir'],
                                        'kategori' => $_POST['kategori'],
                                        'telpon' => $_POST['telpon'],
                                        'alamat' => $_POST['alamat'],
                                        'unit_kerja_id' => $_POST['unit_kerja_id']
                                    ];
                                    
                                    $paramedik->update($_POST['id'], $data);
                                    echo '<script>alert("Data berhasil diupdate")</script><meta http-equiv="refresh" content="0; url=?url=paramedik">';
                                } elseif($_POST['type']=='delete') {
                                    $paramedik->delete($_POST['id']);
                                    echo '<script>alert("Data berhasil dihapus")</script><meta http-equiv="refresh" content="0; url=?url=paramedik">';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Paramedik
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