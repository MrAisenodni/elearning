<?php
$title = 'Tambah Tugas';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  date_default_timezone_set('Asia/Jakarta');
  $mapel = $_POST['mapel'];
  $pert = $_POST['pert'];
  $tugas = $_POST['tugas'];
  $tgl = date('Y-m-d');

  $namafile = $_FILES['file']['name'];
  $tipefile = $_FILES['file']['type'];
  $ukfile = $_FILES['file']['size'];
  $tmp = $_FILES['file']['tmp_name'];
  $error = $_FILES['file']['error'];

  $extensi = ['pdf'];
  $ext = pathinfo($namafile, PATHINFO_EXTENSION);
  $lokasi = "../dokumen/materi/";
  $save = "dokumen/materi/";

  if($mapel == null || $tugas==null || $pert==null || $error === 4) {
    header('location:tugas.php?stat=input_null');
  } elseif(!in_array($ext, $extensi)) {
    header('location:tugas.php?stat=file_ext');
  }else{
    if($ukfile < 10000000){
      move_uploaded_file($tmp, $lokasi.$namafile);
      $add = mysqli_query($con,"INSERT INTO `tbl_file`(`id_mapel`, `pertemuan`, `nama`, `tipe`, `file`, `tgl_up`) VALUES ('$mapel', '$pert', '$tugas', 'tgs', '$save$namafile', '$tgl')");
      if($add){
        header('location:tugas.php?stat=input_success');
      }else{
        header('location:tugas.php?stat=input_failed');
      }
    }else{
      header('location:tugas.php?stat=size_file_too_large');
    }
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
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mata Pelajaran</label>
                    <select class="form-control" name="mapel" required>
                      <option value="">--Pilih Mata Pelajaran--</option>
                      <?php
                      $sql = "";
                      if($aksesu=='gur'){
                        $sql = mysqli_query($con, "SELECT id_mapel,id_user,mapel,kelas FROM tbl_mapel WHERE id_user='$idu'");
                      }
                      while($data = mysqli_fetch_array($sql)){
                      ?>
                        <option value="<?= $data['id_mapel'] ?>"><?php echo $data['mapel']." | ".$data['kelas'] ?></option>
                      <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pertemuan</label>
                    <select class="form-control" name="pert" required>
                      <option value="">--Pilih Mata Pertemuan--</option>
                      <?php for($i=1;$i<=20;$i++){ ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama tugas</label>
                    <input type="text" name="tugas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File</label>
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" placeholder="Masukkan File" required>
                </div>
            </div>
            <div class="modal-footer">
              <a href="tugas.php">
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
