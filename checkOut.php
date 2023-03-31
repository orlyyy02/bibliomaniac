<?php
include 'dbconnection.php';
session_start();
?>
<html>
    <head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

    *
    {
        font-family: 'Titillium Web', sans-serif;
    }
    .shop
    {
        position: absolute;
        top:1%;
        left:90%;
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
        .logo
        {
            height: 100%;
            width: 12%;
        }
        .fillout
        {
            margin-top:5%;
        }
        .link
        {
            position:absolute;
            margin-top:2.5%;
            margin-left:72%;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
        .placing
        {
            background-color: white;
            color:black;
            margin-top: 20%;
        }
        .checkoutTable
        {
            background-color:white;
            color:black;
        }
        p
        {
            color: white;
            font-size: 25px;
            font-weight:bold;
            text-shadow: 5px 1px 5px #000000;
        }
    </style>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="topbox">
        <img class="logo" src="logo.png"></img>
        <a class="link" href="order.php">Home</a>
    </div>
<form method="post">
    </div>
            <div style="clear: both"></div>
            <h3 class="title2">Place Order</h3>
            <div class="fillout table-responsive">
            <center>
            <tr>
                <td><input type="text" name="name" id="name" placeholder="Name" required style="width:500px;"><br></td>
            </tr>
            <tr>
                <td><input type="text" name="address" id="address" placeholder="Address" required style="width:500px;"><br></td>
            </tr>
            <tr>
                <td><input type="number" name="phoneNumber" id="phoneNumber" placeholder="Mobile Number" required style="width:500px;"><br></td>
            </tr>
            <p>- - - - - - - - - - Cash on Delivery - - - - - - - - - -</p>
    </center>
            </div>
            <div class="table-responsive">
                <table class="checkoutTable table-bordered">
                <tr>
                <br><th style="text-align:center" width="30%">Product Name</th>
                    <th style="text-align:center" width="10%">Quantity</th>
                    <th style="text-align:center" width="13%">Price Details</th>
                    <th style="text-align:center" width="15%">Price</th>
                </tr>
<?php   
if(isset($_POST['place'])){
    $name = $_POST['name'];
    $quantity = $_POST['ttlQuantity'];
    $totalPrice = $_POST['ttlPrice'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];

    $query = "insert into orders (name, quantity, totalPrice, address, phoneNum ) values ('$name','$quantity', '$totalPrice', '$address', '$phoneNumber')";
    //insert into tablename (columnName, columnName) values ('$_POST['name']', '$password');

    $resultquery = mysqli_query($conn, $query);
    
    if(!$resultquery){
        die(mysqli_error($conn));
    }
    else{
            header('location:cart.php');
    }
}
    if(!empty($_SESSION["cart"])){
        $total = 0;
        $totalQuantity = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            ?>
            <tr>
                <td style="text-align:center"><?php echo $value["bookName"]; ?></td>
                <td style="text-align:center"><?php echo $value["item_quantity"]; ?></td>
                <td style="text-align:center">₱ <?php echo $value["price"]; ?></td>
                <td style="text-align:center">₱ <?php echo number_format($value["item_quantity"] * $value["price"], 2); ?>

                <input type="hidden" name="bookName" value="<?php echo $row["bookName"]; ?>">
                <input type="hidden" name="quantity" value='<?php echo $value["item_quantity"]; ?>'>
            </td>
            </tr>
            <?php
            $total = $total + ($value["item_quantity"] * $value["price"]);
            $totalQuantity = $totalQuantity + $value["item_quantity"];
            ?>
            <input type="hidden" name="ttlPrice" value='<?php echo number_format($total); ?>'>
            <center><input type="hidden" name="ttlQuantity" value='<?php echo ($totalQuantity); ?>'></center>
            <?php
        }
            ?>
            <tr>
                <td></td>
                <th style="background:none; text-align:center;">Total Quantity:   <?php echo ($totalQuantity); ?></th><td>
                <th style="background:none; text-align:center;">Total Price:   ₱<?php echo number_format($total, 2); ?></th>
            </tr>
            <div class="shop">
            <input type="submit" name="place" class="placing btn" value="Place Order" onclick="alert('Ordered Successfully! Items will be delivered after 3-4 working days. Thank you!')">
        </form>
    </div>
            <?php
        }
    ?>
</body>
</html>