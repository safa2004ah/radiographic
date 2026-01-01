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
			"email"=>$db->sqlsafe($_POST['email'])
		);
		$fba_users_id=$db->update('administrators',$arr,'admin_id='.$_GET['id']);

		print '<meta http-equiv="refresh" content="0;URL=index.php?m=doctor&a=view&success=1" />';die;
	}
	else
	{
		print '<meta http-equiv="refresh" content="0;URL=index.php?m=doctor&a=view&error=1" />';die;
	}
	}
	else 
	{
		$content = $db->select('SELECT * FROM `administrators` WHERE `admin_id`='.$db->sqlsafe($_GET['id']).' limit 1');
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
						Edit Doctor
					</b>
				</h3>
			</div>
			<div class="card-header">
				<form id="add_form" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Username</label>
							<input  type="text" class="form-control" name="username" value="<?php print $content[0]['username']; ?>" >
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label>Email</label>
							<input  type="email" class="form-control" name="email" value="<?php print $content[0]['email']; ?>">
						</div>	
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 form-group">
							<label for="password" class="form-label">Password</label>
							<div class="input-group">
								<input type="password"  class="form-control" name="password" id="password" placeholder="Enter new password (leave blank to keep current)" autocomplete="new-password">
								
								<span class="input-group-text bg-white cursor-pointer" id="togglePassword">
									<i class="fas fa-eye-slash" id="eyeIcon"></i>
									<script>
										document.getElementById('togglePassword').addEventListener('click', function () {
											const passwordField = document.getElementById('password');
											const eyeIcon = document.getElementById('eyeIcon');

											// Toggle the type attribute
											if (passwordField.type === 'password') {
												passwordField.type = 'text';
												eyeIcon.classList.remove('fas');
												eyeIcon.classList.add('far');
											} else {
												passwordField.type = 'password';
												eyeIcon.classList.remove('far');
												eyeIcon.classList.add('fas');
											}
										});
									</script>
								</span>
							</div>
							<small class="text-muted">Leave if you don't want to change </small>
						</div>	
					</div>
					
			<div class="row">
				<button type="submit" name="submit" class="btn bg-gradient-primary">Edit</button>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>