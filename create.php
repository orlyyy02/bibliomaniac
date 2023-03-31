<?php
include 'dbconnection.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = $_POST['pass'];

    $query = "insert into crud (name, email, password ) values ('$name','$email', '$password')";
    //insert into tablename (columnName, columnName) values ('$_POST['name']', '$password');

    $resultquery = mysqli_query($conn, $query);
    // if($resultquery){
    //     echo "Data Successfully saved!";
    // }
    // else{
    //     die(mysqli_error($conn));
    // }
    if(!$resultquery){
        die(mysqli_error($conn));
    }
    else{
        if($pass==$password){
            header('location:login.php');
        }
        else{
            header('location:create.php');
        }
    }
    //header('location:retrieve.php');
}
?>
<!doctype html>
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="User.css">
  </head>
  <body>
  <div>
        <form>
            <input type="submit" value=" i " class="info" onclick="alert('MGA INFORMATION NG SYSTEM NATEN')">
        </form>
    </div>
    <p class="b"><b>Bibliophile</b> </p>
    <div class="center1">
        <h1>Sign Up</h1>
        <form method="POST" name="submit" id="submit">
            <h2> Name </h2>
            <input type="text" id="name" name="name" class="name" placeholder="Name" required>
            <h2> Email </h2>
            <input type="email" id="email" name="email" class="email2" placeholder="Email Address"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <h2> Password </h2>
            <input type="password" id="pass" name="pass" class="pass2" placeholder="Password" required>
            <h2> Confirm Password </h2>
            <input type="password" id="password" name="password" class="confirmPass" placeholder="Confirm Password" required>
            <p><input type="checkbox" required> I agree to the terms and conditions.</p><br>
            <button class="signUp" name="submit" onclick="signupMessage()">Sign Up</button>
        </form>
    </div>
    <script>
    function signupMessage(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var password = document.getElementById('password').value;
    var payment = document.getElementById('payment').value;

    if(name == '' || email == '' || pass == '' || password == '' || payment == ''){
        alert("Please fill up the fields");
    }
    else{
        if(pass!=password){
            alert("Password don't match");
            header('location:create.php');
        }
        else{
        header('location:login.php');
        }
    }
}</script>
    </body>
</html>