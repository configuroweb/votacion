<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysqli_query($con,"SELECT * FROM tbCandidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM tbPositions");
/*
$row = mysqli_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
 */
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" );

// redirect back to candidates
 header("Location: candidates.php");
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
 $result = mysqli_query($con, "DELETE FROM tbCandidates WHERE candidate_id='$id'");
 
 // redirect back to candidates
 header("Location: candidates.php");
 }
 else
 // do nothing   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Candidates</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<center><b><font size="10">Sistema de Votación Eletrónica</font></b></center>
<div id="page">
<div id="header">
  <h1>Gestionar Candidatos</h1>
  <a href="admin.php">Inicio</a> | <a href="positions.php">Gestionar Posiciones</a> | <a href="candidates.php">Gestionar Candidatos</a> | <a href="refresh.php">Validar Resultados</a> | <a href="manage-admins.php">Gestionar Cuentas</a> | <a href="change-pass.php">Cambiar Contraseña</a>  | <a href="logout.php">Cerrar Sesión</a>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>Agregar Nuevo Candidato</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td>Nombre de Candidato</td>
    <td><input type="text" name="name" /></td>
</tr>
<tr>
    <td>Posición de Candidato</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT NAME="position" id="position">Selecciona
    <OPTION VALUE="select">selecciona
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Agregar" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>Candidatos Disponibles</h3></CAPTION>
<tr>
<th>ID de Candidato</th>
<th>Nombre de Candidato</th>
<th>Posición de Candidato</th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Eliminar Candidato</a></td>';
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