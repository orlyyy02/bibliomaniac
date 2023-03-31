<?php
    // Include the database configuration file
    include 'dbconnection.php';

    // Get images from the database
    $query = "SELECT * FROM upload";
    $result = mysqli_query($conn, $query);
    if($result->num_rows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $imageURL = 'uploads/'.$row["bookCover"];
            $bookName = $row['bookName'];
        }
    }
?>
<html>
	<head>
		<title>
		Dahlia Divin Givency
		</title>
		<link rel="stylesheet" type="text/css" href="Uhomepage2.css">
		<script src="dahlia.js"></script>
	</head>
	<body>
	<div class="regbox">
	<p><b>Essences for Life</b></p></div>
	<div class="perfume">
	<img class="book" src="<?php echo $imageURL; ?>" alt="" />
	</div>
	<div class="desc">
	<h1>Dahlia Divin Givency</h1>
	<p><i>Amber Floral Fragrance for women. Sweet and fruity, smells like berry-apricot jam.</i></p>
	</div>
	<div class="form">
	<h2> Customer Details </h2>
		<form>
			</br><p> Name </p>
			<input type="text" name="" placeholder="">
			<p> Address </p>
			<input type="text" name="" placeholder="">
			<p> Mobile Number </p>
			<input type="number" name="" placeholder="">
			<p> Price </p>
			<input type="number" name="" placeholder="1999" disabled>
			<p> Payment </p>
			<input type="number" id="payment">
			<p> Change </p>
			<input type="number" id="change" >
			<input type="submit" name="" Value="Order Now" onclick="myfunction()">
		</form>
	</div>
	</body>
</html>