<?php 
	require_once ('config/koneksi.php');

	if(isset($_GET['kode'])) {
		$kode = $_GET['kode'];
		$sql = mysqli_query($con,"SELECT * FROM tbl_file WHERE id_file = '$kode'");
		$data = mysqli_fetch_array($sql);
		$tipe = $data['tipe'];
		if($tipe == 'mod') {
			$data = substr($data['file'],15);
			$data = basename($data);
			$lokasi = 'dokumen/materi/'.$data;

			if(file_exists($lokasi)) {
				header('Cache-Control: public');
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename='.$data);
				header('Content-Transfer-Encoding: binary');

				readfile($lokasi);
				exit;
			}
		} elseif($tipe == 'tgs') {
			$data = substr($data['file'],13);
			$data = basename($data);
			$lokasi = 'dokumen/tugas/'.$data;

			if(file_exists($lokasi)) {
				header('Cache-Control: public');
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename='.$data);
				header('Content-Transfer-Encoding: binary');

				readfile($lokasi);
				exit;
			}
		} else {
			$sql2 = mysqli_query($con,"SELECT * FROM tbl_tugas WHERE id_tugas = '$kode'");
			$data2 = mysqli_fetch_array($sql2);
			$data2 = substr($data2['file'],13);
			$data2 = basename($data2);
			$lokasi = 'dokumen/tugas/'.$data2;

			if(file_exists($lokasi)) {
				header('Cache-Control: public');
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename='.$data2);
				header('Content-Transfer-Encoding: binary');

				readfile($lokasi);
				exit;
			}
		}
	}
?>