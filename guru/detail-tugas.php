<?php require_once('navbar.php');
if(isset($_GET['kode'])){
  $kode = $_GET['kode'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel=a.id_mapel WHERE a.id_file = $kode");
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
                              <select class="form-control" name="mapel" disabled>
                                <option value="<?= $data['id_mapel'] ?>"><?php echo $data['mapel']." | ".$data['kelas'] ?></option>
                                <?php
                                $sql = "";
                                if($aksesu=='gur'){
                                  $sql2 = mysqli_query($con, "SELECT id_mapel,id_user,mapel,kelas FROM tbl_mapel WHERE id_user='$idu'");
                                }
                                while($data2 = mysqli_fetch_array($sql2)){
                                ?>
                                  <option value="<?= $data['id_mapel'] ?>"><?php echo $data2['mapel']." | ".$data2['kelas'] ?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Pertemuan</label>
                              <select class="form-control" name="pert" disabled>
                                <option value="<?= $data['pertemuan'] ?>"><?= $data['pertemuan'] ?></option>
                                <?php for($i=1;$i<=20;$i++){ ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                              </select>
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
                              $sql2 = mysqli_query($con,"SELECT * FROM tbl_tugas a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = a.id_user INNER JOIN tbl_file d ON d.id_mapel = b.id_mapel WHERE a.id_mapel=b.id_mapel AND d.id_file=$kode"); ?>
                            <div class="form-group">
                              <label for="exampleFormControlFile1">File Siswa</label><br>
                              <?php while ($data2 = mysqli_fetch_array($sql2)) { ?>
                              <a href="download.php?kode=<?= $data['id_tugas']; ?>"><?php echo $no.". ".substr($data2['tugas'],14)." - ".$data2['nama']; ?></a><br>
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
