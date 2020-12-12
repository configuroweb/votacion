<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Votación Eletrónica Accesso Denegado</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<body>
<div id="page">
<div id="header">
<h1>Credenciales de Acceso inválidas</h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('connection.php');


// Defining your login details into variables
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);

$sql=mysqli_query($con, "SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'");

// Checking table row
$count=mysqli_num_rows($sql);
// If username and password is a match, the count will be 1

if($count==1){
// If everything checks out, you will now be forwarded to student.php
$user = mysqli_fetch_assoc($sql);
$_SESSION['member_id'] = $user['member_id'];
header("location:student.php");
}
//If the username or password is wrong, you will receive this message below.
else {
echo "Usuario o contraseña incorrectos<br><br>Volver a <a href=\"index.php\">página de acceso</a>";
}

ob_end_flush();

?> 
</div>
<div id="footer"> 
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body>
</html>