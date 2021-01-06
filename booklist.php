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
										<h4 class="box-title">Booking List</h4>
									</div>
									<div class="box-body">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Booking Id</th>
													<th>Guest Id</th>
													<th>Check In Time</th>
													<th>Check Out Time</th>
													<th>Grand Total</th>
													<th>Due</th>
													<th>Issued At</th>
													<th>Action</th>
												</tr>
											</thead>
											<?php
                    $sql = "SELECT booking.*,
                    payment.due
                    FROM booking 
                    LEFT JOIN payment ON payment.book_id=booking.book_id";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result_1=$run->fetch_assoc()) {?>

                        <tbody>
                        <tr>
                            <td><?php echo $result_1['book_id']?></td>
                            <td><?php echo $result_1['guest_id']?></td>
                            <td><?php echo $result_1['check_in_time']?></td>
                            <td><?php echo $result_1['check_out_time']?></td>
                            <td><?php echo $result_1['grand_total']?></td>
                            <td><?php echo $result_1['due']?></td>                   
                            <td><?php echo $result_1['issue_date']?></td>
                            <td><a href="booklistdetails.php?guest_id=<?php echo $result_1['guest_id']?>" class="btn btn-primary">Details</a>
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