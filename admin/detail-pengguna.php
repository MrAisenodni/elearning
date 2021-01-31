<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_user a LEFT JOIN tbl_kelas b ON b.id_kelas = a.id_kelas WHERE id_user='$id'");
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
                          <form>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" value="<?= $data['nama'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <input type="text" value="<?= $data['jenkel'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Tgl Lahir</label>
                                <input type="date" value="<?= $data['tgl_lahir'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Telp</label>
                                <input type="text" value="<?= $data['telp'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" value="<?= $data['kelas'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="email" value="<?= $data['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Akses</label>
                                <input type="text" value="<?php  if($data['akses']=='adm') { echo "Admin";} elseif($data['akses']=='gur') { echo "Guru";} else { echo "Siswa";} ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                              </div>
                            </form>
                            <a href="pengguna.php" class="btn btn-primary">
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
