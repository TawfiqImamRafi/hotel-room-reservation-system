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
										<h4 class="box-title">Payment List</h4>
									</div>
									<div class="box-body">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Booking Id</th>
													<th>Paid</th>
													<th>Due</th>
													<th>Method</th>
													<th>Created At</th>
													<th>Action</th>
												</tr>
											</thead>
											<?php
                    $sql="SELECT * FROM payment";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>

                        <tbody>
                        <tr>
                            <td><?php echo $result['payment_id']?></td>
                            <td><?php echo $result['book_id']?></td>
                            <td><?php echo $result['paid']?></td>
                            <td><?php echo $result['due']?></td>
                            <td><?php echo $result['method']?></td>
                            <td><?php echo $result['created_at']?></td>
                            <td><a href="updatepayment.php?payment_id=<?php echo $result['payment_id']?>" class="btn btn-primary">Update</a>
                            </td>
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