<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .books
        {
            border: 1px solid white;
        }
        .home{
            position: absolute;
            top:4.5%;
            left:83%;
            text-decoration: none;
            color: white;
            font-size: 15px;
            font-weight: bold;
        }
        .cartImg{
            position: absolute;
            top:1%;
            left:90%;
        }
        .product{
            border: 1px solid white;
            margin: -1px 18px 3px -1px;
            padding: 8px;
            text-align: center;
            width:185px;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
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
            height: 30px;
            width: 350px;
            margin-left: 20%;
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
        .cartImg
        {
            margin-top: 1.5%;
            margin-left: -2%;
        }
        .link
        {
            margin-left:28.5%;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
        .text-info, .text-danger
        {
            color:white;
        }
        .form-control
        {
            text-align:center;
            height: 25px;
            width: 160px;
        }
        h5{
            text-shadow: 2px 2px 5px #000000;
        }
    </style>
</head>
<body style=" background-image: url('FillUpBackground.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    color:white;
    margin-top:8%;">
    <form action="" method="GET">
    <div class="topbox">
        <img class="logo" src="logo.png"></img>
        <input type="text" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" name="search" class="searchBar" placeholder="Search Book">
        <button type="submit" class="searchbtn"><img src="search.png" class="searchimg"></button>
        <a class="link" href="defaultPage.php">Log out</a>
    </div>
    </form>
    <div class="cartImg">
    <button><a class="cart" href="cart.php"><img src="cart.png" height="20px"></a></button>
    </div>

    <?php
    include 'dbconnection.php';
    session_start();
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'bookName' => $_POST["hidden_name"],
                    'price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="order.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="order.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'bookName' => $_POST["hidden_name"],
                'price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
    
    $query = "SELECT * FROM upload";
    
        $result = mysqli_query($conn, $query);
        if (isset($_GET['search'])) {
            # code...
            $filtervalue = $_GET['search'];
            $query = "SELECT * from upload where concat(bookName,price,author,genre) like '%$filtervalue%'";
            $search = mysqli_query($conn, $query);
        if($search->num_rows > 0){
            ?>
        <div class="home">      
            <a href="order.php" style="float:left">Home</a>
        </div>
            <?php
            # code...
            ?>
    <?php
            while ($row = mysqli_fetch_assoc($search)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
?>

<div class="col-md-2" style="text-align:center;">
<form method="get">

        <img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px">
        <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
        <h5 class="text-info"><?php echo $row["author"]; ?></h5>
        <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
        <center><input type="number" name="quantity" class="form-control" value="1"></center>
        <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
        <input type="hidden" name="hidden_author" value="<?php echo $row["author"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
        value="Add to Cart">
    
</form>
</div>
            <?php
            
        }
    }

        else{
?>
            <p>No Record/s Found.</p>
            <?php
        }
    
        ?>
    <div class="container" style="width: 65%;">
        <?php
        }
            else if (mysqli_num_rows($result) > 0) {
                
                $query1 = "SELECT * from upload where concat(genre) like 'Comedy'";
                $comedy = mysqli_query($conn, $query1);
                $query2 = "SELECT * from upload where concat(genre) like 'Romance'";
                $romance = mysqli_query($conn, $query2);
                $query3 = "SELECT * from upload where concat(genre) like 'Horror'";
                $horror = mysqli_query($conn, $query3);
                $query4 = "SELECT * from upload where concat(genre) like 'Thriller'";
                $thriller = mysqli_query($conn, $query4);
                $query5 = "SELECT * from upload where concat(genre) like 'Self Help'";
                $selfHelp = mysqli_query($conn, $query5);
                $query6 = "SELECT * from upload where concat(genre) like 'Cookbook'";
                $cookbook = mysqli_query($conn, $query6);
                $query7 = "SELECT * from upload where concat(genre) like 'Fantasy'";
                $fantasy = mysqli_query($conn, $query7);

                while ($row = mysqli_fetch_array($comedy)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2" >
                    
                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" >
                            <td>Comedy</td>
                                <center><img class="books"  src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input class="shadow" type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input class="shadow" type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($romance)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Romance</td>
                                <center><img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"><center>
                                <input class="shadow" type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input class="shadow" type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($horror)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Horror</td>
                                <center><img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($thriller)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Thriller</td>
                                <center><img class="books" src="<?php echo $imageURL ?>"  width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($selfHelp)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Self Help</td>
                                <center><img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($cookbook)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Cookbook</td>
                                <center><img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                while ($row = mysqli_fetch_array($fantasy)) {
                    $imageURL = 'uploads/'.$row["bookCover"];

                    ?>
                    <div class="col-md-2">

                        <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                            <td>Fantasy</td>
                                <center><img class="books" src="<?php echo $imageURL ?>" width="160px" height="250px"></center>
                                <h5 class="text-info"><?php echo $row["bookName"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <center><input type="number" name="quantity" class="form-control" value="1"></center>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["bookName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px; background:black; color:white; border: 1px solid white;" class="btn btn-success"
                                value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                
            }
            else{ 
                ?>
                </table>
                    <p>No image(s) found...</p>
                <?php 
            } 
                ?>
</div>
        <!-- <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr> -->

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <!-- <tr>
                            <td><?php echo $value["bookName"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["price"], 2); ?></td>
                            <td><a href="order.php?action=delete&id=<?php echo $value["product_id"]; ?>" onclick="return confirm('Are you sure you want to delete?')"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr> -->
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["price"]);
                    }
                        ?>
                        <!-- <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right" style="background:none;">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr> -->
                        <?php
                    }
                    ?>
                
            </table>
        </div>
</body>
</html>