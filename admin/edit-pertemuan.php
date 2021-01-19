<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $search = mysqli_query($con, "SELECT id_pert,tbl_pertemuan.id_mapel as idm,mapel,pertemuan FROM tbl_pertemuan
    INNER JOIN tbl_mapel on tbl_mapel.id_mapel = tbl_pertemuan.id_mapel
    WHERE id_pert='$id'");
  $data = mysqli_fetch_array($search);
}

if(isset($_POST['up'])){
  $idp = $_POST['idp'];
  $mapel = $_POST['mapel'];
  $pert = $_POST['pert'];

  $up = mysqli_query($con, "UPDATE tbl_pertemuan SET
  id_mapel='$mapel',
  pertemuan='$pert' WHERE id_pert='$idp'");
  if($up){
    header('location:pertemuan.php?stat=update_success');
  }else{
    header('location:pertemuan.php?stat=update_failed');
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
                              <input type="hidden"  value="<?= $data['id_pert']?>" name="idp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <select class="form-control" name="mapel">
                                  <option value="<?= $data['idm']?>"><?= $data['mapel']?></option>
                                  <?php
                                  $sql = mysqli_query($con, "SELECT id_mapel,tbl_mapel.id_user,mapel,nama,tbl_mapel.kelas,akses FROM tbl_mapel
                                    INNER JOIN tbl_user ON tbl_user.id_user = tbl_mapel.id_user WHERE akses='gur'");
                                  while($data1 = mysqli_fetch_array($sql)){
                                    if($data1['id_mapel']==$data['idm']){
                                      continue;
                                    }
                                  ?>
                                    <option value="<?= $data1['id_mapel'] ?>"><?= $data1['mapel'] ?></option>
                                  <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pertemuan</label>
                                <input type="text" value="<?= $data['pertemuan']?>" name="pert" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-success" name="up">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="pengguna.php" class="btn btn-primary">
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
