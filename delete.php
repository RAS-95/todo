<?php 
    include('config.php');
    if(isset($_GET['id']))
    {
        $id=  $_GET['id'];
        mysqli_query($connection, "DELETE FROM todo WHERE id=$id");
        header("location: http://localhost/todo/view.php");
    }
    
?>