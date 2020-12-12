<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="#e6e6e6";>

<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
<h1>Ingreso de Estudiantes</h1>
<div class="news"><marquee behavior="alternate">Sistema de Votación Electrónico Avanzado</marquee></div>
</div>
<div id="container">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="black">
<tr>
<form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="black">
<tr>
<td width="78">Correo Electrónico</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Contraseña</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Ingresar"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<center>
<br>Si aún no te has registrado <a href="registeracc.php"><b>ingresa aquí</b></a>
</center>
</div>
<div id="footer">
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body></html>