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

                <div class="col-lg-12 ">
                    <div class="box">
                        <div class="box-header with-border">
                            <h1 class="box-title text-center">Room Booking</h1>

                        </div>
                        <form action="book.php" method="post">
                            <div class="box-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 border-right">


                                            <div class="form-group">
                                                <label for="room">Check In Date:</label>
                                                <input type="text" placeholder="MM-DD-YYYY" name="check_in"
                                                    id="checkInDate" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="room">Check Out Date:</label>
                                                <input type="text" placeholder="MM-DD-YYYY" name="check_out"
                                                    id="checkOutDate" class="form-control" autocomplete="off">
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
                                                    <option value="<?php echo $result['cat_id']?>">
                                                        <?php echo $result['cat_name']?>
                                                    </option>
                                                    <?php }
                                            }
                                            ?>
                                                </select>

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
                                                    <option value="<?php echo $result['room_type_id']?>">
                                                        <?php echo $result['room_type_name']?>
                                                    </option>
                                                    <?php }
                                            }
                                            ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="facility">Choose facility:</label><br>
                                                <?php
                                        $sql="SELECT * FROM tb_facilities";
                                        $run=$conn->query($sql);
                                        if($run->num_rows > 0){
                                            while ($result=$run->fetch_assoc()) {?>
                                                <input type="checkbox" id="facilities" class="facilties"
                                                    name="facilities[]" value="<?php echo $result['facility_name']?>">
                                                <label for="facility<?php echo $result['facilities']?>">
                                                    <?php echo $result['facility_name']?>
                                                </label>


                                                <?php }
                                            }
                                            ?>

                                            </div>




                                        </div>
                                        <div class="col-lg-6">



                                            <div class="box-header with-border">
                                                <h4 class="box-title">Rooms</h4>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Room Name</th>
                                                            <th>Details</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rooms">
                                                        <tr>
                                                            <td colspan="4">No Room Selected.</td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-12 border-top">


                                <div class="box-body ">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-6 border-right">
                                                <div class="box-header with-border">
                                                    <h2 class="box-title">Guest Information</h2>
                                                </div>



                                                <label for="guest_name">Name</label>
                                                <input type="text" class="form-group form-control" name="guest_name"
                                                    id="guest_name" placeholder="Enter name...">
                                                <label for="guest_phone">Phone</label>
                                                <input type="tel" class="form-group form-control" name="guest_phone"
                                                    id="guest_phone" placeholder="Enter phone...">
                                                <label for="guest_add">Address</label>
                                                <input type="text" class="form-group form-control" name="guest_add"
                                                    id="guest_add" placeholder="Enter address...">
                                                <h4 class="chk-btn title-hd">Members</h4>
                                                <div>
                                                    <label for="adult">Adult:</label>
                                                    <input type="number" class="form-group" name="adult" id="adult">
                                                </div>
                                                <div>
                                                    <label for="child">Child:</label>
                                                    <input type="number" class="form-group" name="child" id="child">
                                                </div>
                                                <h4 class="chk-btn title-hd">Members Info</h4>
                                                <div id="guest_adult"></div>
                                                <div id="guest_child"></div>






                                            </div>
                                            <div class="col-lg-6">



                                                <div class="box-header with-border">
                                                    <h2 class="box-title">Payment Information</h2>
                                                </div>
                                                <div class="box-body">

                                                    <div class="form-group row">
                                                        <label for="sub_total" class="col-lg-4 col-form-label">Sub
                                                            total:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text"
                                                                id="sub_total" name="sub_total">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="vat"
                                                            class="col-lg-4 col-form-label">Vat(15%):</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="vat"
                                                                name="vat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="discount"
                                                            class="col-lg-4 col-form-label">Discount:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text"
                                                                id="discount" name="discount">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="grand_total" class="col-lg-4 col-form-label">Grand
                                                            Total:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text"
                                                                id="grand_total" name="grand_total">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="paid" class="col-lg-4 col-form-label">Paid:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="paid"
                                                                name="paid">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="due" class="col-lg-4 col-form-label">Due:</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-group form-control" type="text" id="due"
                                                                name="due">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Payment
                                                            Method</label>
                                                        <div class="col-lg-8">
                                                            <select name="payment_medhod" id="" class="form-group form-control">
                                                                <option value="">Select Payment Option</option>
                                                                <option value="Cash">Cash</option>
                                                                <option value="Bkash">Bkash</option>
                                                            </select>
                                                        </div>
                                                    </div>



                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="box-footer">
                                <div class="text-center book-fot">

                                    <input type="submit" value="Book Now" name="book" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
           
                    
<?php include 'footer.php' ?>