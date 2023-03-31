<?php
include 'dbconnection.php';

if(isset($_POST['email'])){
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
	<link rel="stylesheet" type="text/css" href="User.css">
</head>

<body>
	<div>
		<form>
			<input type="submit" class="info" value=" i " onclick="alert('MGA INFORMATION NG SYSTEM NATEN')">
		</form>
	</div>
	<p class="a"><b>Bibliophile</b> </p>
	<div class="center">
		<h1> Log in </h1>
		<form action="#" method="post">
			<h2> Email </h2>
			<input type="text" id="email" name="email" class="email" placeholder="Email Address"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
			<h2> Password </h2>
			<input type="password" id="password" name="password" class="pass" placeholder="Password" required>
			<button class="login" name="submit" onclick="message()">LogIn</button>
		</form>
            <form action="create.php">
                <input type="submit" class="signup2" value="Sign Up">
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
		header('location:homepage.php')
    }
}
</script>
</body>

</html>
