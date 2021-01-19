<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $search = mysqli_query($con, "SELECT id_pert,mapel,pertemuan,nama FROM tbl_pertemuan
    INNER JOIN tbl_mapel on tbl_mapel.id_mapel = tbl_pertemuan.id_mapel
    INNER JOIN tbl_user on tbl_user.id_user = tbl_mapel.id_user
    WHERE id_pert='$id'");
  $data = mysqli_fetch_array($search);
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
                                <label for="exampleInputEmail1">Pertemuan</label>
                                <input type="text" disabled value="<?= $data['pertemuan']?>" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Guru</label>
                                <input type="text" disabled value="<?= $data['nama']?>" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            </form>
                            <a href="pertemuan.php" class="btn btn-primary">
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
