<?php
    include 'dbconnection.php';
    $id = $_GET['id'];
    if($id>0){
        $sql = "delete from upload where id = $id ";
        //delete from tablename where id = $id
        $result = mysqli_query($conn, $sql);
        if($result){
            //echo '<script>alert("Deleted Successfully")</script>';
            header('location:Ahomepage.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>