<?php
include 'conn.php';
										if(isset($_POST['add_cat'])){
											$cat_name=$_POST['cat_name'];
											$sql="INSERT INTO tb_categories (cat_name) VALUES ('$cat_name')";
											$run= $conn->query($sql);
											if($run){
												header('location:categorylist.php');

											}else{
												echo 'error'.$conn->error;
											}
										}
										
                                        if(isset($_POST['upp_cat'])){
											$id= $_GET['cat_id'];
											$cat_name=$_POST['cat_name'];
											$sql="UPDATE tb_categories set cat_name='$cat_name' WHERE cat_id='$id'";
											$run= $conn->query($sql);
											if($run){
												header('location:categorylist.php');

											}else{
												echo 'error'.$conn->error;
											}
										}
									    $id=$_GET['cat_del_id'];
										$sql="DELETE FROM tb_categories WHERE cat_id='$id'";
										$run=$conn->query($sql);
										if($run){
											
											header('location:categorylist.php');
										}
										else{
											echo 'Error' .$conn->error;
										}
										
									
                                        ?>