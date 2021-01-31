<?php
$title = 'Tambah Pengguna';
require_once('navbar.php');

if(isset($_POST['tambah'])){
  date_default_timezone_set('Asia/Jakarta');
  $nama = ucwords($_POST['namadpn'])." ".ucwords($_POST['namablk']);
  $jenkel = $_POST['jk'];
  $tgl_lahir = $_POST['tgllahir'];
  $telp = $_POST['telp'];
  $kelas = $_POST['kelas'];
  $tgl = date('d');
  $uname= strtolower($_POST['namadpn']).strtolower(substr($_POST['namablk'], 0, 1)).$tgl.'@smanim.com';
  $pass = md5($_POST['pass']);
  $akses = $_POST['akses'];

  $add = mysqli_query($con, "INSERT INTO tbl_user VALUES('','$kelas','$nama','$jenkel','$tgl_lahir','$telp','$uname','$pass','$akses')");
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
        <div class="col-md-8">
          <div class="white-box">
            <?php require_once('../alert.php'); ?>
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
                  <select class="form-control" name="kelas" id="kelas">
                    <option value="">--Pilih Kelas--</option>
                    <?php $sql2 = mysqli_query($con, "SELECT * FROM tbl_kelas");
                    while ($data2 = mysqli_fetch_array($sql2)) { ?>
                    <option value="<?= $data2['id_kelas'] ?>"><?php echo $data2['tingkat']." ".strtoupper($data2['jurusan'])." ".$data2['kelas']; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pass" required>
              </div>
              <div class="modal-footer">
                <a href="pengguna.php">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-window-close"></i> Tutup
                  </button>
                </a>
                <button type="submit" class="btn btn-primary" name="tambah">
                  <i class="fas fa-check"></i> Simpan
                </button>
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