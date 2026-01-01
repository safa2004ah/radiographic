<?php

$result = $db->select('SELECT * FROM `patient_photos`');

$patres = $db->select('SELECT * FROM `patient`');

$secres = $db->select('SELECT * FROM `section`');

?>

<div class="row">

<div class="col-12 p-2">

	<a href="index.php?m=<?php print $_GET['m']; ?>&a=add" class="btn bg-gradient-primary">Add New</a>

</div>

	<div class="col-12">

		<div class="card">

			<div class="card-header">

				<h3 class="card-title">All Radiographic</h3>

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

							<th>Patient Name </th>

							<th>Section</th>

							<th style="width: 50em">Image</th>

							<th>Creation date</th>		

							<th style="width: 15em">Operations</th>

						</tr>

					</thead>

					<tbody>

						<?php

						for($i = 0 ; $i<count($result) ; $i++){

						?>

						<tr>

							<td class="text-center" width="5%;">

								<?php print $result[$i]['id']; ?>

							</td>
							<td class="text-center" >

								<p>

									<?php 
									for($j = 0 ; $j<count($patres) ; $j++){
										if($patres[$j]['id']== $result[$i]['patient_id']){
											print $patres[$j]['firstname'];
										}
									}
									?>

								</p>

							</td>
							<td class="text-center" >

								<p>

									<?php 
									for($f = 0 ; $f<count($secres) ; $f++){
										if($secres[$f]['id']== $result[$i]['section']){
											print $secres[$f]['name'];
										}
									}
									?>

								</p>

							</td>
							<td width="20%;">

               					<a href="../images/radiographic/<?php print $result[$i]['image']; ?>" data-toggle="lightbox" data-title="Main Image">

                  					<image class="col-12" src="../images/radiographic/<?php print $result[$i]['image']; ?>">

                				</a>

              				</td>
							<td class="text-center" width="25%">

								<p>

									<?php print date("Y-m-d H:i:s",$result[$i]['creation_date']); ?>

								</p>

							</td>
							<td class="text-center">

							<a class="btn btn-sm bg-gradient-success text-white" href="index.php?m=<?php print $_GET['m']; ?>&a=edit&id=<?php print $result[$i]['id']; ?>"><i class="fas fa-edit"></i> Edit</a>


								<button type="button" class="btn btn-sm bg-gradient-danger text-white" data-toggle="modal" data-target="#delete_modal_<?php print $result[$i]['id']; ?>">

									<i class="fas fa-trash"></i> Delete

								</button>

								<div class="modal fade" id="delete_modal_<?php print $result[$i]['id']; ?>">

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

												<a class="btn bg-gradient-danger" href="index.php?m=<?php print $_GET['m']; ?>&a=delete&id=<?php print $result[$i]['id']; ?>">Delete</a>

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