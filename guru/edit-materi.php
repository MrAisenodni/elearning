<?php require_once('navbar.php');
if(isset($_GET['kode'])){
  $kode = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_kelas c ON c.id_kelas = b.id_kelas WHERE a.id_file = $kode");
  $data = mysqli_fetch_array($sql);
}

if(isset($_POST['update'])){
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

  if($mapel == null || $materi==null || $pert==null) {
    header('location:edit-materi.php?stat=input_null');
  } elseif($namafile == null) {
    $add = mysqli_query($con,"UPDATE `tbl_file` SET `id_mapel`='$mapel',`pertemuan`='$pert',`nama`='$materi',`tipe`='mod',`tgl_ubah`='$tgl' WHERE id_file = '$kode'");
    if($add){
      header('location:materi.php?stat=update_success');
    }else{
      header('location:materi.php?stat=update_failed');
    }
  } elseif(!in_array($ext, $extensi)) {
    header('location:edit-materi.php?stat=file_ext');
  }else{
    if($ukfile < 10000000){
      move_uploaded_file($tmp, $lokasi.$namafile);
      $add = mysqli_query($con,"UPDATE `tbl_file` SET `id_mapel`='$mapel',`pertemuan`='$pert',`nama`='$materi',`tipe`='mod',`file`='$save$namafile',`tgl_ubah`='$tgl' WHERE id_file = '$kode'");
      if($add){
        header('location:materi.php?stat=update_success');
      }else{
        header('location:materi.php?stat=update_failed');
      }
    }else{
      header('location:edit-materi.php?stat=size_file_too_large');
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
                                <option value="<?= $data['id_mapel'] ?>"><?php echo $data['mapel']." | ".$data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas'] ?></option>
                                <?php
                                $sql = "";
                                if($aksesu=='gur'){
                                  $sql2 = mysqli_query($con, "SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas WHERE a.id_user='$idu'");
                                }
                                while($data2 = mysqli_fetch_array($sql2)){
                                ?>
                                  <option value="<?= $data['id_mapel'] ?>"><?php echo $data2['mapel']." | ".$data2['tingkat']." ".strtoupper($data2['jurusan'])." ".$data2['kelas'] ?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Pertemuan</label>
                              <select class="form-control" name="pert" required>
                                <option value="<?= $data['pertemuan'] ?>"><?= $data['pertemuan'] ?></option>
                                <?php for($i=1;$i<=20;$i++){ ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Materi</label>
                              <input type="text" name="materi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">File</label>
                              <input type="file" name="file" class="form-control-file" id="modul" placeholder="Masukkan File">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="materi.php">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="fas fa-window-close"></i> Batal
                              </button>
                            </a>
                            <button type="submit" class="btn btn-primary" name="update">
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
