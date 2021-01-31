<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = mysqli_query($con, "SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE a.id_mapel='$id'");
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
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input type="text" disabled value="<?= $data['mapel']?>" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input type="text" disabled value="<?php echo $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas']; ?>" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Guru</label>
                                <input type="text" disabled value="<?= $data['nama']?>" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            </form>
                            <a href="mapel.php" class="btn btn-primary">
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
