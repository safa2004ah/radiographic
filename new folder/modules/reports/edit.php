<?php

$results_p = $db->select('SELECT * FROM `patient`');
$results_r = $db->select('SELECT * FROM `room`');
$results_m = $db->select('SELECT * FROM `medicine`');
$results_d = $db->select('SELECT * FROM `administrators` where admin_level=2');

if(isset($_POST['submit']))
{
	$arr = array(
		"patient_id"=>$db->sqlsafe($_POST['patient_id']),
		"admin_id"=>$db->sqlsafe($_POST['admin_id']),
		"room_id"=>$db->sqlsafe($_POST['room_id']),
		"medicine_id"=>$db->sqlsafe($_POST['medicine_id']),
		"illness"=>$db->sqlsafe($_POST['illness']),
		"note"=>$db->sqlsafe($_POST['note']),
		);
	

	$id=$db->update('reports',$arr,'id='.$_GET['id']);
	if($id)
		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=reports&a=view&success=2" />';die;}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=reports&a=view&error=2" />';die;
	}
	}
	else 
	{
		$result = $db->select('SELECT * from reports where id = '.$db->sqlsafe($_GET['id']));
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Reports</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Edit Report
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Room :</label>
							<select class="form-control" name="room_id" required>
								<option value="<?php print $result[0]['room_id']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_r) ; $i++){ ?>
								<option value="<?php echo $results_r[$i]['id'];?>">Room <?php echo $results_r[$i]['id'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Patient :</label>
							<select class="form-control" name="patient_id" required>
								<option value="<?php print $result[0]['patient_id']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_p) ; $i++){ ?>
								<option value="<?php echo $results_p[$i]['id'];?>"><?php echo $results_p[$i]['firstname'];?> <?php echo $results_p[$i]['lastname'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Doctor :</label>
							<select class="form-control" name="admin_id" required>
								<option value="<?php print $result[0]['admin_id']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_d) ; $i++){ ?>
								<option value="<?php echo $results_d[$i]['admin_id'];?>"><?php echo $results_d[$i]['username'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Medicine :</label>
							<select class="form-control" name="medicine_id" required>
								<option value="<?php print $result[0]['medicine_id']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_m) ; $i++){ ?>
								<option value="<?php echo $results_m[$i]['id'];?>"><?php echo $results_m[$i]['name'];?> </option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Illness</label>
							<input  type="text" class="form-control" name="illness" value="<?php print $result[0]['illness']; ?>" required />
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Note</label>
							<input  type="text" class="form-control" name="note" value="<?php print $result[0]['note']; ?>" required />
						</div>
					</div><!-- Row -->
			<div class="row">
				<button type="submit" name="submit" class="btn bg-gradient-primary">Edit</button>
			</div><!-- car header -->
					
			</div>
			</form>
			</div>
		</div>
	</div>
</div>