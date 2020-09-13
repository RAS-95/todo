<?php
$hostname= "localhost";
$username ="root";
$password ="";
$db_name ="todoapp";

$connection = mysqli_connect($hostname,$username,$password,$db_name);
if(!$connection){

    die( "Error in connection<br>".mysqli_error($connection));

}
?>