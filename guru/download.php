<?php 
	require_once ('../config/koneksi.php');

	if(isset($_GET['kode'])) {
		$kode = $_GET['kode'];
		$sql = mysqli_query($con,"SELECT * FROM tbl_tugas WHERE id_tugas = '$kode'");
		$data = mysqli_fetch_array($sql);

		$data = substr($data['tugas'],13);
		$data = basename($data);
		$lokasi = '../dokumen/tugas/'.$data;

		if(file_exists($lokasi)) {
			header('Cache-Control: public');
			header('Content-Description: File Transfer');
			header('Content-Type: application/pdf');
			header('Content-Disposition: attachment; filename='.$data);
			header('Content-Transfer-Encoding: binary');

			readfile($lokasi);
			exit;
		}
	}
?>