<?php
	require_once('config/koneksi.php');
	if(isset($_POST['upload'])) {
        date_default_timezone_set('Asia/Jakarta');
        $mapel = $data2['id_mapel'];
        $tgl = date('Y-m-d');

        $namafile = $_FILES['file']['name'];
        $tipefile = $_FILES['file']['type'];
        $ukfile = $_FILES['file']['size'];
        $tmp = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];

        $extensi = ['pdf'];
        $ext = pathinfo($namafile, PATHINFO_EXTENSION);
        $lokasi = "../dokumen/tugas/";
        $save = "dokumen/tugas/";

        if($error == 4) {
            header('location:pengumpulan-tugas.php?stat=input_null');
        } elseif(!in_array($ext, $extensi)) {
            header('location:pengumpulan-tugas.php?stat=file_ext');
        }else{
            if($ukfile < 10000000){
                move_uploaded_file($tmp, $lokasi.$namafile);
                $add = mysqli_query($con,"INSERT INTO tbl_tugas VALUES ('','$mapel','$save$namafile','tgl')");
                if($add){
                    header('location:topik.php?stat=input_success');
                }else{
                    header('location:topik.php?stat=input_failed');
                }
            }else{
                header('location:pengumpulan-tugas.php?stat=size_file_too_large');
            }
        }
    }
?>