<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    
</head>
<body>
<table class="table">
<tr><td colspan="5"><button style="float:right;"><a href="create.php" style="text-decoration:none"> Add User</a></td></tr>
<tr></tr>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PASSWORD</th>
    </tr>
    
    <?php
        $sql = "select * from crud";
        //select * from tablename 
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];
    ?>
         <tr>
             <th scope="row"><?php echo $id ?></th>
             <td><?php echo $name?></td>
             <td><?php echo $email ?></td>
             <td><?php echo $password ?></td>
             <td>
                 <button><a href="update.php?id=<?php echo $id; ?>" style="text-decoration:none">Edit</a></button>
                 <button><a href="delete.php?id=<?php echo $id; ?>" style="text-decoration:none" onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
             </td>
         </tr> 
     <?php
           }
        }
        else{
            die(mysqli_error($conn));
        }
    ?>
    <?php
        // $sql = "select * from crud";
        // $result = mysqli_query($conn, $sql);
        // if($result -> num_rows > 0){
        //     while($row = mysqli_fetch_assoc($result)){
        //         $id = $row['id'];
        //         $name = $row['name'];
        //         $email = $row['email'];
        //         $password = $row['password'];
        //         echo '<tr>
        //         <th scope="row">'.$id.'</th>
        //         <td>'.$name.'</td>
        //         <td>'.$email.'</td>
        //         <td>'.$password.'</td>
        //         <td>
        //             <button><a href="update.php" style="text-decoration:none">Update</a></button>
        //             <button><a href="delete.php?id='.$id.'" style="text-decoration:none" onclick="return confirm("Are you sure you want to delete?")">Delete</a></button>
        //         </td>
        //     </tr>';
        //     }
        // }
        // else{
        //     die(mysqli_error($conn));
        // }
    ?>
        
</table>
</body>
</html>