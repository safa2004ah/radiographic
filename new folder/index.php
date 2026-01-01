<?php

require ("../includes/sess.php");

require('functions/autoload.php');

require('functions/pagination.php');

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="assets/icon.ico"/>

  <title>HMS</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->

  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- JQVMap -->

  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

  <!-- summernote -->

  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SweetAlert2 -->

  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- Toastr -->

  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

  <!-- Ekko Lightbox -->

  <link rel="stylesheet" href="assets/plugins/ekko-lightbox/ekko-lightbox.css">

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
  
  <script type="text/javascript" src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
  
  <link href="assets/cropper/css/cropper.min.css" rel="stylesheet">

	<!--loader-->

	<style>

		.preloader {

			display: flex;

			justify-content: center;

			align-items: center;

			height: 100vh;

			width: 100%;

			background: rgb(23, 22, 22);

			position: fixed;

			top: 0;

			left: 0;

			z-index: 9999;

			transition: opacity 0.3s linear;

		}

	</style>

	<!--loader-->

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!--loader-->

<div class="preloader">

	<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background:0 0"><circle cx="50" cy="50" r="4.719" fill="none" stroke="#1d3f72" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="-1.5s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="-1.5s" repeatCount="indefinite"/></circle><circle cx="50" cy="50" r="27.591" fill="none" stroke="#5699d2" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"/></circle></svg>

</div>

<script>

	const preloader = document.querySelector('.preloader');

	function start_loader(){

		preloader.style.opacity = 1;

		preloader.style.display = 'flex';

	}

	function stop_loader(){

		const fadeEffect = setInterval(() => {

			if (!preloader.style.opacity) {

				preloader.style.opacity = 1;

			}

			if (preloader.style.opacity > 0) {

				preloader.style.opacity -= 0.3;

			} else {

				preloader.style.display = 'none';

				clearInterval(fadeEffect);

			}

		}, 200);

	}

	window.addEventListener('load', stop_loader());

</script>

<!--loader-->

<div class="wrapper">

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="index.php" class="nav-link">Home</a>

      </li>

    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

      <!-- Logout -->

      <li class="nav-item">

        <a class="nav-link" href="logout.php">

          <i class="fas fa-sign-out-alt"></i>

        </a>

      </li>

    </ul>

  </nav>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <a href="index.php" class="brand-link">

      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image"

           style="opacity: .9; margin-left: .2rem;">

      <span class="brand-text font-weight-light">HMS</span>

    </a>

    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

          <li class="nav-item" <?php if(!$tabs['employee']) echo 'hidden';?> >

            <a href="index.php?m=employee&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'employee'){ print'active'; } ?>">

              <i class="nav-icon fas fa-chalkboard-teacher"></i>

              <p>

                Employees

              </p>

            </a>

          </li>

          <li class="nav-item" <?php if(!$tabs['doctor']) echo 'hidden';?> >

            <a href="index.php?m=doctor&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'doctor'){ print'active'; } ?>">

              <i class="nav-icon fas fa-users-cog"></i>

              <p>

                Doctors

              </p>

            </a>

          </li>

          <li class="nav-item" <?php if(!$tabs['patient']) echo 'hidden';?> >

            <a href="index.php?m=patient&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'patient'){ print'active'; } ?>">

              <i class="nav-icon fas fa-user-alt"></i>

              <p>

                 
                 Patient

              </p>

            </a>

          </li>
          <li class="nav-item" <?php if(!$tabs['section']) echo 'hidden';?> >

            <a href="index.php?m=section&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'section'){ print'active'; } ?>">

              <i class="nav-icon fas fa-laptop-medical"></i>

              <p>

                 
                 Section

              </p>

            </a>

          </li>
          
          <li class="nav-item" <?php if(!$tabs['radiographic']) echo 'hidden';?> >

            <a href="index.php?m=radiographic&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'radiographic'){ print'active'; } ?>">

              <i class="nav-icon fas fa-x-ray"></i>

              <p>

                 
                Radiographic

              </p>

            </a>

          </li>
          
          </li>
          
          <li class="nav-item" <?php if(!$tabs['appointment']) echo 'hidden';?> >

            <a href="index.php?m=appointment&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'appointment'){ print'active'; } ?>">

              <i class="nav-icon  fas fa-calendar-times"></i>

              <p>

                Appointment

              </p>

            </a>

          </li>
          <li class="nav-item" <?php if(!$tabs['my_appointment']) echo 'hidden';?> >

            <a href="index.php?m=my_appointment&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'my_appointment'){ print'active'; } ?>">

              <i class="nav-icon  fas fa-calendar-times"></i>

              <p>

                My Appointment

              </p>

            </a>

          </li>


          <li class="nav-item" <?php if(!$tabs['reports']) echo 'hidden';?>>

            <a href="index.php?m=reports&a=view" class="nav-link <?php if(isset($_GET['m']) && $_GET['m'] == 'reports'){ print'active'; } ?>">

              <i class="nav-icon    fas fa-list-alt"></i>

              <p>

                Reports

              </p>

            </a>

          </li>

          


		  </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="background-color: #EDECEC;">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark"><?php if(isset($html_header)){ print $html_header;} ?></h1>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

		    <?php if(isset($html_require)){ require($html_require); } ?>

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script>HMS</strong>

    All rights reserved.

  </footer>

</div>

<!-- ./wrapper -->

<!-- jQuery -->

<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="assets/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="assets/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="assets/plugins/moment/moment.min.js"></script>

<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="assets/dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="assets/dist/js/demo.js"></script>

<!-- jquery-validation -->

<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- SweetAlert2 -->

<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Toastr -->

<script src="assets/plugins/toastr/toastr.min.js"></script>

<!-- jQuery UI -->

<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Ekko Lightbox -->

<script src="assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>

<script src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>

<script src="assets/cropper/js/cropper.min.js"></script>

<?php if(isset($html_require_script)){ print '<script src="'.$html_require_script.'" ></script>'; } ?>

<?php

if(isset($_GET['success']) && $_GET['success'] == 1){

	?>

	<script type="text/javascript">

		const Toast = Swal.mixin({

			toast: true,

			position: 'top-end',

			showConfirmButton: false,

			timer: 3000

		});

		Toast.fire({

			icon: 'success',

			title: '<span class="text-success"> &nbsp&nbsp&nbsp Added Successfully</span>'

		});

	</script>

	<?php

}

if(isset($_GET['success']) && $_GET['success'] == 2){

	?>

	<script type="text/javascript">

		const Toast = Swal.mixin({

			toast: true,

			position: 'top-end',

			showConfirmButton: false,

			timer: 3000

		});

		Toast.fire({

			icon: 'success',

			title: '<span class="text-success"> &nbsp&nbsp&nbsp Updated Successfully</span>'

		});

	</script>

	<?php

}

if(isset($_GET['success']) && $_GET['success'] == 3){

	?>

	<script type="text/javascript">

		const Toast = Swal.mixin({

			toast: true,

			position: 'top-end',

			showConfirmButton: false,

			timer: 3000

		});

		Toast.fire({

			icon: 'success',

			title: '<span class="text-success"> &nbsp&nbsp&nbsp Deleted Successfully</span>'

		});

	</script>

	<?php

}

?>

</body>

</html>