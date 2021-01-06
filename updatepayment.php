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
                                                    <h2 class="box-title">Payment Information</h2>
                                                </div>
                                                <div class="box-body">
                                                <?php
									if(isset($_GET['payment_id'])){
                                    $id= $_GET['payment_id'];
                                    $sql="SELECT*FROM payment WHERE payment_id='$id'";
                                    $run=$conn->query($sql);
                                    if($run->num_rows > 0){
                                    $result_1=$run->fetch_assoc()?>

                                                   
                                                    
                                                    <h4>Booking Id=<?php echo $result_1['book_id']?></h4>
                                                    <form action="book.php?payment_id=<?php echo $result_1['payment_id']?>" method="post">
                                                    <?php
                      $book_id= $result_1['book_id'];                
                    $sql="SELECT * FROM booking  WHERE $book_id=`book_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                    $result=$run->fetch_assoc()?>
                                                    <div class="form-group row">
                                                        <label for="grand_total" class="col-lg-4 col-form-label">Grand
                                                            Total:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" value="<?php echo $result['grand_total']?>"
                                                                id="grand_total" name="grand_total">
                                                        </div>
                                                    </div>
                           
                                                    
                                                    <div class="form-group row">
                                                        <label for="paid" class="col-lg-4 col-form-label">Paid:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="paid" value="<?php echo $result_1['paid']?>"
                                                                name="paid">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="due" class="col-lg-4 col-form-label">Due:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="due" value="<?php echo $result_1['due']?>"
                                                                name="due">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="paid" class="col-lg-4 col-form-label">Due Payment:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="dpaid" 
                                                                name="dpaid">
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-submit">
												<button type="submit" name="uppayment" class="btn-submit btn btn-primary">Submit</button>
												
											</div>
                                                    </form>
                                                    <?php  
                                
                                
                                }
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