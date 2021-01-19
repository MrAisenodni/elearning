<?php
$title = 'Dashboard';
require_once('navbar.php');
$numadm = mysqli_query($con,"SELECT COUNT('akses') as adm FROM tbl_user WHERE akses='adm'");
$dataadm  = mysqli_fetch_array($numadm);

$numguru = mysqli_query($con,"SELECT COUNT('akses') as guru FROM tbl_user WHERE akses='gur'");
$datagur  = mysqli_fetch_array($numguru);

$numsiswa = mysqli_query($con,"SELECT COUNT('akses') as siswa FROM tbl_user WHERE akses='usr'");
$datasiswa  = mysqli_fetch_array($numsiswa);

$nummapel = mysqli_query($con,"SELECT COUNT('mapel') as mapell FROM tbl_mapel");
$datamapel  = mysqli_fetch_array($nummapel);

?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Admin</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-success"><?= $dataadm['adm'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Guru</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-purple"><?= $datagur['guru'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Siswa</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-success"><?= $datasiswa['siswa'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Mata Pelajaran</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li class="ml-auto"><span class="counter text-purple"><?= $datamapel['mapell'] ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php');?>
