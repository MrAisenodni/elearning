<?php
  $title = 'Kelola Pengguna';
  require_once('navbar.php');
?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Kelola Pengguna</h3>
                <!-- Button trigger modal -->
                    <?php require_once('../alert.php') ?>
                <div class="row">
                    <div class="col-lg-9">
                        <a href="tambah-pengguna.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah Materi</a>
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
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">No HP</th>
                                <th class="border-top-0" width="80px">Kelas</th>
                                <th class="border-top-0">Tipe Pengguna</th>
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,'SELECT * FROM tbl_user a LEFT JOIN tbl_kelas b ON b.id_kelas = a.id_kelas ORDER BY a.nama ASC');
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ;?></td>
                                <td><?= $data['nama'] ;?></td>
                                <td><?= $data['telp'] ;?></td>
                                <td><?php echo $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas']; ?></td>
                                <td><?php  if($data['akses']=='adm') { echo "Admin";} elseif($data['akses']=='gur') { echo "Guru";} else { echo "Siswa";} ?></td>
                                <td><?= $data['username'] ;?></td>
                                <td width="150px">
                                    <a href="edit-pengguna.php?id=<?= $data['id_user'] ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="del-pengguna.php?id=<?= $data['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="detail-pengguna.php?id=<?= $data['id_user'] ;?>" class="btn btn-info">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
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