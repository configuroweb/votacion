<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
<h1>Panel de Control Administrativo</h1>
<a href="admin.php">Inicio</a> | <a href="positions.php">Gestionar Posiciones</a> | <a href="candidates.php">Gestionar Candidatos</a> | <a href="refresh.php">Validar Resultados</a> | <a href="manage-admins.php">Gestionar Cuentas</a> | <a href="change-pass.php">Cambiar Contraseña</a>  | <a href="logout.php">Cerrar Sesión</a>
</div>
<p align="center">&nbsp;</p>
<div id="container">

<p>Puedes hacer clic en los enlaces de arriba para realizar la gestiones administrativas correspondientes</p>


</div>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>