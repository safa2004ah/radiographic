<?php
if(isset($_POST['submit']))
{
	if
		(
			(isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['email'])) &&
			(!empty($_POST['username']) && !empty($_POST['password'])&& !empty($_POST['email']))
		)
	{
		$password=md5($_POST['password']);
		$arr = array(
			"username"=>$db->sqlsafe($_POST['username']),
			"password"=>$db->sqlsafe($password),
			"email"=>$db->sqlsafe($_POST['email']),
			"section"=>$db->sqlsafe($_POST['section']),
			"admin_level"=>3
		);
		$insert_id = $db->insert('administrators',$arr);

		print '<meta http-equiv="refresh" content="0;URL=index.php?m=doctor&a=view&success=1" />';die;
	}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=doctor&a=view&error=1" />';die;
	}
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Doctors</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Add Doctor
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Username</label>
							<input  type="text" class="form-control" name="username" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Password</label>
							<input  type="password" class="form-control" name="password" required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Email</label>
							<input  type="email" class="form-control" name="email" required>
						</div>	
					</div>
					<div class="col-md-3 col-sm-6 form-group">
						<label>Choose Section :</label>
						<select class="form-control" name="section" required>
						<option value="">Choose...</option>
						<?php
							// Fetch all sections from the 'section' table
							$sections = $db->select("SELECT id, name FROM `section` ORDER BY name ASC");

							// Check if there are results
							if ($sections && count($sections) > 0) {
								foreach ($sections as $sec) {
									// Escape output for security
									$sec_id = htmlspecialchars($sec['id']);
									$sec_name = htmlspecialchars($sec['name']);

									// Optional: Pre-select if editing (e.g., $edit_section holds current value)
									$selected = (isset($edit_section) && $edit_section == $sec_id) ? 'selected' : '';

									echo "<option value=\"$sec_id\" $selected>$sec_name</option>";
								}
							} else {
								// Fallback if no sections in database
								echo '<option value="" disabled>No sections available</option>';
							}
							?>
						</select>
					</div>
					
			<div class="row">
				<button type="submit" name="submit" class="btn bg-gradient-primary">Add</button>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>