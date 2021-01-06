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
										<h4 class="box-title">Update types</h4>
										
									</div>
                                    <?php
									if(isset($_GET['room_type_id'])){
                                    $id= $_GET['room_type_id'];
                                    $sql="SELECT*FROM tb_room_types WHERE room_type_id='$id'";
                                    $run=$conn->query($sql);
                                    if($run->num_rows > 0){
                                    $result=$run->fetch_assoc()?>


									<div class="box-body">
										<form action="types.php?room_type_id=<?php echo $result['room_type_id']?>" method="post">
											<div class="form-group">
												<label for="room_type_name">Type Name</label>
												<?php 
												if(!isset($_SESSION['olddata'])){?>
												<input type="text" name="room_type_name" value="<?php echo $result['room_type_name']?>" id="room_type_name" class="form-control">
												<?php
												
											}else{?>
												<input type="text" name="room_type_name" value="<?php echo $_SESSION['olddata']?>" id="room_type_name" class="form-control">

												<?php
												unset($_SESSION['olddata']);
												}
												?>
												<?php
													if (isset($errors['room_type_name'])) {
														echo '<span class="text-danger">'.$errors['room_type_name'].'</span>';
													}?>
											</div>
											<div class="form-submit">
												<button type="submit" name="up_type" class="btn-submit btn btn-primary">Update</button>
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