<?php require_once('navbar.php');
if(isset($_GET['kode'])){
  $kode = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_kelas c ON c.id_kelas = b.id_kelas WHERE a.id_file = $kode");
  $data = mysqli_fetch_array($sql);
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
                              <input type="text" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['mapel']." | ".$data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas'] ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Pertemuan</label>
                              <input type="text" name="pert" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['pertemuan'] ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Tugas</label>
                              <input type="text" name="tugas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['nama'] ?>" disabled>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">File</label>
                              <input type="text" name="tugas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo substr($data['file'],14); ?>" disabled>
                            </div>
                            <?php 
                              $no = 1;
                              $sql2 = mysqli_query($con,"SELECT a.id_mapel,a.id_tugas,a.tugas,c.nama,a.pertemuan,d.pertemuan FROM tbl_tugas a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = a.id_user INNER JOIN tbl_file d ON d.id_mapel = b.id_mapel WHERE a.id_mapel = b.id_mapel AND a.pertemuan = d.pertemuan AND d.id_file=$kode"); ?>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">File Siswa</label><br>
                              <?php while ($data2 = mysqli_fetch_array($sql2)) { ?>
                              <a href="download.php?kode=<?= $data2['id_tugas'] ?>"><?php echo $no.". ".substr($data2['tugas'],14)." - ".$data2['nama']; ?></a><br>
                              <?php $no++; } ?>
                            </div>
                          </div>
                        </form>
                        <a href="tugas.php" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

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
