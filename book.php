<?php
session_start();
include 'conn.php';
try {
    $conn->begin_transaction();
    
    if(isset($_POST['book'])){ 
       $admin_id=$_SESSION['admin_id'];
       $check_in=$_POST['check_in'];
       $check_out=$_POST['check_out'];
       $cat_id=$_POST['cat_id'];
       $room_type_id=$_POST['room_type_id'];
       $rooms=$_POST['rooms'];
       $guest_name=$_POST['guest_name'];
       $guest_phone=$_POST['guest_phone'];
       $guest_add=$_POST['guest_add'];
       $adult=$_POST['adult'];
       $child=$_POST['child'];
       $adult_guest_name=$_POST['adult_guest_name'];
       $adult_guest_age=$_POST['adult_guest_age'];
       $child_guest_name=$_POST['child_guest_name'];
       $child_guest_age=$_POST['child_guest_age'];
       $sub_total=$_POST['sub_total'];
       $vat=$_POST['vat'];
       $discount=$_POST['discount'];
       $grand_total=$_POST['grand_total'];
       $paid=$_POST['paid'];
       $due=$_POST['due'];
       $payment_medhod=$_POST['payment_medhod'];
     // insert guest
       $sql="INSERT INTO tb_guests(adult,child,guests_name,guests_phone,guests_address) VALUES ('$adult','$child','$guest_name','$guest_phone','$guest_add')";
       $run= $conn->query($sql);
	   if($run){
			// insert member
            $sql="SELECT * FROM tb_guests  ORDER BY `guest_id` DESC LIMIT 1";
            $run=$conn->query($sql);
          
            $result=$run->fetch_assoc();
            $gust_id= $result['guest_id'];
    
                
           foreach($adult_guest_name as $key => $a_name) {
               $age = $adult_guest_age[$key];
               $query = "INSERT INTO members(guest_id,member_name,member_age,type)values('$gust_id', '$a_name', '$age', 'adult')";
               $run= $conn->query($query);
           }
           foreach($child_guest_name as $key => $c_name) {
               $age = $child_guest_age[$key];
               $query = "INSERT INTO members(guest_id,member_name,member_age,type)values('$gust_id', '$c_name', '$age', 'child')";
               $run= $conn->query($query);
           }  
          
         // insert booking
            $sql="INSERT INTO booking(guest_id,admin_id,check_in_time,check_out_time,status,sub_total,vat,discount,grand_total) VALUES ('$gust_id','$admin_id','$check_in','$check_out','1','$sub_total','$vat','$discount','$grand_total')";
            $run= $conn->query($sql);
         if($run){
             // insert booking room

                    $sql="SELECT * FROM booking  ORDER BY `book_id` DESC LIMIT 1";
                    $run=$conn->query($sql); 
                    
                    $booking = $run->fetch_assoc();
                    $booking_id = $booking['book_id'];
                            foreach($rooms as $key => $room_id) {
                                $sql="INSERT INTO booking_room(book_id,room_id) VALUES ('$booking_id','$room_id')";
                                $run= $conn->query($sql);

                            }

             // insert payment
         
                 $sql="INSERT INTO payment(book_id,paid,due,method) VALUES ('$booking_id','$paid','$due','$payment_medhod')";
                 $run= $conn->query($sql);
     
                 header('location:bookdetails.php');
         } else {
             throw new Exception($conn->error);
         }
	
        }
        
        }
        else{
			echo 'error'.$conn->error;
        }


    // Update payment
        if(isset($_POST['uppayment'])){
            $id= $_GET['payment_id'];
												$paid=$_POST['paid'];
												$due=$_POST['due'];
												$sql="UPDATE payment set paid='$paid',due='$due' WHERE payment_id='$id'";
												$run= $conn->query($sql);
												if($run){
													header('location:booklist.php');
	
												}else{
													echo 'error'.$conn->error;
												}
        }
    
    



    $conn->commit();

}catch(\Exception $e) {
    $conn->rollback();
    echo 'An error occurred while booking store. '. $e->getMessage();
}

