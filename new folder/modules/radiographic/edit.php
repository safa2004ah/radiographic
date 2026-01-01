<?php

$results_p = $db->select('SELECT * FROM `patient`');
$results_s = $db->select('SELECT * FROM `section`');

if(isset($_POST['submit']))
{
	$arr = array(

			'patient_id'=>$db->sqlsafe($_POST['patient_id']),
			'section'=>$db->sqlsafe($_POST['section']),
		);
	if($_FILES['image']['size']!=0)
    {
      $name1=''.time().rand(0,10).'1.jpg';
      $file_tmp =$_FILES['image']['tmp_name'];
      move_uploaded_file($file_tmp,"../images/radiographic/".$name1);
      $arr['image']=$db->sqlsafe($name1);
      $filePath = "../images/radiographic/".$result[0]['image'];
      if(file_exists($filePath))
	  unlink($filePath);
    }

		$image_id=$db->update('patient_photos',$arr,'id='.$_GET['id']);
		if($image_id)
		{print '<meta http-equiv="refresh" content="0;URL=index.php?m=radiographic&a=view&success=2" />';die;}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=radiographic&a=view&error=2" />';die;
	}
	}
	else 
	{
		$result = $db->select('SELECT * from patient_photos where id = '.$db->sqlsafe($_GET['id']));
	}
	?>
	<div class="row">
	<div class="col-12 p-2">
		<a href="index.php?m=<?php print $_GET['m']; ?>&a=view" class="btn bg-gradient-primary">Back to Radiographic</a>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-header" >
				<h3 class="card-title float-left "> 
					<b>
						Edit Radiographic
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="form-group col-md-6 col-sm-12 col-xs-12" id="image_div_main">

							<label for="image_up_main">Image</label>

							<div class="input-group">

								<div class="custom-file">

									<input type="file" accept="image/*" class="custom-file-input image_up" name="image" id="image_up_main" >

									<label class="custom-file-label" for="image_up_main">Choose Image</label>

								</div>

							</div>

						</div> <!-- image div main  -->

					</div><!-- Row -->

					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Patient :</label>
							<select class="form-control" name="patient_id" required>
								<option value="<?php print $result[0]['patient_id']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_p) ; $i++){ ?>
								<option value="<?php echo $results_p[$i]['id'];?>"><?php echo $results_p[$i]['firstname'];?> <?php echo $results_p[$i]['lastname'];?></option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-3 col-sm-6 form-group">
							<label>Choose Section :</label>
							<select class="form-control" name="section" required>
								<option value="<?php print $result[0]['section']; ?>">Choose...</option>
								<?php for($i = 0 ; $i<count($results_s) ; $i++){ ?>
								<option value="<?php echo $results_s[$i]['id'];?>"><?php echo $results_s[$i]['name'];?> </option>
								<?php }?>
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