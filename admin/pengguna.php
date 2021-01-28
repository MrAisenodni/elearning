<?php
  $title = 'Kelola Pengguna';
  require_once('navbar.php');

  if(isset($_POST['tambah'])){
    $nama = $_POST['namadpn']." ".$_POST['namablk'];
    $jenkel = $_POST['jk'];
    $tgl_lahir = $_POST['tgllahir'];
    $telp = $_POST['telp'];
    $kelas = $_POST['kelas'];
    $uname= $_POST['namadpn'].substr($_POST['namablk'], 0, 1).substr($_POST['tgllahir'],2,5).'@smanim.com';
    $pass = md5($_POST['pass']);
    $akses = $_POST['akses'];

    $add = mysqli_query($con, "INSERT INTO tbl_user VALUES('','$nama','$jenkel','$tgl_lahir','$telp','$kelas','$uname','$pass','$akses')");
    if($add){
      header('location:pengguna.php?stat=input_success');
    }else{
      header('location:pengguna.php?stat=input_failed');
    }
  }

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
                        <button type="button" class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus-square"></i>
                                Tambah Pengguna
                        </button>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                            <form method="post" action="">
                              <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Depan</label>
                                    <input type="text" required class="form-control" id="namadpn" aria-describedby="emailHelp" name="namadpn" required>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Belakang</label>
                                    <input type="text" required class="form-control" id="namablkg" aria-describedby="emailHelp" name="namablk" required>
                                </div>
                                </div>
                              </div>
                              <div class="form-group">
                                    <label for="exampleInputPassword1">Tipe User</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="adm" value="adm" onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Admin
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="gur" value="gur" onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Guru
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="usr" value="usr" onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Siswa
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="L">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Laki - Laki
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="P">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Perempuan
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tgl Lahir</label>
                                    <input type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tgllahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telp</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" aria-describedby="emailHelp" name="kelas">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usr">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        <i class="fas fa-window-close"></i> Tutup
                                    </button>
                                    <button type="submit" class="btn btn-primary" name="tambah">
                                        <i class="fas fa-check"></i> Simpan
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">No HP</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Tipe Pengguna</th>
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0" width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            $sql = mysqli_query($con,'SELECT * FROM tbl_user');
                            while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?= $no ;?></td>
                                <td><?= $data['nama'] ;?></td>
                                <td><?= $data['telp'] ;?></td>
                                <td><?= $data['kelas'] ;?></td>
                                <td><?= $data['akses'] ;?></td>
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
<script>
    function disAkses(){
    var usr = document.getElementById('usr');
    var gur = document.getElementById('gur');
    var adm = document.getElementById('adm');
    var kelas = document.getElementById('kelas');
    if(adm.checked == true){
        kelas.disabled = true;
    } else if (gur.checked == true) {
        kelas.disabled = true;
    } else if (usr.checked) {
        kelas.disabled = false;
        kelas.required = true;
    } else {
        kelas.disabled = true;
    }
  }
</script>
