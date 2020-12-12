<?php
session_start();
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">  
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page1">
<div id="header">
<h1>Cierre de Sesión Exitoso</h1>
<p align="center">&nbsp;</p>
</div>
<?php
session_destroy();
?>
<p>Has cerrado sesión exitósamente.</p><br><br><br>
Volver a <a href="index.php">Acceder</a>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>         