<?php
$title = 'Kelola Mata Pelajaran';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  $mapel = $_POST['mapel'];
  $kelas = $_POST['kelas'];
  $guru = $_POST['guru'];

  $add = mysqli_query($con, "INSERT INTO tbl_mapel VALUES('','$guru','$mapel','$kelas')");
  if($add){
    header('location:mapel.php?stat=input_success');
  }else{
    header('location:mapel.php?stat=input_failed');
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
                <?php require_once('../alert.php') ?>
                <h3 class="box-title">Kelola Mata Pelajaran</h3>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-lg-9">
                        <button type="button" class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus-square"></i>
                                Tambah Mapel
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input type="text" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Guru</label>
                                <select class="form-control" name="guru">
                                  <option value="">--Pilih Nama Guru--</option>
                                  <?php
                                  $sql = mysqli_query($con, "SELECT id_user,nama,akses FROM tbl_user WHERE akses='gur'");
                                  while($data = mysqli_fetch_array($sql)){
                                  ?>
                                    <option value="<?= $data['id_user'] ?>"><?= $data['nama'] ?></option>
                                  <?php }?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div> -->
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
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Guru</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,'SELECT id_mapel,mapel,tbl_mapel.kelas as kelas,nama FROM tbl_mapel INNER JOIN tbl_user on tbl_user.id_user = tbl_mapel.id_user');
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['mapel'] ?></td>
                                <td><?= $data['kelas'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <a href="edit-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="del-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-info">
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
