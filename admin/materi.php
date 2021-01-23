<?php
$title = 'Materi';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  $mapel = $_POST['mapel'];
  $pert = $_POST['pert'];
  $materi = $_POST['materi'];

  $add = mysqli_query($con, "INSERT INTO tbl_materi VALUES('','$mapel','$pert','$materi')");
  if($add){
    header('location:materi.php?stat=input_success');
  }else{
    header('location:materi.php?stat=input_failed');
  }
}
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Tabel Materi</h3>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-lg-9">
                        <button type="button" class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus-square"></i>
                                Tambah Materi
                        </button>
                        <br><br>
                    </div>
                    <div class="col-lg-3">
                        <form>
                            <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari....">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pertemuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <select class="form-control" name="mapel">
                                  <option value="">--Pilih Mata Pelajaran--</option>
                                  <?php
                                  $sql = "";
                                  if($aksesu=='gur'){
                                    $sql = mysqli_query($con, "SELECT id_mapel,id_user,mapel,kelas FROM tbl_mapel WHERE id_user='$idu'");
                                  }else{
                                    $sql = mysqli_query($con, "SELECT id_mapel,tbl_mapel.id_user,mapel,nama,tbl_mapel.kelas,akses FROM tbl_mapel
                                      INNER JOIN tbl_user ON tbl_user.id_user = tbl_mapel.id_user WHERE akses='gur'");
                                  }
                                  while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <option value="<?= $data['id_mapel'] ?>"><?php if($aksesu=='adm'){echo $data['mapel']." | ".$data['nama']; }else{echo $data['mapel']; }  ?></option>
                                  <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pertemuan</label>
                                <select class="form-control" name="mapel">
                                  <option value="">--Pilih Mata Pertemuan--</option>
                                  <?php
                                  $sql = "";
                                  if($aksesu=='gur'){
                                    $sql = mysqli_query($con, "SELECT id_mapel,id_user,mapel,kelas FROM tbl_mapel WHERE id_user='$idu'");
                                  }else{
                                    $sql = mysqli_query($con, "SELECT id_pert,tbl_mapel.id_user,mapel,nama,tbl_mapel.kelas,akses FROM tbl_mapel
                                      INNER JOIN tbl_user ON tbl_user.id_user = tbl_mapel.id_user WHERE akses='gur'");
                                  }
                                  while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <option value="<?= $data['id_mapel'] ?>"><?= $data['mapel'] ?></option>
                                  <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pertemuan</label>
                                <input type="text" name="pert" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-window-close"></i> Tutup
                        </button>
                        <button type="submit" class="btn btn-primary" name="tambah">
                            <i class="fas fa-check"></i> Simpan
                        </button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Pelajaran</th>
                                <th class="border-top-0">Pertemuan</th>
                                <th class="border-top-0">Guru</th>
                                <th class="border-top-0">Materi</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,'SELECT tbl_materi.id_materi,materi,mapel,pertemuan,nama FROM tbl_materi
                              INNER JOIN tbl_mapel on tbl_mapel.id_mapel = tbl_materi.id_mapel
                              INNER JOIN tbl_pertemuan on tbl_pertemuan.id_pert = tbl_materi.id_pert
                              INNER JOIN tbl_user on tbl_user.id_user = tbl_mapel.id_user');
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['mapel'] ?></td>
                                <td><?= $data['pertemuan'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['materi'] ?></td>
                                <td>
                                    <a href="edit-materi.php?id=<?= $data['id_materi'] ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="del-materi.php?id=<?= $data['id_materi'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-materi.php?id=<?= $data['id_materi'] ?>" class="btn btn-info">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                            </tr>
                          <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
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
