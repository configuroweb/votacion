<?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysqli_query($con, "SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($con,"UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE member_id = '$myId'" );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administración de Perfil de Estudiante</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">
     
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
  <h1>Gestionar mi Perfil</h1>
  <a href="student.php">Inicio</a> | <a href="vote.php">Votar</a> | <a href="manage-profile.php">Mi Perfil</a> | <a href="changepass.php">Cambiar Contraseña</a>| <a href="logout.php">Cerrar Sesión</a>
</div>
<div id="container">
<table border="0" width="620" align="center">
<CAPTION><h3>Actualiza tu Perfil</h3></CAPTION>
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>Nombre:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value="<?php echo $firstName; ?>"></td></tr>
<tr><td>Apellido:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value="<?php echo $lastName; ?>"></td></tr>
<tr><td>Correo:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value="<?php echo $email; ?>"></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Actualizar Perfil"></td></tr>
</table>
</form>
<hr>
</div>
<div id="footer"> 
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body>
</html>