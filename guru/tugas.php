<?php
$title = 'Kelola Tugas';
require_once('navbar.php');
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Kelola Tugas</h3>
                    <?php require_once('../alert.php'); ?>
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-lg-9">
                        <a href="tambah-tugas.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah tugas</a>
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
                                <th class="border-top-0">Pertemuan</th>
                                <th class="border-top-0">Tugas</th>
                                <th class="border-top-0">File Guru</th>
                                <th class="border-top-0">File Siswa</th>
                                <th class="border-top-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,"SELECT * FROM tbl_file a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel WHERE b.id_user = $idu AND a.tipe = 'tgs' ORDER BY b.kelas ASC, a.pertemuan ASC");
                            $sql2 = mysqli_query($con,"SELECT * FROM tbl_tugas a INNER JOIN tbl_mapel b ON b.id_mapel = a.id_mapel INNER JOIN tbl_user c ON c.id_user = a.id_user WHERE a.id_mapel=b.id_mapel ORDER BY b.kelas ASC, a.pertemuan ASC");
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['mapel'] ?></td>
                                <td><?= $data['kelas'] ?></td>
                                <td><?= $data['pertemuan'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= substr($data['file'],14) ?></td>
                                <td><?php while ($data2 = mysqli_fetch_array($sql2)) { ?> 
                                    <a href="download.php?kode=<?= $data2['id_tugas']; ?>"><?php echo $no.". ".substr($data2['tugas'],14)." - ".$data2['nama']; ?></a><br>
                                    <?php $no++; } ?>
                                </td>
                                <td width="150px">
                                    <a href="edit-tugas.php?kode=<?= $data['id_file'] ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="del-tugas.php?kode=<?= $data['id_file'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-tugas.php?kode=<?= $data['id_file'] ?>" class="btn btn-info">
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
