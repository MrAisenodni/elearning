<!DOCTYPE html>
<html lang="en">
<head>
	<title>Virtual Class - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="asset/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset/login/css/main.css">
<!--===============================================================================================-->
</head>
<?php require_once('config/koneksi.php');
if(isset($_POST['login'])){
	$mail = mysqli_real_escape_string($con, $_POST['email']);
	$pw = mysqli_real_escape_string($con,md5($_POST['pass']));

	$sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE username='$mail' AND password='$pw'");
	$data = mysqli_fetch_array($sql);
	$num = mysqli_num_rows($sql);

	if($num>0){
		session_start();
		$_SESSION['id'] = $data['id_user'];
		$_SESSION['kelas'] = $data['id_kelas'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['jk'] = $data['jenkel'];
		$_SESSION['dob'] = $data['tgl_lahir'];
		$_SESSION['uname'] = $data['username'];
		$_SESSION['akses'] = $data['akses'];

		if($data['akses']=='adm'){
			header('location:admin/index.php?stat=login_success');
		}elseif($data['akses']=='gur'){
			header('location:guru/index.php?stat=login_success');
		}else{
			header('location:index.php?stat=login_success');
		}

	}else{
		header('location:login.php?stat=wrong_password');
	}
} ?>
<body>
	<div class="limiter" style="background-image: url('asset/login/images/back.jpg'); background-repeat: no-repeat; background-size: cover;">
		<div class="container-login100" style="background: #e9faff00;">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post" style="">
					<b class="login100-form-title p-b-25">
						<img src="asset/logo.png" class="mb-2" width="80px" height="80px" align="Logo"><br>
						<p class="fs-20">SMA Negeri 1 Megamendung</p>
					</b>
					<?php require_once('alert.php'); ?>
					<div class="wrap-input100 validate-input mb-2" data-validate = "Masukkan Email: example@smanim.com" style="border-radius: 100px; height: 70px;">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Masukkan Kata Sandi" style="border-radius: 100px; height: 70px;">
						<input class="input100" type="password" name="pass" placeholder="Kata Sandi">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit" name="login" style="border-radius: 100px; background: #1ce61c;">
							<b class="fs-16">Masuk</b>
						</button>
                    </div><hr>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/js/main.js"></script>

</body>
</html>
