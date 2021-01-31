<?php
$title = 'Kelola Mata Pelajaran';
require_once('navbar.php');
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <?php require_once('../alert.php') ?>
                <h3 class="box-title">Kelola Mata Pelajaran</h3>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-lg-9">
                        <a href="tambah-mapel.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Mapel</a>
                        <br><br>
                    </div>
                    <div class="col-lg-3">
                        <form>
                            <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari....">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Mata Pelajaran</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Guru Pengajar</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,"SELECT * FROM tbl_mapel a INNER JOIN tbl_kelas b ON b.id_kelas = a.id_kelas INNER JOIN tbl_user c ON c.id_user = a.id_user ORDER BY a.mapel ASC, b.tingkat ASC, b.kelas ASC");
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['mapel'] ?></td>
                                <td><?= $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <a href="edit-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="del-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-mapel.php?id=<?= $data['id_mapel'] ?>" class="btn btn-info">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                            </tr>
                          <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
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
