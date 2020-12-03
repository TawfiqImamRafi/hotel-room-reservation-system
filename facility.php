<?php
include 'conn.php';
										if(isset($_POST['add_fac'])){
											$facility_name=$_POST['facility_name'];
											$sql="INSERT INTO tb_facilities (facility_name) VALUES ('$facility_name')";
											$run= $conn->query($sql);
											if($run){
												header('location:facilitylist.php');

											}else{
												echo 'error'.$conn->error;
											}
										}
										
                                        if(isset($_POST['upp_fac'])){
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
									    $id=$_GET['fac_del_id'];
										$sql="DELETE FROM tb_facilities WHERE facility_id='$id'";
										$run=$conn->query($sql);
										if($run){
											
											header('location:facilitylist.php');
										}
										else{
											echo 'Error' .$conn->error;
										}
										
									
                                        ?>