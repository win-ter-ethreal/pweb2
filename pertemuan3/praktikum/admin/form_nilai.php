<?php 
    include_once 'top.php';
?>
              <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php 
                    include_once 'menu.php';
                ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Form Nilai</h1>
                    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
                        <div class="col-8">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                              </div>
                            </div> 
                            <input id="nama" name="nama" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
                        <div class="col-8">
                          <select id="matkul" name="matkul" class="custom-select">
                            <?php 
                                foreach ($data_matkul as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nilai_uts" class="col-4 col-form-label">Nilai UTS</label> 
                        <div class="col-8">
                          <input id="nilai_uts" name="nilai_uts" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label> 
                        <div class="col-8">
                          <input id="nilai_uas" name="nilai_uas" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nilai_tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
                        <div class="col-8">
                          <input id="nilai_tugas" name="nilai_tugas" type="text" class="form-control">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
<?php 
    include_once 'bottom.php';
?>