<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del = mysqli_query($con, "DELETE FROM tbl_user WHERE id_user='$id'");
    if($del){
      header('location:pengguna.php?stat=delete_success');
    }else{
      header('location:pengguna.php?stat=delete_failed');
    }
  }
?>
