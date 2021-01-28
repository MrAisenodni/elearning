<?php require_once('navbar-mapel.php'); 
    if(isset($_POST['upload'])) {

    }
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pengumpulan Tugas - Vclass 1</h3>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <?php $sql2 = mysqli_query($con, "SELECT b.id_user, a.id_file, a.nama, a.pertemuan, a.file FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = b.id_user WHERE a.tipe='tgs' AND b.id_user='$kd' AND b.kelas = '$kelasu'");
                            while ($data2 = mysqli_fetch_array($sql2)) {
                         ?>
                        <form method="get" class="mb-2 ml-3">
                            <div class="row">
                                <img src="asset/pdf.svg" width="20px" height="20px">
                                <a href="download.php?kode=<?= $data2['id_file'] ?>" name="file">&nbsp&nbsp&nbsp<?= $data2['nama'] ?></a>
                            </div>
                        </form>
                        <?php } ?>
                        <form action="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Upload File</label>
                                <input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <a href="" class="btn btn-success" name="upload" style="color: white;">
                                <i class="fas fa-check"></i> Upload
                            </a>
                            <a href="topik.php?kode=<?= $kd; ?>" class="btn btn-danger" style="color: white;">
                                <i class="fas fa-window-close"></i> Batal
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php');?>