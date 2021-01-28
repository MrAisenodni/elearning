<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $del = mysqli_query($con, "DELETE FROM tbl_file WHERE id_file='$kode'");
    if($del){
      header('location:materi.php?stat=delete_success');
    }else{
      header('location:materi.php?stat=delete_failed');
    }
  }
?>
