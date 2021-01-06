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
										<h4 class="box-title">Update categories</h4>
										
									</div>
                                    <?php
									if(isset($_GET['cat_id'])){
                                    $id= $_GET['cat_id'];
                                    $sql="SELECT*FROM tb_categories WHERE cat_id='$id'";
                                    $run=$conn->query($sql);
                                    if($run->num_rows > 0){
                                    $result=$run->fetch_assoc()?>


									<div class="box-body">
										<form action="category.php?cat_id=<?php echo $result['cat_id']?>" method="post">
											<div class="form-group">
												<label for="cat_name">Category Name</label>
												<?php 
												if(!isset($_SESSION['olddata'])){?>
												<input type="text" name="cat_name" value="<?php echo $result['cat_name']?>" id="cat_name" class="form-control">
												<?php
												
											}else{?>
												<input type="text" name="cat_name" value="<?php echo $_SESSION['olddata']?>" id="cat_name" class="form-control">

												<?php
												unset($_SESSION['olddata']);
												}
												?>
												<?php
													if (isset($errors['cat_name'])) {
														echo '<span class="text-danger">'.$errors['cat_name'].'</span>';
													}?>
												
											</div>
											<div class="form-submit">
												<button type="submit" name="upp_cat" class="btn-submit btn btn-primary">Update</button>
											</div>
                                        </form>
                                  <?php  
                                }
                                }
                                    
                                    ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

</div>
           
                    
<?php include 'footer.php' ?>