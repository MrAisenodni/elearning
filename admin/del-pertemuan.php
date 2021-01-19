<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del = mysqli_query($con, "DELETE FROM tbl_pertemuan WHERE id_pert='$id'");
    if($del){
      header('location:pertemuan.php?stat=delete_success');
    }else{
      header('location:pertemuan.php?stat=delete_failed');
    }
  }
?>
