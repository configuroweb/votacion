<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
extract($_REQUEST);

require_once('connection.php');
$q="SELECT * FROM tbmembers WHERE email='$email'";
$result=mysqli_query($con,$q);
if(mysqli_num_rows($result)){
    echo"email already Registerd Please Try Another";
}else{
    echo"";
}
?>