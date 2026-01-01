<?php
if(isset($_POST['submit']))
{
	$arr = array(

			'firstname'=>$db->sqlsafe($_POST['firstname']),
			'lastname'=>$db->sqlsafe($_POST['lastname']),
			'gender'=>$db->sqlsafe($_POST['gender']),
			'email'=>$db->sqlsafe($_POST['email']),
			'phone'=>$db->sqlsafe($_POST['phone']),
			'age'=>$db->sqlsafe($_POST['age']),
			'address'=>$db->sqlsafe($_POST['address']),
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
						Edit Patient
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>First Name</label>
							<input  type="text" class="form-control" name="firstname" value="<?php print $result[0]['firstname']; ?>" required />
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Last Name</label>
							<input  type="text" class="form-control" name="lastname" value="<?php print $result[0]['lastname']; ?>" required />
						</div>
					</div><!-- Row -->
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Gender</label>
							<input  type="text" class="form-control" name="gender" value="<?php print $result[0]['gender']; ?>" required />
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Age</label>
							<input  type="text" class="form-control" name="age" value="<?php print $result[0]['age']; ?>" required />
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Phone</label>
							<input  type="text" class="form-control" name="phone" value="<?php print $result[0]['phone']; ?>" required />
						</div>
					</div><!-- Row -->

					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Email</label>
							<input  type="text" class="form-control" name="email" value="<?php print $result[0]['email']; ?>" required />
						</div>
						<div class="col-md-4 col-sm-6 form-group">
							<label>Address</label>
							<input  type="text" class="form-control" name="address" value="<?php print $result[0]['address']; ?>" required />
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