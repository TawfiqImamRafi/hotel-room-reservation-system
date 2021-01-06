<?php include 'header.php';
include 'sidebar.php';
if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
?>
<!-- main-content -->
<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-6 offset-3">
								<div class="box">
								<div class="box-header with-border">
										<h4 class="box-title">Add Facilities</h4>
										
									</div>
									<div class="box-body">
										<form action="facility.php" method="post">
											<div class="form-group">
												<label for="facility_name">Facility  Name</label>
												<input type="text" name="facility_name" placeholder="Enter facility name" id="facility_name" class="form-control">
												<?php
													if (isset($errors['facility_name'])) {
														echo '<span class="text-danger">'.$errors['facility_name'].'</span>';
													}
												?>
											</div>
											<div class="form-submit">
												<button type="submit" name="add_fac" class="btn-submit btn btn-primary">Submit</button>
											</div>
                                        </form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

</div>
           
                    
<?php include 'footer.php' ?>