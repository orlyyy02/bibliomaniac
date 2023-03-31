
<html>

<head>
	<title>Admin's Log In</title>
	<link rel="stylesheet" type="text/css" href="ALogin.css">

	<!-- <script>
		function message(){
		var email = document.getElementById('email').value;
		var password = document.getElementById('pass').value;
		if(email == 'admin@gmail.com' && password == 'admin123'){
			window.location.href("Ahomepage.php");
		}
		else{
			alert('Invalid email or password!');
		}
	}
	</script> -->
</head>

<body>
	<div>
		<form>
			<input type="submit" class="info" value=" i " onclick="alert('Bibliophile is a website where the customer can purchase books online. They can choose books that suits their personal interest and later can add to the shopping cart and finally purchase. The user can login using his account details or new customers can set up an account very quickly. They should give the details of their name, contact number, and shipping address.')">
		</form>
	</div>
	<p><b>Bibliophile</b> </p>
	<div class="log">
		<form action="Ahomepage.php">
		<h1> Log in </h1>
			<h2> Email </h2>
			<input type="text" id="email" name="email" class="email" placeholder="Email Address"
			pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
			<h2> Password </h2>
			<input type="password" id="password" name="password" class="pass" placeholder="Password" required>
			<button class="login" name="submit" onclick="message()">LogIn</button>
		</form>
	</div>
    
</body>
</html>