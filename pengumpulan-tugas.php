<?php require_once('navbar-mapel.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql2 = mysqli_query($con, "SELECT a.id_mapel, b.mapel, b.id_user, a.id_file, a.nama, a.pertemuan, a.file FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = b.id_user WHERE a.tipe='tgs' AND a.id_file='$id' AND b.kelas = '$kelasu'");
        $data2 = mysqli_fetch_array($sql2);
    }
    if (isset($_POST['upload'])) {
        date_default_timezone_set('Asia/Jakarta');
        $mapel = $data['id_mapel'];
        $pert = $data2['pertemuan'];
        $tgl = date('Y-m-d');

        $namafile = $_FILES['file']['name'];
        $tipefile = $_FILES['file']['type'];
        $ukfile = $_FILES['file']['size'];
        $tmp = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];

        $extensi = ['pdf'];
        $ext = pathinfo($namafile, PATHINFO_EXTENSION);
        $lokasi = "../dokumen/tugas/";
        $save = "dokumen/tugas/";

        if($error === 4) {
            header("location:pengumpulan-tugas.php?kode=$kd&id=$id&stat=input_null");
        } elseif(!in_array($ext, $extensi)) {
            header("location:pengumpulan-tugas.php?kode=$kd&id=$id&stat=file_ext");
        } else {
            if($ukfile < 10000000){
                move_uploaded_file($tmp, $lokasi.$namafile);
                $add = mysqli_query($con,"INSERT INTO `tbl_tugas`(`id_user`, `id_mapel`, `pertemuan`, `tugas`, `tgl_up`) VALUES ('$idu','$mapel','$pert','$save$namafile','$tgl')");
                if($add){
                    header("location:pengumpulan-tugas.php?kode=$kd&id=$id&stat=input_success");
                }else{
                    header("location:pengumpulan-tugas.php?kode=$kd&id=$id&stat=input_failed");
                }
            }else{
                header("location:pengumpulan-tugas.php?kode=$kd&id=$id&stat=size_file_too_large");
            }
        }
    }
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-12 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pengumpulan Tugas | Pertemuan <?= $data2['pertemuan']; ?></h3>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <?php require_once('alert.php'); ?>
                        <form method="post" class="mb-2 ml-3" enctype="multipart/form-data">
                            <div class="form-label mb-3">
                                <label for="exampleInputEmail1" class="form-label">Modul Tugas</label><br>
                                <img src="asset/pdf.svg" width="20px" height="20px">
                                <a href="download.php?kode=<?= $data2['id_file'] ?>" name="file">&nbsp&nbsp&nbsp<?= $data2['nama'] ?></a>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Upload Tugas</label>
                                <?php 
                                $pert1 = $data2['pertemuan'];
                                $sql3 = mysqli_query($con, "SELECT * FROM tbl_tugas a INNER JOIN tbl_file b ON b.id_mapel=a.id_mapel WHERE a.pertemuan='$pert1'");
                                $data3 = mysqli_fetch_array($sql3);
                                if($data3 == null) {
                                ?>
                                <input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?php } else { ?>
                                <br><img src="asset/pdf.svg" width="20px" height="20px">
                                <a href="download.php?kode=<?= $data3['id_tugas'] ?>" name="file">&nbsp&nbsp&nbsp<?= substr($data3['tugas'],14); ?></a>
                                <?php } ?>
                            </div>
                            <?php if ($data3 == null) { ?>
                            <button type="submit" class="btn btn-success" name="upload" style="color: white;">
                                <i class="fas fa-check"></i> Upload
                            </button>
                            <?php } ?>
                            <a href="topik.php?kode=<?= $data['id_user']; ?>" class="btn btn-danger" style="color: white;">
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