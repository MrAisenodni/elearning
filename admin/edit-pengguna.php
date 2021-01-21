<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $search = mysqli_query($con, "SELECT * FROM tbl_user WHERE id_user='$id'");
  $data = mysqli_fetch_array($search);
}

if(isset($_POST['up'])){
    $nama = $_POST['nama'];
    $jenkel = $_POST['jk'];
    $tgl_lahir = $_POST['tgllahir'];
    $telp = $_POST['telp'];
    $kelas = $_POST['kelas'];
    $pass = md5($_POST['pass']);
    $akses = $_POST['akses'];

    $add = mysqli_query($con, "UPDATE tbl_user SET
  nama='$nama',
  jenkel='$jenkel',
  tgl_lahir='$tgl_lahir',
  telp='$telp',
  kelas='$kelas',
  akses='$akses',
  password='$pass' WHERE id_user='$id'");
    if($add){
      header('location:pengguna.php?stat=update_success');
    }else{
      header('location:pengguna.php?stat=update_failed');
    }
  }

?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="white-box">
                          <?php require_once('../alert.php') ?>
                          <form method="post" action="">
                              <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                                </div>
                              </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis Kelamin</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="L" <?php if($data['jenkel']=='L'){ echo 'checked'; } ?>>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Laki - Laki
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="P" <?php if($data['jenkel']=='P'){ echo 'checked'; } ?>>
                                      <label class="form-check-label" for="exampleRadios2">
                                        Perempuan
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tgl Lahir</label>
                                    <input type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tgllahir" value="<?= $data['tgl_lahir'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telp</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telp" value="<?= $data['telp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelas</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kelas" value="<?= $data['kelas'] ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usr">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tipe User</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="exampleRadios1" value="adm" <?php if($data['akses']=='adm'){ echo 'checked'; } ?>>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Admin
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="exampleRadios2" value="gur" <?php if($data['akses']=='gur'){ echo 'checked'; } ?>>
                                      <label class="form-check-label" for="exampleRadios2">
                                        Guru
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="exampleRadios2" value="usr" <?php if($data['akses']=='usr'){ echo "checked"; } ?>>
                                      <label class="form-check-label" for="exampleRadios2">
                                        Peserta Didik
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="email" value="<?= $data['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Baru</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="up">
                                    <i class="fas fa-save"></i> Simpan
                                    </button>
                                    <a href="pengguna.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                                </div>
                            </form>

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
