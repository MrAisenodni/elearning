<?php
  if(isset($_GET['stat'])){
    $stat = $_GET['stat'];
    $cls = "";
    $psn = "";

    if($stat == "input_success"){
      $cls = "alert alert-success";
      $psn = "Data Berhasil Ditambahkan";
    }elseif($stat == "input_failed"){
      $cls = "alert alert-danger";
      $psn = "Data Gagal Ditambahkan";
    }elseif($stat == "input_null"){
      $cls = "alert alert-danger";
      $psn = "Data Belum Lengkap";
    }elseif($stat == "delete_success"){
      $cls = "alert alert-success";
      $psn = "Data Berhasil Dihapus";
    }elseif($stat == "delete_failed"){
      $cls = "alert alert-danger";
      $psn = "Data Gagal Dihapus";
    }elseif($stat == "update_success"){
      $cls = "alert alert-success";
      $psn = "Data Berhasil Diubah";
    }elseif($stat == "update_failed"){
      $cls = "alert alert-danger";
      $psn = "Data Gagal Diubah";
    }elseif($stat == "size_file_too_large"){
      $cls = "alert alert-danger";
      $psn = "Ukuran File terlalu besar";
    }elseif($stat == "file_ext"){
      $cls = "alert alert-danger";
      $psn = "Format File tidak didukung";
    }elseif($stat == "unlink_failed"){
      $cls = "alert alert-danger";
      $psn = "Unlink Failed";
    }elseif($stat == "input_null"){
      $cls = "alert alert-danger";
      $psn = "Input Null";
    }elseif($stat == "login_success"){
      $cls = "alert alert-success";
      $psn = "Login Berhasil";
    }elseif($stat == "login_failed"){
      $cls = "alert alert-danger";
      $psn = "Username dan Password Salah";
    }elseif($stat == "login_timeout"){
      $cls = "alert alert-danger";
      $psn = "Batas Waktu Login Telah Habis, Silahkan Login Kembali";
    }elseif($stat == "logout_success"){
      $cls = "alert alert-success";
      $psn = "Logout Berhasil";
    }elseif($stat == "not_sync"){
      $cls = "alert alert-danger";
      $psn = "Konfirmasi Password dan Password Baru Tidak Sama";
    }elseif($stat == "wrong_password"){
      $cls = "alert alert-danger";
      $psn = "Password Salah!";
    }elseif($stat == "wrong"){
      $cls = "alert alert-danger";
      $psn = "Username dan Password Salah";
    }elseif($stat == "session_timeout"){
      $cls = "alert alert-danger";
      $psn = "Sesi login telah berakhir";
    }elseif($stat == "chpassword_success"){
      $cls = "alert alert-success";
      $psn = "Sukses Mengganti Password";
    }elseif($stat == "chpassword_failed"){
      $cls = "alert alert-danger";
      $psn = "Gagal Mengganti Password";
    }else{
      $cls = "alert alert-danger";
      $psn = "Error";
    }
  ?>
<!-- ALERT -->
<div class="<?php echo $cls; ?>" role="alert">
    <?php echo $psn; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- ALERT -->
<?php } ?>
