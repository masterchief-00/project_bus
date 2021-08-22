<?php
session_start();

if(isset($_GET['id']) && isset($_SESSION['aid']))
{
   include_once 'dbconnector.php';
   $id= $_GET['id'];
   $sql="DELETE FROM buses WHERE busNo='$id';";
   mysqli_query($conn,$sql);
   header("Location:../admin-panel.php?error=success");
   exit();
}
else
{
    header("Location:../index.php");
    exit();
}
?>