<?php
include 'dbconnection.php';

if(isset($_GET['submit'])){
    $email = $_GET['email'];
    $password = $_GET['password'];

    $sql="select * from crud where email='".$email."' AND password='".$password."' limit 1 ";

    $result=mysqli_query($conn, $sql);

    if($result -> num_rows > 0){
        header('location:homepage.php');
    }
}
?>