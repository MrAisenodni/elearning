<?php
$title = 'Tambah Materi';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  date_default_timezone_set('Asia/Jakarta');
  $mapel = $_POST['mapel'];
  $pert = $_POST['pert'];
  $materi = $_POST['materi'];
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

  if($mapel == null || $materi==null || $pert==null || $error === 4) {
    header('location:materi.php?stat=input_null');
  } elseif(!in_array($ext, $extensi)) {
    header('location:materi.php?stat=file_ext');
  }else{
    if($ukfile < 10000000){
      move_uploaded_file($tmp, $lokasi.$namafile);
      $add = mysqli_query($con,"INSERT INTO `tbl_file`(`id_mapel`, `pertemuan`, `nama`, `tipe`, `file`, `tgl_tambah`) VALUES ('$mapel', '$pert', '$materi', 'mod', '$save$namafile', '$tgl')");
      if($add){
        header('location:materi.php?stat=input_success');
      }else{
        header('location:materi.php?stat=input_failed');
      }
    }else{
      header('location:materi.php?stat=size_file_too_large');
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
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Materi</label>
                <input type="text" name="materi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">File</label>
                <input type="file" name="file" class="form-control-file" id="modul" placeholder="Masukkan File" required>
              </div>
            </div>
            <div class="modal-footer">
              <a href="materi.php">
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
