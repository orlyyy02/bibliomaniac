<?php
//$conn = mysqli_connect('localhost','root','','crudoperation');
$conn = new mysqli('localhost','root','','bibliomaniac');
if(!$conn){
    die(mysqli_error($conn));
    //echo "connected successfully";
}
?>