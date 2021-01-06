<?php
include 'conn.php';
include 'functions.php';
session_start();

if(isset($_POST['add_room'])){
	$room_name=trim($_POST['room_name']);
	$cat_id=trim($_POST['cat_id']);
	$room_type_id=trim($_POST['room_type_id']);
	$facilities=$_POST['facilities'];
	$details=trim($_POST['details']);
	$price=trim($_POST['price']);
	//rules
	$rules = [
		'room_name' => 'required',
		'cat_id' => 'required',
		'room_type_id' => 'required',
		'facilities' => 'required',
		'details' => 'required',
		'price' => 'required',
	];

	//check validation
	$errors = formValidate($_POST, $rules);
	if (count($errors) > 0) {
		$_SESSION['errors'] = $errors;
		header('location:addrooms.php');
	} else {
		$facilities =json_encode($facilities);
		
		$sql="INSERT INTO tb_rooms(room_name,cat_id,room_type_id,facilities,details,price) VALUES ('$room_name','$cat_id','$room_type_id','$facilities','$details','$price')";
		$run= $conn->query($sql);
		if($run){
			header('location:roomlist.php');
	
		}else{
			echo 'error'.$conn->error;
		}
	}
	
}	

if(isset($_POST['upp_room'])){
	
	$room_name=trim($_POST['room_name']);
	$cat_id=trim($_POST['cat_id']);
	$room_type_id=trim($_POST['room_type_id']);
	$facilities=$_POST['facilities'];
	$details=trim($_POST['details']);
	$price=trim($_POST['price']);
	//rules
	$rules = [
		'room_name' => 'required',
		'cat_id' => 'required',
		'room_type_id' => 'required',
		'facilities' => 'required',
		'details' => 'required',
		'price' => 'required',
	];

	//check validation
	$errors = formValidate($_POST, $rules);
	if (count($errors) > 0) {
		$_SESSION['errors'] = $errors;
		$_SESSION['olddata'] = $_POST;
		header('location:editroom.php?room_id='.$_GET['room_id']);
	} else{
		$id= $_GET['room_id'];
		$facilities = json_encode($facilities);
		$sql="UPDATE tb_rooms SET room_name='$room_name',cat_id='$cat_id',room_type_id='$room_type_id',facilities='$facilities',details='$details',price='$price' WHERE room_id='$id'";
		$run= $conn->query($sql);
		if($run){
			header('location:roomlist.php');
	
		}else{
			echo 'error'.$conn->error;
		}

	}

}	

if (isset($_GET['rom_del_id'])) {
	$id=$_GET['rom_del_id'];
	$sql="DELETE FROM tb_rooms WHERE room_id='$id'";
	$run=$conn->query($sql);
	if($run){
		
		header('location:roomlist.php');
	}
	else{
		echo 'Error' .$conn->error;
	}
}





?>