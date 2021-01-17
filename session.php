<?php
  require_once('config/koneksi.php');
  session_start();
  if(isset($_SESSION['akses'])){
    $idu = $_SESSION['id'];
    $namau = $_SESSION['nama'];
    $jku = $_SESSION['jk'];
    $dobu = $_SESSION['dob'];
    $kelasu = $_SESSION['kelas'];
    $unameu = $_SESSION['uname'];
    $aksesu = $_SESSION['akses'];
  }else{
    header('location:login.php?stat=session_timeout');
    exit();
  }
?>
