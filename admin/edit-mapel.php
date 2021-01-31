<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE a.id_mapel='$id'");
  $data = mysqli_fetch_array($sql);
}

if(isset($_POST['update'])){
  $idm = $_POST['idm'];
  $mapel = $_POST['mapel'];
  $kelas = $_POST['kelas'];
  $guru = $_POST['guru'];

  $update = mysqli_query($con, "UPDATE tbl_mapel SET
  id_user='$guru',
  id_kelas='$kelas',
  mapel='$mapel' WHERE id_mapel='$id'");
  if($update){
    header('location:mapel.php?stat=update_success');
  }else{
    header('location:mapel.php?stat=update_failed');
  }
}
?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="white-box">
                          <form method="post">
                              <input type="hidden"  value="<?= $data['id_mapel']?>" name="idm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input type="text"  value="<?= $data['mapel']?>" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <select class="form-control" name="kelas" required>
                                  <option value="<?= $data['id_kelas'] ?>"><?php echo $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas']; ?></option>
                                  <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_kelas");
                                  while ($data2 = mysqli_fetch_array($sql2)) { ?>
                                  <option value="<?= $data2['id_kelas'] ?>"><?php echo $data2['tingkat']." ".strtoupper($data2['jurusan'])." ".$data2['kelas']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Guru</label>
                                <select class="form-control" name="guru">
                                  <option value="<?= $data['id_user']?>"><?= $data['nama']?></option>
                                  <?php
                                  $sql = mysqli_query($con, "SELECT id_user,nama,akses FROM tbl_user WHERE akses='gur'");
                                  while($data1 = mysqli_fetch_array($sql)){
                                    if($data1['id_user']==$data['id_user']){
                                      continue;
                                    }
                                  ?>
                                    <option value="<?= $data1['id_user'] ?>"><?= $data1['nama'] ?></option>
                                  <?php }?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" name="update">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="mapel.php" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            </form>

                          </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
<?php require_once('footer.php');?>
