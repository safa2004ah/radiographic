<?php
if(isset($_POST['submit']))
{
	$creation_date=time();
		$arr = array(
			"name"=>$db->sqlsafe($_POST['name']),
			"status"=>$db->sqlsafe($_POST['status']),
			'creation_date'=> $db->sqlsafe($creation_date)
		);
		$id=$db->insert('section',$arr);
			if($id)
			{print '<meta http-equiv="refresh" content="0;URL=index.php?m=section&a=view&success=1" />';die;}
			else
			{
				print '<meta http-equiv="refresh" content="0;URL=index.php?m=section&a=view&error=1" />';die;
			}
	}
	?>
<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back To Section</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Add Section
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Name</label>
							<input  type="text" class="form-control" name="name"required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Status</label>
							<input  type="text" class="form-control" name="status"required>
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