<?php require_once('navbar.php'); ?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Mata Pelajaran</h3>
                <div class="row">
                <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE a.id_kelas='$kelasu'");
                while ($data2 = mysqli_fetch_array($sql2)) {?>
                    <div class="col-lg-6">
                        <div class="btn btn-default">
                            <div class="card mb-3" style="max-width: 600px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="topik.php">
                                            <img src="asset/user/buku.png" style="width: 100px; height: 100px;">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="topik.php?kode=<?= $data2['id_user']?>" class="card-title"><h5><?php echo $data2['nama']." | ".$data2['mapel']?></h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Mata Pelajaran</h3>
                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row g-0">
                        <div class="card-body">
                            <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE a.id_kelas='$kelasu'");
                            while ($data2 = mysqli_fetch_array($sql2)) { ?>
                            <a href="topik.php?kode=<?= $data2['id_user']; ?>" class="card-title"><h5><?php echo $data2['nama']." | ".$data2['mapel']?></h5></a>
                            <hr>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php');?>
