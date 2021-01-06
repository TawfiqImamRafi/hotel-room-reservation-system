<?php include 'header.php';
include 'sidebar.php';
if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
} ?>
			<!-- main-content -->
			<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-6 offset-3">
								<div class="box">
                                <div class="box-header with-border">
										<h4 class="box-title">Add Types</h4>
										
									</div>
									<div class="box-body">
										<form action="types.php" method="post">
											<div class="form-group">
												<label for="room_type_name">Type Name</label>
												<input type="text" name="room_type_name" placeholder="Enter Type name" id="room_type_name" class="form-control">
												<?php
													if (isset($errors['room_type_name'])) {
														echo '<span class="text-danger">'.$errors['room_type_name'].'</span>';
													}
												?>
											</div>
											<div class="form-submit">
												<button type="submit" name="add_type" class="btn-submit btn btn-primary">Submit</button>
											</div>
                                        </form>
                                        <?php
                                        
                                        
                                        ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>