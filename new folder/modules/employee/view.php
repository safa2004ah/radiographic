<?php

$result = $db->select("SELECT * FROM `administrators` WHERE admin_level=2");
?>

<div class="row">

	<div class="col-12 p-2">

		<a href="index.php?m=<?php print $_GET['m']; ?>&a=add" class="btn bg-gradient-primary">Add New</a>

	</div>

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h3 class="card-title">All Employees</h3>

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

							<th>Username</th>

							<th>Email</th>

							<th style="width: 15em">Operations</th>

						</tr>

					</thead>

					<tbody>

						<?php

						for($i = 0 ; $i<count($result) ; $i++){

						?>

						<tr>

							<td class="text-center" width="13%;">

								<?php print $result[$i]['admin_id']; ?>

							</td>

							<td class="text-center" width="20%">

								<p>

									<?php print $result[$i]['username']; ?>

								</p>

							</td>

							<td class="text-center" width="30% ">

								<p style="width: 20em;white-space: nowrap;overflow: hidden !important;text-overflow: ellipsis;">

									<?php print $result[$i]['email']; ?>

								</p>

							</td>

							<td class="text-center">

								<a class="btn btn-sm bg-gradient-success text-white" href="index.php?m=<?php print $_GET['m']; ?>&a=edit&id=<?php print $result[$i]['admin_id']; ?>"><i class="fas fa-edit"></i> Edit</a>

								<button type="button" class="btn btn-sm bg-gradient-danger text-white" data-toggle="modal" data-target="#delete_modal_<?php print $result[$i]['admin_id']; ?>">

									<i class="fas fa-trash"></i> Delete

								</button>

								<div class="modal fade" id="delete_modal_<?php print $result[$i]['admin_id']; ?>">

									<div class="modal-dialog">

										<div class="modal-content">

											<div class="modal-header">

												<h4 class="modal-title">Delete Confirmation</h4>

												<button type="button" class="close" data-dismiss="modal" aria-label="Close">

													<span aria-hidden="true">&times;</span>

												</button>

											</div>

											<div class="modal-body text-center">

												<p><h4>Are you sure you want to delete?</h4></p>

											</div>

											<div class="modal-footer justify-content-between">

												<button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Cancel</button>

												<a class="btn bg-gradient-danger" href="index.php?m=<?php print $_GET['m']; ?>&a=delete&id=<?php print $result[$i]['admin_id']; ?>">Delete</a>

											</div>

										</div>

									</div>

								</div>

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