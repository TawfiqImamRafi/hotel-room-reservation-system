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
										<h4 class="box-title">Category List</h4>
									</div>
									<div class="box-body">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Category Name</th>
													<th>Created At</th>
													<th>Action</th>
												</tr>
											</thead>
											<?php
                    $sql="SELECT * FROM tb_categories";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>

                        <tbody>
                        <tr>
                            <td><?php echo $result['cat_id']?></td>
                            <td><?php echo $result['cat_name']?></td>
                            <td><?php echo $result['created_at']?></td>
                            <td><a href="updatecategory.php?cat_id=<?php echo $result['cat_id']?>" class="btn btn-primary">Edit</a>
                            <a href="category.php?cat_del_id=<?php echo $result['cat_id']?>" name='del' class="btn btn-danger">Delete</a></td>
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