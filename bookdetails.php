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
										<h4 class="box-title">Booking Details</h4>
									</div>
									<div class="box-body">
									
											<?php
                    $sql="SELECT * FROM tb_guests  ORDER BY `guest_id` DESC LIMIT 1";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                        <div><p>Guest Id =<?php echo $result['guest_id']?></p></div>
                        <div><p>Guest Name =<?php echo $result['guests_name']?></p></div>
                        <div><p>Guest Contact =<?php echo $result['guests_phone']?></p></div>
                        <div><p>Guest Address =<?php echo $result['guests_address']?></p></div>
                        <h4>Member Information</h4>
                        <table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Member Name</th>
													<th>Member Age</th>
													<th>Type</th>
												</tr>
											</thead>

                
											<?php
                        $guest_id= $result['guest_id'];                    
                    $sql="SELECT * FROM members  WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                        <tbody>
                        <tr>
                            <td><?php echo $result['member_name']?></td>
                            <td><?php echo $result['member_age']?></td>
                            <td><?php echo $result['type']?></td>
                        </tr>
                        </tbody>


                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
                    </table>
                        <h4>Reservation Information</h4>
                        <table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Book Id</th>
													<th>Check in time</th>
													<th>Check out time</th>
													<th>Issue Date</th>
													<th>Room Id</th>
												</tr>
											</thead>

                
											<?php
                                            
                    $sql="SELECT * FROM booking  WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                        <tbody>
                        <tr>
                            <td><?php echo $result['book_id']?></td>
                            <td><?php echo $result['check_in_time']?></td>
                            <td><?php echo $result['check_out_time']?></td>
                            <td><?php echo $result['issue_date']?></td>
                            <td>
                            <?php
                                            $book_id= $result['book_id'];         
                                            $sql="SELECT * FROM booking_room  WHERE $book_id=book_id ";
                                            $run=$conn->query($sql);
                                            if($run->num_rows > 0){
                                                while ($result=$run->fetch_assoc()) {
                                                    $roomid[]=  json_decode($result['room_id']);
                                                    echo implode(', ', $roomid);
                                                                 
                        }
                    }?></td>
                            
                        

                        </tr>
                        </tbody>


                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
                    </table>
                        <h4>Payment Information</h4>
                        <table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Payment Id</th>
													<th>Sub total</th>
													<th>Vat</th>
													<th>Discount</th>
													<th>Grand Total</th>
													<th>Paid</th>
													<th>Due</th>
													<th>Method</th>
												</tr>
											</thead>

                
											<?php
                                            
                    $sql="SELECT * FROM booking  WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                        <tbody>
                        <tr>
                            <td><?php echo $result['book_id']?></td>
                            <td><?php echo $result['sub_total']?></td>
                            <td><?php echo $result['vat']?></td>
                            <td><?php echo $result['discount']?></td>
                            <td><?php echo $result['grand_total']?></td>
                            <?php
                                  $book_id= $result['book_id'];         
                                            $sql="SELECT * FROM payment  WHERE $book_id=`book_id`";
                                            $run=$conn->query($sql);
                                            if($run->num_rows > 0){
                                                while ($result=$run->fetch_assoc()) {?>

                            <td><?php echo $result['paid']?></td>
                            <td><?php echo $result['due']?></td>
                            <td><?php echo $result['method']?></td>
                            <?php
                           
                        }
                    }?>
                            
                        

                        </tr>
                        </tbody>


                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
                    </table>

<?php
                           
                        }
                    }
                    ?>
										
									</div>
									<div class="box-footer"></div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>