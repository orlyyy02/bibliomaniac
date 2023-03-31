<?php
include 'dbconnection.php';
$id = $_GET['id'];
$sql = "select * from crud where id= $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$password = $row['password'];
$email = $row['email'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "update crud set name='$name', email='$email', password='$password' where id=$id";
    //update tablename set columName = 'ifStringvalue', columnName = ifIntvalue where id = $id
    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        echo '<script></script>';
        header('location:retrieve.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
  </head>
  <body>
        <div></div>
        <h2>Update</h2>
        <form method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input id="name" name="name"  type="text" value="<?php echo $name ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" id="email" name="email"   value="<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="password" name="password"   value="<?php echo $password ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <button style="float:right;"><a href="retrieve.php" style="text-decoration:none" onclick="return confirm('Are you sure you want to cancel?','Yes','No')">Cancel</a></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Update" name="submit" onclick="alert('Data updated successfully')">
                    </td>
                </tr>
            </table>
            
        </form>
    </body>
</html> 