<?php
$title = 'Dashboard';
require_once('navbar.php');
$nummod = mysqli_query($con,"SELECT COUNT('tipe') as modul FROM tbl_file INNER JOIN tbl_mapel ON tbl_mapel.id_mapel = tbl_file.id_mapel WHERE tbl_file.tipe='mod' AND tbl_mapel.id_user='$idu'");
$datamod = mysqli_fetch_array($nummod);

$numtgs = mysqli_query($con,"SELECT COUNT('tipe') as tugas FROM tbl_file INNER JOIN tbl_mapel ON tbl_mapel.id_mapel = tbl_file.id_mapel WHERE tbl_file.tipe='tgs' AND tbl_mapel.id_user='$idu'");
$datatgs = mysqli_fetch_array($numtgs);
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Materi</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-success"><?= $datamod['modul'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Tugas</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-purple"><?= $datatgs['tugas'] ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php');?>
