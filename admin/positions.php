<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the tbpositions table
$result=mysqli_query($con, "SELECT * FROM tbPositions");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO tbpositions (position_name) VALUES ('$newPosition')");

// redirect back to positions
 header("Location: positions.php");
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($con, "DELETE FROM tbPositions WHERE position_id='$id'");
 
 // redirect back to positions
 header("Location: positions.php");
 }
 else
 // do nothing
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Positions</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
  <h1>Gestionar Posiciones</h1>
  <a href="admin.php">Inicio</a> | <a href="positions.php">Gestionar Posiciones</a> | <a href="candidates.php">Gestionar Candidatos</a> | <a href="refresh.php">Validar Resultados</a> | <a href="manage-admins.php">Gestionar Cuentas</a> | <a href="change-pass.php">Cambiar Contraseña</a>  | <a href="logout.php">Cerrar Sesión</a>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>Agregar una nueva posición</h3></CAPTION>
<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
<tr>
    <td>Nombre de Posición</td>
    <td><input type="text" name="position" /></td>
    <td><input type="submit" name="Submit" value="Agregar" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>Posiciones Disponibles</h3></CAPTION>
<tr>
<th>ID Posición</th>
<th>Nombre de Posición</th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" .$inc."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Eliminar Posición</a></td>';
echo "</tr>";
$inc++;
}

mysqli_free_result($result);
mysqli_close($con);
?>
</table>
<hr>
</div>
<div id="footer"> 
<div class="bottom_addr">Para más desarrollos accede a <a href="https://www.configuroweb.com/">ConfiguroWeb</a></div>
</div>
</div>
</body>
</html>