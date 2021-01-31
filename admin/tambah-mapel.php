<?php
$title = 'Tambah Mata Pelajaran';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  $mapel = $_POST['mapel'];
  $kelas = $_POST['kelas'];
  $guru = $_POST['guru'];

  $add = mysqli_query($con, "INSERT INTO tbl_mapel VALUES('','$guru','$kelas','$mapel')");
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
        <div class="col-md-8">
          <div class="white-box">
            <?php require_once('../alert.php'); ?>
            <form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <select class="form-control" name="kelas" required>
                  <option value="">--Pilih Kelas --</option>
                  <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_kelas");
                  while ($data2 = mysqli_fetch_array($sql2)) { ?>
                  <option value="<?= $data2['id_kelas'] ?>"><?php echo $data2['tingkat']." ".strtoupper($data2['jurusan'])." ".$data2['kelas']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Guru</label>
                <select class="form-control" name="guru" required>
                  <option value="">--Pilih Nama Guru--</option>
                  <?php
                  $sql = mysqli_query($con, "SELECT id_user,nama,akses FROM tbl_user WHERE akses='gur'");
                  while($data = mysqli_fetch_array($sql)){
                  ?>
                    <option value="<?= $data['id_user'] ?>"><?= $data['nama'] ?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <a href="mapel.php">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  <i class="fas fa-window-close"></i> Tutup
                </button>
              </a>
              <button type="submit" class="btn btn-primary" name="tambah">
                <i class="fas fa-check"></i> Simpan
              </button>
            </div>
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
