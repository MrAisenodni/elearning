<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del = mysqli_query($con, "DELETE FROM tbl_mapel WHERE id_mapel='$id'");
    if($del){
      header('location:mapel.php?stat=delete_success');
    }else{
      header('location:mapel.php?stat=delete_failed');
    }
  }
?>
