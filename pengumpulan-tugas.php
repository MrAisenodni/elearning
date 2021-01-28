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
                        <form action="post" enctype="multipart/form-data">
                            <a href=""><h5>Tugas 1.pdf</h5></a>
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