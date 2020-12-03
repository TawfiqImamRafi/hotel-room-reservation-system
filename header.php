<?php 
session_start();
include 'conn.php';
if(!isset($_SESSION["login"])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Page title -->
    <title>Admin Panel</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png">
    <!-- css files from plugins -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/all.min.css">
    <!-- master stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

	<!-- page wrapper area -->
	<div class="page-wrapper">
		<!-- header area -->
		<header class="header-area">
			<div class="header-logo">
				<a href="">
					<h3>HRRS</h3>
				</a>
				<div class="nav-bar">
					<i class="fas fa-bars"></i>
				</div>
			</div>
			<div class="header-form">
				<form action="#" method="get" class="search_form">
					<input type="text" name="search_keyword" placeholder="Search Keyword" class="custom-search-control">
					<label class="search-icon"><i class="fas fa-search"></i></label>
				</form>
			</div>
			<div class="header-nav">
				<ul>
					<li><a href=""><i class="fas fa-envelope"></i></a></li>
					<li><a href=""><i class="fas fa-bell"></i></a></li>
					<li><a href=""><i class="fas fa-user-circle"></i></a></li>
				</ul>
			</div>
		</header>
		