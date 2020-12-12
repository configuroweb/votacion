<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">

<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
<h1>Panel de Estudiante </h1>
<a href="student.php">Inicio</a> | <a href="vote.php">Votar</a> | <a href="manage-profile.php">Mi perfil</a> | <a href="changepass.php">Cambiar Contraseña</a>| <a href="logout.php">Cerrar Sesión</a>
</div>
<div id="container">
<p>Haz clic en los enlaces de arriba para elegir las diferentes opciones</p>
</div>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>