<?php include 'header.php';
include 'sidebar.php' ?>
			<!-- main-content -->
			<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="box text-center">
									<div class="box-header with-border">
										<h4 class="box-title">Room List</h4>
									</div>
									<div class="box-body">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Room Name</th>
													<th>Category</th>
													<th>Type</th>
													<th>Facility</th>
													<th>Details</th>
													<th>Price</th>
													<th>Created At</th>
													<th>Action</th>
												</tr>
											</thead>
											<?php
                    $sql="SELECT tb_rooms.*, 
					tb_categories.cat_name,
					tb_room_types.room_type_name 
					FROM tb_rooms 
					LEFT JOIN tb_categories ON tb_categories.cat_id=tb_rooms.cat_id 
					LEFT JOIN tb_room_types ON tb_room_types.room_type_id=tb_rooms.room_type_id";

                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>

                        <tbody>
                        <tr>
							<td><?php echo $result['room_id']?></td>
							<td><?php echo $result['room_name']?></td>
                            <td><?php echo $result['cat_name']?></td>
                            <td><?php echo $result['room_type_name']?></td>
							<td><?php
								if ($result['facilities']) {
									$facilities = json_decode($result['facilities']);
									echo implode(', ', $facilities);
								}
							?></td>
                            <td><?php echo $result['details']?></td>
                            <td><?php echo $result['price']?></td>
                            <td><?php echo $result['created_at']?></td>
                            <td><a href="editroom.php?room_id=<?php echo $result['room_id']?>" class="btn btn-primary">Edit</a>
                            <a href="room.php?rom_del_id=<?php echo $result['room_id']?>" name='del' class="btn btn-danger">Delete</a></td>
                        </tr>
                        </tbody>




                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
										</table>
									</div>
									<div class="box-footer"></div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>

<!-- $facilities = json_decode($row['facilities'])

if (in_array($result[''], $facilities)) {
	echo checked;
} -->