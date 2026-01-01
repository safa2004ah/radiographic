<?php

$administrators = $db->select('select count(*) as c from administrators');
$administrators = $administrators[0]['c'];
$customer=$db->select('select count(*) as c from patient');
$customer = $customer[0]['c'];
$order=$db->select('select count(*) as c from appointment');
$order = $order[0]['c'];



?>

<div class="row">

	<div class="col-md-3 col-sm-6" >

		<div class="small-box bg-gradient-info">

			<div class="inner">

				<h3><?php print $administrators; ?></h3>

				<p>Administrators</p>

			</div>

			<div class="icon">

				<i class="nav-icon fa fa-user-cog"></i>

			</div>
		</div>

	</div>

	<div class="col-md-3 col-sm-6">

		<div class="small-box bg-gradient-secondary">

			<div class="inner">

				<h3><?php print $customer; ?></h3>

				<p>Patient</p>

			</div>

			<div class="icon">

				<i class="nav-icon fas fa-user"></i>

			</div>
		</div>

	</div>

	<div class="col-md-3 col-sm-6" >

		<div class="small-box bg-gradient-success">

			<div class="inner">

				<h3><?php print $order ?></h3>

				<p>Appointment</p>

			</div>

			<div class="icon">

				<i class="nav-icon fas fa-credit-card"></i>

			</div>
		</div>

	</div>
</div>
