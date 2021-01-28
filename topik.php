<?php require_once('navbar-mapel.php');
    if(isset($_GET['file'])) {
        $namafile = basename($_GET['file']);

        if(!empty($filename) && file_exists($filename)) {
            header("Cache-Control: public");
            header("Content-Desription: File Transfer");
            header("Content-Disposition: attachment; filename=$namafile");
            header("Content-Type: application/pdf");
            header("Content-Transfer-Encoding: binary");

            readfile($lokasi);
            exit;
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
                <h3 class="box-title">Mata Pelajaran</h3>
                <hr>
                <div class="row">
                    <?php 
                        for($i=1;$i<=20;$i++) {
                            $sql2 = mysqli_query($con, "SELECT b.id_user, a.id_file, a.nama, a.pertemuan, a.file FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = b.id_user WHERE a.tipe='mod' AND b.id_user='$kd' AND b.kelas = '$kelasu' AND a.pertemuan = $i");
                            $sql3 = mysqli_query($con, "SELECT b.id_user, a.id_file, a.nama, a.pertemuan, a.file FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = b.id_user WHERE a.tipe='tgs' AND b.id_user='$kd' AND b.kelas = '$kelasu' AND a.pertemuan = $i");
                    ?>
                    <div class="col-lg-12">
                        <h3>Pertemuan <?= $i; ?></h3>
                        <hr>
                        <div id="section-<?= $i; ?>" class="col-md-12">
                            <?php while ($data2 = mysqli_fetch_array($sql2)) { ?>
                            <a href="topik.php?kode=<?= $data2['id_user'] ?>&file=dokumen/materi/BUKU BIMBINGAN TA-SKRIPSI.pdf"><h5><?= $data2['nama']; ?></h5></a>
                            <?php } while ($data3 = mysqli_fetch_array($sql3)) { ?>
                            <a href="pengumpulan-tugas.php?kode=<?= $data3['id_user'] ?>"><h5>Pengumpulan Tugas</h5></a>
                            <?php } ?>
                        </div>
                        <hr>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php');?>