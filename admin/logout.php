<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page1">
<div id="header">
<h1>Has cerrado sesión correctamente</h1>
<p align="center">&nbsp;</p>
</div>
<?
session_start();
session_destroy();
?>
Se ha desconectado correctamente del acceso administrativo<br><br><br>
Volver a <a href="index.php">acceder</a>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>