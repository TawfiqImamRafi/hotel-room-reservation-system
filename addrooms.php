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
										<h4 class="box-title">Add Rooms</h4>										
									</div>
									<div class="box-body">
										<form action="room.php" method="post">
										<div class="form-group">
												<label for="room_name">Room Name:</label>
												<input type="text" name="room_name" value="" id="room_name" class="form-control">
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
													<option value="<?php echo $result['cat_id']?>"><?php echo $result['cat_name']?></option>
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
													<option value="<?php echo $result['room_type_id']?>"><?php echo $result['room_type_name']?></option>
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
											<input type="checkbox" id="facilities" name="facilities[]" value="<?php echo $result['facility_name']?>">
 											 <label for="facility<?php echo $result['facilities']?>"><?php echo $result['facility_name']?></label>
											
											  
											  <?php }
													}
													?>
												  <?php
													if (isset($errors['facilities'])) {
														echo '<br><span class="text-danger">'.$errors['facilities'].'</span>';
													}
												?>
											</div>
											<div class="form-group">
												<label for="details">Room details:</label>
												<input type="text" name="details" value="" id="details" class="form-control">
												<?php
													if (isset($errors['details'])) {
														echo '<span class="text-danger">'.$errors['details'].'</span>';
													}
												?>
												
											</div>
											<div class="form-group">
												<label for="price">Room Price:</label>
												<input type="text" name="price" value="" id="price" class="form-control">
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
												<button type="submit" name="add_room" class="btn-submit btn btn-primary">Submit</button>
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