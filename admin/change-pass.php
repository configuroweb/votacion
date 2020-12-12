<?php
session_start();
require('../connection.php');
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
<h1>Cambiar Contraseña </h1>
<a href="admin.php">Inicio</a> | <a href="positions.php">Gestionar Posiciones</a> | <a href="candidates.php">Gestionar Candidatos</a> | <a href="refresh.php">Validar Resultados</a> | <a href="manage-admins.php">Gestionar Cuentas</a> | <a href="change-pass.php">Cambiar Contraseña</a>  | <a href="logout.php">Cerrar Sesión</a>
</div>
<div id="container">
<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $encPass = $row['password'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
    $myId = addslashes( $_GET['id']);
    $mypassword = md5($_POST['oldpass']);
    $newpass= $_POST['newpass'];
    $confpass= $_POST['confpass'];
    if($encPass==$mypassword)
    {
        if($newpass==$confpass)
        {
        $newpass = md5($newpass); //This will make your password encrypted into md5, a high security hash
        $sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'" );
        echo "<script>alert('Your password updated');</script>";
        }
        else
        {
            echo "<script>alert('Your new pass and confirm pass not match');</script>";
        }    
    }
    else
    {
        echo "<script>alert('Your old pass not match');</script>";
    }
    
}
?>
<table align="center">
<tr>
<td>
<form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>Cambiar Contraseña</h4></CAPTION>
<tr><td>Contraseña Anterior:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="oldpass" maxlength="15" value=""></td></tr>
<tr><td>Nueva Contraseña:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="newpass" maxlength="15" value=""></td></tr>
<tr><td>Confirmar Contraseña:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="confpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Actualizar Contraseña"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>