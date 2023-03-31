<?php
include 'dbconnection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="select * from crud where email='".$email."' AND password='".$password."' limit 1 ";

    $result=mysqli_query($conn, $sql);

    if($result -> num_rows > 0){
        header('location:order.php');
    }
}
?>
<html>

<head>
	<title>User's Log In</title>
	<link rel="stylesheet" type="text/css" href="ALogin.css">
</head>

<body>
	<div>
		<form>
			<input type="submit" class="info" value=" i " onclick="alert('Bibliophile is a website where the customer can purchase books online. They can choose books that suits their personal interest and later can add to the shopping cart and finally purchase. The user can login using his account details or new customers can set up an account very quickly. They should give the details of their name, contact number, and shipping address.')">
		</form>
	</div>
	<p><b>Bibliophile</b> </p>
	<div class="log">
		<h1> Log in </h1>
		<form action="#" method="post">
			<h2> Email </h2>
			<input type="text" id="email" name="email" class="email" placeholder="Email Address"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
			<h2> Password </h2>
			<input type="password" id="password" name="password" class="pass" placeholder="Password" required>
			<button type="submit" class="login" name="login" onclick="message()">LogIn</button>
		</form>
	</div>
    <script>
    function message(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('pass').value;
    if(email == '' || password == ''){
        alert("Please fill up the fields");
    }
    else{
        alert('Successful LogIn!');
		header('location:order.php')
    }
}
</script>
</body>
</html>