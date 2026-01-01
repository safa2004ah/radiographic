<?php

$result = $db->select("SELECT * FROM `patient` ");
?>

<div class="row">

	<div class="col-12 p-2">

		<a href="index.php?m=<?php print $_GET['m']; ?>&a=add" class="btn bg-gradient-primary">Add New</a>

	</div>

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h3 class="card-title">All Patient</h3>

			</div>

				<form method="get">

					<input type="hidden" name="m" value="<?php print $_GET['m']; ?>" />

					<input type="hidden" name="a" value="<?php print $_GET['a']; ?>" />

				</form>


			<?php if(count($result) == 0){ ?>

			<div class="card-body">

				<div class="text-center text-xl">

					No Results

				</div>

			</div>

			<?php } ?>

			<?php if(count($result) > 0){ ?>

			<div class="card-body">

				<div class="table-responsive">

				<table class="table table-bordered table-hover">

					<thead>                  

						<tr class="bg-gradient-secondary text-center">

							<th>Id</th>

							<th>First Name</th>

							<th>Last Name</th>

							<th>Gender</th>

							<th>Email</th>

							<th>Phone</th>

							<th>Age</th>

							<th>Addres</th>

							<th>Status</th>

							<th>Creation Date</th>

							<th style="width: 20em">Operations</th>

						</tr>

					</thead>

					<tbody>

						<?php

						for($i = 0 ; $i<count($result) ; $i++){

						?>

						<tr>

							<td class="text-center" >

								<?php print $result[$i]['id']; ?>

							</td>

							<td class="text-center" >

								<p>

									<?php print $result[$i]['firstname']; ?>

								</p>

							</td>

							<td class="text-center" >

								<p>

									<?php print $result[$i]['lastname']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['gender']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['email']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['phone']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['age']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['address']; ?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php print $result[$i]['status']; ?>

								</p>

							</td>
							<td class="text-center" width="15%">

								<p>

									<?php print date("Y-m-d H:i:s",$result[$i]['creation_date']); ?>

								</p>

							</td>

							<td class="text-center">

								<a class="btn btn-sm bg-gradient-success text-white" href="index.php?m=<?php print $_GET['m']; ?>&a=edit&id=<?php print $result[$i]['id']; ?>"><i class="fas fa-edit"></i> Edit</a>

								<a class="btn btn-sm bg-gradient-warning text-white" href="index.php?m=<?php print $_GET['m']; ?>&a=check_out&id=<?php print $result[$i]['id']; ?>"><i class="fas fa-edit"></i> Check Out</a>

							</td>

						</tr>

						<?php

						}

						?>

					</tbody>

				</table>

				</div>

			</div>
		<?php } ?>

		</div>

	</div>

</div>