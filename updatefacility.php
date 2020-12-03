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
										<h4 class="box-title">Update Facilities</h4>
										
									</div>
                                    <?php
                                    $id= $_GET['facility_id'];
                                    $sql="SELECT*FROM tb_facilities WHERE facility_id='$id'";
                                    $run=$conn->query($sql);
                                    if($run->num_rows > 0){
                                    $result=$run->fetch_assoc()?>


									<div class="box-body">
										<form action="facility.php?facility_id=<?php echo $result['facility_id']?>" method="post">
											<div class="form-group">
												<label for="facility_name">Category Name</label>
												<input type="text" name="facility_name" value="<?php echo $result['facility_name']?>" id="facility_name" class="form-control">
											</div>
											<div class="form-submit">
												<button type="submit" name="upp_fac" class="btn-submit btn btn-primary">Update</button>
											</div>
                                        </form>
                                  <?php  
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