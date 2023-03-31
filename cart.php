<?php
    include 'dbconnection.php';
    session_start();
?>
<html>
    <head>
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
        .shop
        {
            position: absolute;
            top:1%;
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
        .tableDiv
        {
            position: absolute;
            top: 30%;
            left: 0%;
        }
        .shopping{
            position: fixed;
            top: 15%;
            left: 1%;
            color: white;
            font-size:33px;
        }
        .table
        {
            background-color: white;
            color: black;
        }
        .checkOut
        {
            margin-left: 82%;
            width: 180px;
            height:30px;
        }
        table
        {
            text-align:center;
        }
        .tableDiv
        {
            width:100%;
        }
        .shopMorebtn
        {
            background:white;
            margin-left: 585%;
            margin-top: 10%;
            width: 180px;
            height:30px;
        }
        .shopMore
        {
            text-decoration: none;
            color: black;
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
    </div>
<?php
    ?>
    <div class="tableDiv">
            <div style="clear: both"></div>
            <p class="shopping">Shopping Cart Details</p>
            <div class="table-responsive">
                <center>
                <table class="table table-bordered">
                <tr>
                    <th style="text-align:center" width="30%">Product Name</th>
                    <th style="text-align:center" width="10%">Quantity</th>
                    <th style="text-align:center" width="13%">Price Details</th>
                    <th style="text-align:center" width="10%">Total Price</th>
                    <th style="text-align:center" width="17%">Remove Item</th>
                </tr>
<?php   
if(isset($_POST['order'])){
    header('location:checkOut.php');
}
    if(!empty($_SESSION["cart"])){
        $total = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            ?>
            <tr>
            <form method="POST" action="checkOut.php">
                <td><?php echo $value["bookName"]; ?></td>
                <td><?php echo $value["item_quantity"]; ?></td>
                <td>₱ <?php echo $value["price"]; ?></td>
                <td>
                ₱ <?php echo number_format($value["item_quantity"] * $value["price"], 2); ?></td>
                <td><a href="order.php?action=delete&id=<?php echo $value["product_id"]; ?>" onclick="return confirm('Are you sure you want to delete?')"><span
                            class="text-danger">Remove Item</span></a></td>

            </tr>
            <?php
            $total = $total + ($value["item_quantity"] * $value["price"]);
        }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <th style="text-align:center; background:none;">₱<?php echo number_format($total, 2); ?></th>
                <td></td>
            </tr>
    </table>
    </center>
            <input type="submit" name="order" style="background-color:white; color:black; margin-top: 5px;" class="checkOut btn btn-success"
        value="Check Out">
        </form>
    </div>
    </div>
            <div class="shop">
    <button class="shopMorebtn"><a class="shopMore" href="order.php">Shop More</a></button>
    </div>
    </div>
            <?php
        }
    ?>
</body>
</html>