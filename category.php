<?php
include 'conn.php';
include 'functions.php';
session_start();
	if(isset($_POST['add_cat'])){
		$cat_name = trim($_POST['cat_name']);

		//rules
		$rules = [
			'cat_name' => 'required'
		];

		//check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			$_SESSION['errors'] = $errors;
			header('location:addcategories.php');
		}else {
			//insert
			$sql="INSERT INTO tb_categories (cat_name) VALUES ('$cat_name')";
			$run= $conn->query($sql);
			if($run){
				header('location:categorylist.php');

			}else{
				echo 'error'.$conn->error;
			}
		}
		
	}
	
	if(isset($_POST['upp_cat'])){
		//rules
		$rules = [
			'cat_name' => 'required'
		];

		//check validation
		$errors = formValidate($_POST, $rules);

		if (count($errors) > 0) {
			
			$_SESSION['errors'] = $errors;
			$_SESSION['olddata'] = $_POST['cat_name'];
			header('location:updatecategory.php?cat_id='.$_GET['cat_id']);
		}else{
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
	
	}


	if (isset($_GET['cat_del_id'])) {
		$id=$_GET['cat_del_id'];
		$sql="DELETE FROM tb_categories WHERE cat_id='$id'";
		$run=$conn->query($sql);
		if($run){
			
			header('location:categorylist.php');
		}
		else{
			echo 'Error' .$conn->error;
		}
	
	}

	?>