<?php
if(isset($_POST['submit']))
{
	
		$password=md5($_POST['password']);
		$creation_date=time();
		$arr = array(
			"firstname"=>$db->sqlsafe($_POST['firstname']),
			"lastname"=>$db->sqlsafe($_POST['lastname']),
			"gender"=>$db->sqlsafe($_POST['gender']),
			"email"=>$db->sqlsafe($_POST['email']),
			"phone"=>$db->sqlsafe($_POST['phone']),
			"age"=>$db->sqlsafe($_POST['age']),
			"address"=>$db->sqlsafe($_POST['address']),
			"status"=>$db->sqlsafe($_POST['status']),
			"creation_date"=> $db->sqlsafe($creation_date)
		);
		$id=$db->insert('patient',$arr);
			if($id)
			{print '<meta http-equiv="refresh" content="0;URL=index.php?m=patient&a=view&success=1" />';die;}
			else
			{
				print '<meta http-equiv="refresh" content="0;URL=index.php?m=patient&a=view&error=1" />';die;
			}
	}
	?>
<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Patient</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Add Patient
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>First Name</label>
							<input  type="text" class="form-control" name="firstname"required>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Last Name</label>
							<input  type="text" class="form-control" name="lastname"required>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Gender</label>
							<input  type="text" class="form-control" name="gender"required>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Age</label>
							<input  type="text" class="form-control" name="age"required>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Phone</label>
							<input  type="text" class="form-control" name="phone">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Email</label>
							<input  type="text" class="form-control" name="email">
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Address</label>
							<input  type="text" class="form-control" name="address">
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Status</label>
							<input  type="text" class="form-control" name="status">
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