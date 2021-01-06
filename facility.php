<?php
include 'conn.php';
include 'functions.php';
session_start();
										if(isset($_POST['add_fac'])){
											$facility_name=trim($_POST['facility_name']);
											//rules
											$rules = [
												'facility_name' => 'required'
											];

											//check validation
											$errors = formValidate($_POST, $rules);

											if (count($errors) > 0) {
												$_SESSION['errors'] = $errors;
												header('location:addfacilities.php');
											}else {
												$sql="INSERT INTO tb_facilities (facility_name) VALUES ('$facility_name')";
												$run= $conn->query($sql);
												if($run){
													header('location:facilitylist.php');
	
												}else{
													echo 'error'.$conn->error;
												}

											}										
										}
										
                                        if(isset($_POST['upp_fac'])){
											$rules = [
												'facility_name' => 'required'
											];

											//check validation
											$errors = formValidate($_POST, $rules);

											if (count($errors) > 0) {
												$_SESSION['errors'] = $errors;
												$_SESSION['olddata'] = $_POST['facility_name'];
												header('location:updatefacility.php?facility_id='.$_GET['facility_id']);
											}else{
												$id= $_GET['facility_id'];
												$facility_name=$_POST['facility_name'];
												$sql="UPDATE tb_facilities set facility_name='$facility_name' WHERE facility_id='$id'";
												$run= $conn->query($sql);
												if($run){
													header('location:facilitylist.php');
	
												}else{
													echo 'error'.$conn->error;
												}
											}
										
										}
										if(isset($_GET['fac_del_id'])){
											$id=$_GET['fac_del_id'];
											$sql="DELETE FROM tb_facilities WHERE facility_id='$id'";
											$run=$conn->query($sql);
											if($run){
												
												header('location:facilitylist.php');
											}
											else{
												echo 'Error' .$conn->error;
											}

										}
									
										
									
                                        ?>