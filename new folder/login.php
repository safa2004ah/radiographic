<?php

if (isset($_POST['username']) && isset($_POST['password'])){

	require ("../includes/conf.php");

	$login_status = $db->select('SELECT * FROM `administrators` WHERE username='.$db->sqlsafe($_POST['username']).' AND password='.$db->sqlsafe(md5($_POST['password'])).'');

	if($login_status){

		$md5_user = md5($login_status[0]['username']);

		$md5_pass = md5($login_status[0]['password']);

		$md5_time = md5(time());

		$logged_in_true = md5(substr($md5_user,5,20).substr($md5_pass,5,20).substr($md5_time,5,20));

		$logged_in_false = '';

		if ($login_status){

			setcookie("admin_id", $login_status[0]['admin_id'], 0, "/");// Expires at the end of the session

			setcookie("admin_section", $login_status[0]['section'], 0, "/");

			setcookie("logged_in", $logged_in_true);

			setcookie("username", $login_status[0]['username']);

			setcookie("session", $md5_pass);

			setcookie("login_time", $md5_time);

			$admin_info = array(

				"logged_in"=>$db->sqlsafe($logged_in_true),

				"username"=>$db->sqlsafe($login_status[0]['username']),

				"session"=>$db->sqlsafe($md5_pass),

				"login_time"=>$db->sqlsafe($md5_time),

				"admin_id"=>$db->sqlsafe($login_status[0]['admin_id'])

			);

			$insert_admin = $db->insert('admin_sessions',$admin_info);

			$_SESSION["lvl"] = $login_status[0]['admin_level'];

			print '<script language="JavaScript">window.location="index.php";</script>';

			exit;

		}else{

			setcookie("logged_in", "");

			setcookie("username", "");

			setcookie("session", "");

			setcookie("login_time", "");

		}

	}else{

		print '<span class="text-danger">Wrong Username Or Password</span>';

	}

}

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>HMS | Log in</title>

	<!-- Tell the browser to be responsive to screen width -->

	<meta name="viewport" content="width=device-width, initial-scale=1">



	<!-- Font Awesome -->

	<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

	<!-- Ionicons -->

	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- icheck bootstrap -->

	<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

	<!-- Theme style -->

	<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

	<!-- Google Font: Source Sans Pro -->

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page bg_image" style="background-image: url('./bg.png');
    background-size: cover;
	background-position: center; 
    background-repeat: no-repeat;">

<div class="login-box " >
<div class="callout callout-info">
	<div class="login-logo text-center text-xl">

		<b>Radiography Management System</b>

	</div>
	</div>
	<div class="callout callout-info">

		<div class="card-body login-card-body">

			<form action="" method="post" name="login_form" enctype="multipart/form-data">

				<div class="input-group mb-3">

					<input type="text" name="username" id="username" class="form-control" placeholder="Username">

					<div class="input-group-append">

						<div class="input-group-text">

							<span class="fas fa-user"></span>

						</div>

					</div>

				</div>

				<div class="input-group mb-3">

					<input type="password" name="password" id="password" class="form-control" placeholder="Password">

					<div class="input-group-append">

						<div class="input-group-text">

							<span class="fas fa-lock"></span>

						</div>

					</div>

				</div>

				<div class="row">

					<div class="col-4">

						<button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign In</button>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>



<!-- jQuery -->

<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->

<script src="assets/dist/js/adminlte.min.js"></script>



</body>

</html>

