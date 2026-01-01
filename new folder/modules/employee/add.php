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
			"admin_level"=>2
		);
		$insert_id = $db->insert('administrators',$arr);

		print '<meta http-equiv="refresh" content="0;URL=index.php?m=employee&a=view&success=1" />';die;
	}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=employee&a=view&error=1" />';die;
	}
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Employees</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Add Employee
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Username</label>
							<input  type="text" class="form-control" name="username"required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Password</label>
							<input  type="password" class="form-control" name="password"required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Email</label>
							<input  type="email" class="form-control" name="email"required>
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