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
		} else {
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
		}
	}
?>