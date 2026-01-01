<?php
if(isset($_POST['submit']))
{
	$arr = array(
		"name"=>$db->sqlsafe($_POST['name']),
		"status"=>$db->sqlsafe($_POST['status']),
		);
	

	$id=$db->update('section',$arr,'id='.$_GET['id']);
	if($id)
		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=section&a=view&success=2" />';die;}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=section&a=view&error=2" />';die;
	}
	}
	else 
	{
		$result = $db->select('SELECT * from section where id = '.$db->sqlsafe($_GET['id']));
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back Room</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Edit Section
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Name</label>
							<input  type="text" class="form-control" name="name" value="<?php print $result[0]['name']; ?>" required />
						</div>
					</div><!-- Row -->
					<div class="row">
						<div class="col-md-4 col-sm-6 form-group">
							<label>Status</label>
							<input  type="text" class="form-control" name="status" value="<?php print $result[0]['status']; ?>" required />
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