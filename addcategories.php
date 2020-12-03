<?php include 'header.php';
include 'sidebar.php' ?>
<!-- main-content -->
<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">

							<div class="col-lg-6 offset-3">
								<div class="box">
								<div class="box-header with-border">
										<h4 class="box-title">Add categories</h4>
										
									</div>
									<div class="box-body">
										<form action="category.php" method="post">
											<div class="form-group">
												<label for="cat_name">Category Name</label>
												<input type="text" name="cat_name" placeholder="Enter category name" id="cat_name" class="form-control">
											</div>
											<div class="form-submit">
												<button type="submit" name="add_cat" class="btn-submit btn btn-primary">Submit</button>
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