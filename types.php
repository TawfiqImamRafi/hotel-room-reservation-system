<?php
include 'conn.php';
include 'functions.php';
session_start();
										if(isset($_POST['add_type'])){
											$room_type_name=trim($_POST['room_type_name']);
											//rules
												$rules = [
													'room_type_name' => 'required'
												];
											//check validation
												$errors = formValidate($_POST, $rules);

												if (count($errors) > 0) {
													$_SESSION['errors'] = $errors;
													header('location:addtypes.php');
												}else{
													$sql="INSERT INTO tb_room_types (room_type_name) VALUES ('$room_type_name')";
													$run= $conn->query($sql);
													if($run){
														header('location:typelist.php');
		
													}else{
														echo 'error'.$conn->error;
													}

												}

										
										}
                                        if(isset($_POST['up_type'])){
                                            
                                            
											$room_type_name=trim($_POST['room_type_name']);
											//rules
												$rules = [
													'room_type_name' => 'required'
												];
											//check validation
												$errors = formValidate($_POST, $rules);

												if (count($errors) > 0) {
													$_SESSION['errors'] = $errors;
													$_SESSION['olddata'] = $_POST['room_type_name'];
													header('location:updatetypes.php?room_type_id='.$_GET['room_type_id']);
												}else{
													$id= $_GET['room_type_id'];
													$sql="UPDATE tb_room_types set room_type_name='$room_type_name' WHERE room_type_id='$id'";
													$run= $conn->query($sql);
													if($run){
														header('location:typelist.php');
		
													}else{
														echo 'error'.$conn->error;
													}
												}
										
                                        }
                                        if(isset($_GET['room_type_del_id'])){
											$id= $_GET['room_type_del_id'];
											$sql="DELETE FROM tb_room_types WHERE room_type_id='$id'";
											$run=$conn->query($sql);
											if($run){
												
												header('location:typelist.php');
											}
											else{
												echo 'Error' .$conn->error;
											}
										}
                                   
										

                                        ?>