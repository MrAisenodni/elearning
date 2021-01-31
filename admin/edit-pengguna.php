<?php require_once('navbar.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $search = mysqli_query($con, "SELECT * FROM tbl_user a LEFT JOIN tbl_kelas b ON b.id_kelas = a.id_kelas WHERE id_user='$id'");
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
  id_kelas='$kelas',
  jenkel='$jenkel',
  tgl_lahir='$tgl_lahir',
  telp='$telp',
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
                          <form method="post" action="">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Tipe User</label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="adm" value="adm" <?php if($data['akses']=='adm'){ echo 'checked'; } ?> onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Admin
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="gur" value="gur" <?php if($data['akses']=='gur'){ echo 'checked'; } ?> onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Guru
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="akses" id="usr" value="usr" <?php if($data['akses']=='usr'){ echo "checked"; } ?> onclick="disAkses()">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Peserta Didik
                                      </label>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Nama Lengkap</label>
                                      <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?= $data['nama'] ?>" required>
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
                                    <input type="date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tgllahir" value="<?= $data['tgl_lahir'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telp</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telp" value="<?= $data['telp'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                      <option value="<?= $data['id_kelas'] ?>"><?php echo $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas']; ?></option>
                                      <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_kelas");
                                      while ($data2 = mysqli_fetch_array($sql2)) { ?>
                                      <option value="<?= $data2['id_kelas'] ?>"><?php echo $data2['tingkat']." ".strtoupper($data2['jurusan'])." ".$data2['kelas']; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Username</label>
                                  <input type="email" value="<?= $data['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Baru</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass" required>
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