<?php
include 'conn.php';
										if(isset($_POST['add_type'])){
											$room_type_name=$_POST['room_type_name'];
											$sql="INSERT INTO tb_room_types (room_type_name) VALUES ('$room_type_name')";
											$run= $conn->query($sql);
											if($run){
												header('location:typelist.php');

											}else{
												echo 'error'.$conn->error;
											}
										}
                                        if(isset($_POST['up_type'])){
                                            
                                            $id= $_GET['room_type_id'];
											$room_type_name=$_POST['room_type_name'];
											$sql="UPDATE tb_room_types set room_type_name='$room_type_name' WHERE room_type_id='$id'";
											$run= $conn->query($sql);
											if($run){
												header('location:typelist.php');

											}else{
												echo 'error'.$conn->error;
											}
                                        }
                                        
                                        $id= $_GET['room_type_del_id'];
										$sql="DELETE FROM tb_room_types WHERE room_type_id='$id'";
										$run=$conn->query($sql);
										if($run){
											
											header('location:typelist.php');
										}
										else{
											echo 'Error' .$conn->error;
										}
										

                                        ?>