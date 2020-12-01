<?php
$conn= new mysqli('localhost','root','','hrrs');

if($conn->connect_error){
    die('Connection error');
}else{
    echo 'connected';
}