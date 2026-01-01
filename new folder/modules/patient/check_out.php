<?php
if(isset($_POST['submit']))
{
	$status='checked out';
	$arr = array(
			'status'=>$db->sqlsafe($status),
		);
	

	$id=$db->update('patient',$arr,'id='.$_GET['id']);
	if($id)
		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=patient&a=view&success=2" />';die;}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=patient&a=view&error=2" />';die;
	}
	}
	else 
	{
		$result = $db->select('SELECT * from patient where id = '.$db->sqlsafe($_GET['id']));
		$id=$_GET['id'];
		
		$resul = $db->select('SELECT patient_id,SUM(cost) AS app_cost FROM appointment GROUP BY patient_id');
		$appointment_fee=0;
		for($l = 0 ; $l<count($resul) ; $l++){
			if($resul[$l]['patient_id']==$id){
				$appointment_fee=$resul[$l]['app_cost'];
			}
		}
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back Patient</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Check Out Patient
					</b>
				</h3>
			</div>

			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Patient Id :</label>
							<label><?php print $result[0]['id']; ?></label>
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>First Name :</label>
							<label><?php print $result[0]['firstname']; ?></label>
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Last Name :</label>
							<label><?php print $result[0]['lastname']; ?></label>
						</div>
					</div><!-- Row -->
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Gender :</label>
							<label><?php print $result[0]['gender']; ?></label>
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Phone :</label>
							<label><?php print $result[0]['phone']; ?></label>
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Address :</label>
							<label><?php print $result[0]['address']; ?></label>
						</div>
					</div><!-- Row -->
					<div class="row">
						
						<div class="col-md-4 col-sm-6 form-group">
							<label>Appointment Fee :</label>
							<label><?php echo $appointment_fee; ?></label>
						</div>
					</div><!-- Row -->
			

			<div class="row">
				<button type="submit" name="submit" class="btn bg-gradient-success">Check Out</button>
			</div><!-- car header -->
					
			</div>
			</form>
			</div>
		</div>
	</div>
</div>