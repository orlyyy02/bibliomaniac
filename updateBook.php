<?php
include 'dbconnection.php';
$id = $_GET['id'];
$sql = "select * from upload where id= $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $imageURL = $_POST['file'];;
    $bookName = $_POST['bookName'];
    $price = $_POST['price'];
    $genre = $_POST['genre'];
    $author = $_POST['author'];
    

    $query = "update upload set bookCover='$imageURL', bookName='$bookName', price='$price', genre='$genre', author='$author' where id=$id";
    //update tablename set columName = 'ifStringvalue', columnName = ifIntvalue where id = $id
    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        echo '<script></script>';
        header('location:Ahomepage.php');
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
  <style>
    @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        body
        {
            background-image: url('FillUpBackground.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color:black;
        }
        .topbox
        {
            position: absolute;
            top: 0%;
            left: 0%;
            height: 13%;
            width: 100%;
            background-color: black;
            border-bottom:1px solid white;
        }
        .logo
        {
            height: 100%;
            width: 12%;
        }
        .newBook
        {
            margin-top:16%;
            color:black;
            text-align:center;
            background-color: white;
            width: 500px;
            height: 290px;
            padding: 10px;
        }
        .updateBtn
        {
            margin-left:68%;
        }
        p
        {
            font-size:25px;
        }
        .link
        {
            position:absolute;
            margin-top:2.5%;
            margin-left:77%;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
    </style>
  <body>
  <div class="topbox">
        <img class="logo" src="logo.png"></img>
        <a class="link" href="AHomepage.php">Home</a>
    </div>
        <center>
        <form method="POST">
        <div class="newBook">
        <center><table>
        <p>Update Book</p>
        <tr>
        <td>Select new book cover:</td>
        <td><input type="file" name="file"></td>
        </tr>
        <tr>
        <td>Update name:</td>
        <td><input style="width:170px;" type="text" name="bookName" id="bookName"></td>
        </tr>
        <tr>
        <td>Update price:</td>
        <td><input style="width:170px;" type="text" name="price" id="price"></td>
        </tr>
        <tr>
        <td>Update genre:</td>
        <td><select style="width:178px;" name="genre" id="genre">
            <option>Comedy</option>
            <option>Romance</option>
            <option>Horror</option>
            <option>Thriller</option>
            <option>Self Help</option>
            <option>Cookbook</option>
            <option>Fantasy</option>
        </select></td>
        </tr>
        <tr>
        <td>Author:</td>
        <td><input style="width:170px;" type="text" name="author" id="author"></td>
        </tr>
        <tr>
        <td colspan="2"><input class="updateBtn" type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
    </div>
    </center>
        </form>
    </body>
</html>