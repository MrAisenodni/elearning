<?php
  $host = "localhost";
  $usr = "root";
  $pw = "";
  $db = "vclass";
  $con = mysqli_connect($host,$usr,$pw,$db);
  if(!$con){ ?>
    <script>alert('Koneksi Gagal!');</script><?php
  }
?>
