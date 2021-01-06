<?php include 'header.php';
include 'sidebar.php';
if (isset($_SESSION['errors'])) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
} 

if (isset($_SESSION['olddata'])) {
	$old = $_SESSION['olddata'];
	unset($_SESSION['olddata']);
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
										<h4 class="box-title">Edit Rooms</h4>										
									</div>
									<div class="box-body">
										<?php
										      $id= $_GET['room_id'];
											  $sql="SELECT*FROM tb_rooms WHERE room_id='$id'";
											  $run=$conn->query($sql);
											  if($run->num_rows > 0){
												  $room_type=$run->fetch_assoc()?>																			
											<form action="room.php?room_id=<?php echo $room_type['room_id']?>" method="post">
											<div class="form-group">
												<label for="room_name">Room Name:</label>
												
												
												<?php
														if (isset($old)) {?>
															<input type="text" name="room_name" value="<?php echo $old['room_name']?>" id="room_name" class="form-control">
												<?php		}else {?>
															<input type="text" name="room_name" value="<?php echo $room_type['room_name']?>" id="room_name" class="form-control">
														<?php	}
														
													?> 
												<?php
													if (isset($errors['room_name'])) {
														echo '<span class="text-danger">'.$errors['room_name'].'</span>';
													}
												    ?>
											</div>
											<div class="form-group">
											<label for="cat_id">Choose a category:</label>
											<select name="cat_id" id="cat_id" class="form-control">
											<option value="">Select Category</option>
												<?php
												$sql="SELECT * FROM tb_categories";
												$run=$conn->query($sql);
												if($run->num_rows > 0){
													while ($result=$run->fetch_assoc()) {?>
													<option value="<?php echo $result['cat_id']?>" 
													<?php
														if (isset($old)) {
															if ($old['cat_id'] == $result['cat_id']) {
																echo 'selected';
															}
														}else {
															if ($room_type['cat_id'] == $result['cat_id']) {
																echo 'selected';
															}
														}
													?> >
													<?php echo $result['cat_name']?></option>
													<?php }
													}
													?>
													</select>
													<?php
													if (isset($errors['cat_id'])) {
															echo '<span class="text-danger">'.$errors['cat_id'].'</span>';
														}
													?>
													</div>
											<div class="form-group">
											<label for="room_type_id">Choose Room type:</label>
												<select name="room_type_id" id="room_type_id" class="form-control">
												<option value="">Select Room Type</option>
												<?php
												$sql="SELECT * FROM tb_room_types";
												$run=$conn->query($sql);
												if($run->num_rows > 0){
													while ($result=$run->fetch_assoc()) {?>
													<option value="<?php echo $result['room_type_id']?>"<?php
														if (isset($old)) {
															if ($old['room_type_id'] == $result['room_type_id']) {
																echo 'selected';
															}
														}else {
															if ($room_type['room_type_id'] == $result['room_type_id']) {
																echo 'selected';
															}
														}
													?> >
													<?php echo $result['room_type_name']?></option>
													<?php }
													}
													?>
													
													</select>
													<?php
													if (isset($errors['room_type_id'])) {
														echo '<span class="text-danger">'.$errors['room_type_id'].'</span>';
													}
												    ?>
													</div>
											<div class="form-group">
											<label for="facility">Choose facility:</label><br>
											<?php
												$sql="SELECT * FROM tb_facilities";
												$run=$conn->query($sql);
												if($run->num_rows > 0){
													while ($result=$run->fetch_assoc()) {?>
													
													<input type="checkbox" id="facilities" name="facilities[]" value="<?php echo $result['facility_name']?>"<?php
													if (isset($old['facilities'])) {
														if (in_array($result['facility_name'], $old['facilities'])) {
															echo 'checked';
														}
													} else {
														$facilities = json_decode($room_type['facilities']);
														if (in_array($result['facility_name'], $facilities)) {
															echo 'checked';
														}
													}
													
											?>>
 											 <label for="facility<?php echo $result['facilities']?>"><?php echo $result['facility_name']?></label>
											  <?php }
													}
													?>
													<?php
													if (isset($errors['facility_id'])) {
														echo '<br><span class="text-danger">'.$errors['facility_id'].'</span>';
													}
												    ?>
											</div>
											<div class="form-group">
												<label for="details">Room details:</label>
												<?php
														if (isset($old)) {?>
															<input type="text" name="details" value="<?php echo $old['details']?>" id="details" class="form-control">
												<?php		}else {?>
															<input type="text" name="details" value="<?php echo $room_type['details']?>" id="details" class="form-control">
														<?php	}
														}
													?> 
												<?php
													if (isset($errors['details'])) {
														echo '<span class="text-danger">'.$errors['details'].'</span>';
													}
												    ?>
											</div>
											<div class="form-group">
												<label for="price">Room Price:</label>
												
												
												<?php
														if (isset($old)) {?>
															<input type="text" name="price" value="<?php echo $old['price']?>" id="price" class="form-control">
												<?php		}else {?>
															<input type="text" name="price" value="<?php echo $room_type['price']?>" id="price" class="form-control">
														<?php	}
														
													?> 
												<?php
													if (isset($errors['price'])) {
														echo '<span class="text-danger">'.$errors['price'].'</span>';
													}
												    ?>
											</div>
											<!-- <div class="form-group">
									
											<label for="room_img">Product Image</label>
             								   <input type="file" class="form-control" name="room_img" id="room_img" >
											</div> -->
											<div class="form-submit">
												<button type="submit" name="upp_room" class="btn-submit btn btn-primary">Update</button>
												<button type="reset" class="btn-submit btn btn-secondary">Reset</button>
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