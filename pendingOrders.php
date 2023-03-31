<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
        .searchBar
        {
            position: relative;
            height: 25px;
            width: 350px;
            margin-left: 22%;
            color: black;
        }
        .searchbtn
        {
            height: 30px;
            width: 40px;
            margin-left: 1%;
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
        td{
            width:200px;
            text-align: center;
        }
        h1
        {
            margin-top:8%;
            color:white;
        }
        table
        {
            margin-top:2%;
            background-color: white;
            color:black;
        }
        th
        {
        background-color: black;
            color:white;
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
</head>
<body>
<div class="topbox">
<form method="GET"> 
        <img class="logo" src="logo.png"></img>
        <a class="link" href="AHomepage.php">Home</a>
        <input type="text" style="position: absolute;
        top:35%; 
        left:10%;" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" class="searchBar" name="search"placeholder="Search Data">
        <button type="submit" style="position: absolute;
        top:35%; 
        left:60%;"  class="searchbtn"><img src="search.png" class="searchimg"></button>
    </div>
    <h1>Pending orders</h1>
    </form>
<table class="table">
<tr></tr>

    <tr>
      <th>#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Placed at</th>
    </tr>
    
    <?php
        $sql = "select * from orders";
        $result = mysqli_query($conn, $sql);
        if (isset($_GET['search'])) {
            $filtervalue = $_GET['search'];
            ?>
            <form method="get" action="printreport.php">
            <button class="btn btn-success text-light" name="submit">Print Report</button>
            <?php
            $query = "SELECT * from orders where concat( name,quantity,totalPrice,address,phoneNum,placed_at) like '%$filtervalue%'";
            $search = mysqli_query($conn, $query);
        if($search->num_rows > 0){
            ?>
            
        <?php
            while ($row = mysqli_fetch_assoc($search)) {
                
                    $id = $row['id'];
                    $name = $row['name'];
                    $quantity = $row['quantity'];
                    $totalPrice = $row['totalPrice'];
                    $address = $row['address'];
                    $phoneNum = $row['phoneNum'];
                    $placed_at = $row['placed_at'];
        ?>
             <tr>
                <td><input type="checkbox" name="ids[]" value="<?=$row['id'] ?>"></td>
                 <th><?php echo $id ?></th>
                 <td><?php echo $name?></td>
                 <td><?php echo $quantity ?></td>
                 <td><?php echo $totalPrice ?></td>
                 <td><?php echo $address ?></td>
                 <td><?php echo $phoneNum ?></td>
                 <td><?php echo $placed_at ?></td>
             </tr> 
             </form>
     <?php
           }
    }
        else{
?>
            <p>No Record/s Found.</p>
            
<?php
        }
    }
       else if($result -> num_rows > 0){
        ?>
        <form action="printreport.php" method="post" >
        <button class="btn btn-success text-light" name="submit">Print Report</button>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $quantity = $row['quantity'];
                $totalPrice = $row['totalPrice'];
                $address = $row['address'];
                $phoneNum = $row['phoneNum'];
                $placed_at = $row['placed_at'];
    ?>
         <tr>
            <td><input type="checkbox" name="ids[]" value="<?=$row['id'] ?>"></td>
             <th><?php echo $id ?></th>
             <td><?php echo $name?></td>
             <td><?php echo $quantity ?></td>
             <td><?php echo $totalPrice ?></td>
             <td><?php echo $address ?></td>
             <td><?php echo $phoneNum ?></td>
             <td><?php echo $placed_at ?></td>
         </tr> 
         
     <?php
           }
        }
        else{
            die(mysqli_error($conn));
        }
    ?>
    </form>
    </body>
    </html>