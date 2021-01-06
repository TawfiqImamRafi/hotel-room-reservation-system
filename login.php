<?php 
session_start();
include 'conn.php';
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
    <link rel="stylesheet" href="assets/css/login.css">
</head>


<?php 
if(isset($_POST['login'])){
    $email=$_POST['admin_email'];
    $password=$_POST['admin_password'];
    $pass=md5($password);
    $sql="SELECT*FROM tb_admin WHERE admin_email='$email' AND admin_password='$pass'";
    $run=$conn->query($sql);
    if($run->num_rows > 0){
        $result=$run->fetch_assoc();
        $_SESSION["admin_id"]=$result['admin_id'];
        $_SESSION["admin_name"]=$result['admin_name'];
        $_SESSION["login"]=["login"];

        header("location:index.php");
        }

    else{
        $invalied = "Wrong Email or Password.";
    }
}
?>
<body>   
    <div class="admin-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center title-hd">Admin Login</h1>
                    <div class="col-lg-4 offset-4">
                        <form action=""method="post">
                            <label for="admin_email">Email</label>
                            <input type="email" class="form-group form-control" name="admin_email" id="admin_email" placeholder="Enter email...">
                <label for="admin_password">Password</label>
                <input type="password" class="form-group form-control" name="admin_password" id="admin_password" placeholder="Enter password...">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </form>
            <div>
                <?php if(isset($invalied)){
                    echo $invalied;
                }
                ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php' ?>