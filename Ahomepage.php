<html lang="en">
<head>
    <title>
        Admin's Home Page
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
            color:white;
        }
        .toHomepage{
            position: absolute;
            top:5%;
            left:84%;
            text-decoration: none;
            color: white;
            font-size: 15px;
            font-weight: bold;
        }
        table, th, tr{
            text-align: center;
        }
        table th{
            background-color: black;
            color:white;
        }
        .topbox
        {
            position: absolute;
            top: 0%;
            left: 0%;
            height: 13%;
            width: 100%;
            background-color: black;
            border-bottom:1px solid black;
        }
        .searchBar
        {
            position: relative;
            height: 30px;
            width: 350px;
            margin-left: 20%;
            color: black;
            top: -40%;
        }
        .searchbtn
        {
            position:absolute;
            height: 30px;
            width: 40px;
            margin-left: 1%;
            top: 35%;
        }
        .searchimg
        {
            height: 25px;
            width: 25px;
        }
        .logo
        {
            height: 100%;
            width: 12%;
        }
        .cartImg
        {
            margin-top: 1.5%;
            margin-left: -2%;
        }
        .link
        {
            position:absolute;
            margin-top:2.5%;
            margin-left:30%;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
        td
        {
            width:178px;
        }
        .forSaleBooks
        {
            background-color:white;
        }
        .adding
        {
            position:absolute;
            top:15%;
            height: 50px;
            width:99%;
        }
        .addBookButton
        {
            background:white;
            margin-left: 80%;
            width: 90px;
            height:30px;
        }
        .viewOrdersButton
        {
            background:white;
            width: 90px;
            height:30px;
        }
        .addBook, .viewOrders
        {
            text-decoration: none;
            color: black;
        }
        .delete
        {
            color: red;
        }
        .update
        {
            text-decoration: none;
        }
    </style>
</head>
<body style="color:black;">
<form method="GET">
    <div class="topbox">
        <img class="logo" src="logo.png"></img>
        <input type="text" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" class="searchBar" name="search"placeholder="Search Data">
        <button type="submit" class="searchbtn"><img src="search.png" class="searchimg"></button>
        <a class="link" href="defaultPage.php">Log out</a>
    </div>
    </form>
    <table class="books">
    </table>
    <br><br><br><br><br><br>

<?php
include 'dbconnection.php';
?>

<div class="adding">
<button class="addBookButton"><a class="addBook" href="adminUpload.html">Add Book</a></button>
<button class="viewOrdersButton"><a class="viewOrders" href="pendingOrders.php">View Orders</a></button>
</div><br>

<div class="forSaleBooks">
    <center>
<table class="table">
<tr></tr>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">BOOK COVER</th>
      <th scope="col">BOOK NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">GENRE</th>
      <th scope="col">AUTHOR</th>
    </tr>
    
    <?php
        $query = "SELECT * FROM upload";
        $result = mysqli_query($conn, $query);
        if (isset($_GET['search'])) {
            # code...
            $filtervalue = $_GET['search'];
            $query = "SELECT * from upload where concat(bookCover,bookName,price,author,genre) like '%$filtervalue%'";
            $search = mysqli_query($conn, $query);
        if($search->num_rows > 0){
            ?>      
            <a class="toHomepage" href="Ahomepage.php">Home</a>
            <?php
            # code...
            while ($row = mysqli_fetch_assoc($search)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $genre = $row['genre'];
                $author = $row['author'];
    ?>
         <tr>
             <th scope="row"><?php echo $id ?></th>
             <td><?php echo $imageURL?></td>
             <td><?php echo $bookName ?></td>
             <td><?php echo $price ?></td>
             <td><?php echo $genre ?></td>
             <td><?php echo $author ?></td>
		<td>
             <a class="update" href="updateBook.php?id=<?php echo $id; ?>" style="text-decoration:none" class="text-light">Update</a>
            </td>
             <td>
                 <a class="delete" href="adminDelete.php?id=<?php echo $id; ?>"onclick="return confirm('Are you sure you want to delete?')">Delete</a>
             </td>
         </tr> 
     <?php
           }
    }
        else{
?>
            <p>No Record/s Found.</p>
<?php
        }
    }
       else if($result->num_rows > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $genre = $row['genre'];
                $author = $row['author'];
    ?>
         <tr>
             <th scope="row"><?php echo $id ?></th>
             <td><?php echo $imageURL?></td>
             <td><?php echo $bookName ?></td>
             <td><?php echo $price ?></td>
             <td><?php echo $genre ?></td>
             <td><?php echo $author ?></td>
		<td>
             <a class="update" href="updateBook.php?id=<?php echo $id; ?>" style="text-decoration:none" class="text-light">Update</a>
            </td>
             <td>
                 <a class="delete" href="adminDelete.php?id=<?php echo $id; ?>"onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
        
</table></center>
        </div>
</body>
</html>
<!--    $query = $conn->query("SELECT * FROM images");
 if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php //echo $imageURL; ?>" alt="" / width="100px" height="100px">
<?php 
// }
// }else{ 
    ?>
    <p>No image(s) found...</p>
<?php 
// } 
?> -->
