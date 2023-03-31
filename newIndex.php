<?php
include_once("config.php");
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$status=0;
$activationcode=md5($email.time());
$query=mysqli_query($con,"insert into userregistration(name,email,password,activationcode,status) values('$name','$email','$password','$activationcode','$status')");
 if($query)
 {
$to=$email;
$msg= "Thank you for new Registration.";
$subject="Email verification";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:PHPBibliomaniac <info@phpbibliomaniac.com>'."\r\n";
$ms.="<html></body><div><div>Dear $name,</div></br></br>";
$ms.="<div style='padding-top:8px;'>Please click The following link for verifying and activation of your account</div>
<div style='padding-top:10px;'><a href='http://www.phpbibliomaniac.com/demos/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>
<div style='padding-top:4px;'>Powered by <a href='phpbibliomaniac.com'>phpbibliomaniac.com</a></div></div>
</body></html>";
mail($to,$subject,$ms,$headers);
echo "<script>alert('Registration successful!');</script>";
echo "<script>window.location = 'login.php';</script>";;
}
else
{
echo "<script>alert('Data not inserted');</script>";
}
}
?>

<form name="insert" action="" method="post">
<table width="100%"  border="0">
<tr>
<th height="62" scope="row">Name </th>
<td width="71%"><input type="text" name="name" id="name" value=""  class="form-control" required /></td>
</tr>
<tr>
<th height="62" scope="row">Email </th>
<td width="71%"><input type="email" name="email" id="email" value=""  class="form-control" required /></td>
</tr>
<tr>
<th height="62" scope="row">Password </th>
<td width="71%"><input type="password" name="password" id="password" value=""  class="form-control" required /></td>
</tr>
<tr>
<th height="62" scope="row"></th>
<td width="71%"><input type="submit" name="submit" value="Submit" class="btn-group-sm" /> </td>
</tr>
</table>
</form>