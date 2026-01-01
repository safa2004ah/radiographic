<?php

$results_p = $db->select('SELECT * FROM `patient`');
$results_s = $db->select('SELECT * FROM `section`');

if(isset($_POST['submit']))
{
	$creation_date=time();
	$status="not accepted";
	$arr = array(
		"patient_id"=>$db->sqlsafe($_POST['patient_id']),
		"date"=>$db->sqlsafe($_POST['date']),
		"time"=>$db->sqlsafe($_POST['time']),
		"section"=>$db->sqlsafe($_POST['section']),
		"creation_date"=> $db->sqlsafe($creation_date),
	);
	$id=$db->insert('appointment',$arr);
		if($id)
		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=appointment&a=view&success=1" />';die;}
		else
		{
			print '<meta http-equiv="refresh" content="0;URL=index.php?m=appointment&a=view&error=1" />';die;
		}
	}
?>
<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Appointment</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Add Appointment
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Patient :</label>
							<select class="form-control" name="patient_id" required>
								<option value="">Choose...</option>
								<?php for($i = 0 ; $i<count($results_p) ; $i++){ ?>
								<option value="<?php echo $results_p[$i]['id'];?>"><?php echo $results_p[$i]['firstname'];?> <?php echo $results_p[$i]['lastname'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Section :</label>
							<select class="form-control" name="section" required>
								<option value="">Choose...</option>
								<?php for($i = 0 ; $i<count($results_s) ; $i++){ ?>
								<option value="<?php echo $results_s[$i]['id'];?>"><?php echo $results_s[$i]['name'];?> </option>
								<?php }?>
							</select>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Date</label>
							<input  type="date" class="form-control" name="date"required>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Time</label>
							<input  type="time" class="form-control" name="time"required>
						</div>
					</div>
					
					<div class="row">
						<button type="submit" name="submit" class="btn bg-gradient-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>