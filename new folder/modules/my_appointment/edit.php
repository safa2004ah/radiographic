<?php
if(isset($_COOKIE["admin_section"])) {
    $adminSec = $_COOKIE["admin_section"];
} 
if(isset($_POST['submit']))
{
	$arr = array(
		"date"=>$db->sqlsafe($_POST['date']),
		"doctor_id"=>$db->sqlsafe($_POST['doctor_id']),
		"time"=>$db->sqlsafe($_POST['time']),
		"status"=>$db->sqlsafe($_POST['status']),
		);
	$id=$db->update('appointment',$arr,'id='.$_GET['id']);
	
	if($id)

		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=my_appointment&a=view&success=2" />';die;}
	
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=my_appointment&a=view&error=2" />';die;
	}
	}
	else 
	{
		$result = $db->select('SELECT * from appointment where id = '.$db->sqlsafe($_GET['id']));
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back Appointment</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Edit Appointment
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Status</label>
							<input  type="text" class="form-control" name="status" value="<?php print $result[0]['status']; ?>" required />
						</div>
					</div><!-- Row -->
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Date</label>
							<input  type="date" class="form-control" name="date" value="<?php print $result[0]['date']; ?>" required />
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Time</label>
							<input  type="time" class="form-control" name="time" value="<?php print $result[0]['time']; ?>" required />
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-3 col-sm-6 form-group">
						<label>Choose Doctor :</label>
						<select class="form-control" name="doctor_id" required>
						<option value="">Choose...</option>
						<?php
							// Fetch all sections from the 'section' table
							$doctors = $db->select('SELECT admin_id, username FROM `administrators`where section='.$adminSec );

							// Check if there are results
							if ($doctors && count($doctors) > 0) {
								foreach ($doctors as $doc) {
									// Escape output for security
									$doc_id = htmlspecialchars($doc['admin_id']);
									$doc_name = htmlspecialchars($doc['username']);

									// Optional: Pre-select if editing (e.g., $edit_section holds current value)
									$selected = (isset($edit_doctor) && $edit_doctor == $doc_id) ? 'selected' : '';

									echo "<option value=\"$doc_id\" $selected>$doc_name</option>";
								}
							} else {
								// Fallback if no sections in database
								echo '<option value="" disabled>No doctors available</option>';
							}
							?>
						</select>
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