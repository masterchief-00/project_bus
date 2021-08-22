<?php
session_start();

if(isset($_GET['id']) && isset($_SESSION['aid']))
{
   include_once 'dbconnector.php';
   $id= $_GET['id'];
   $sql="DELETE FROM clients WHERE email='$id';";
   mysqli_query($conn,$sql);
   header("Location:../admin-panel.php?error=success");
   exit();
}
elseif(isset($_POST['delete']))
{
    include_once 'dbconnector.php';
    $id = $_POST['delete'];
    $sql = "DELETE FROM clients WHERE id='$id';";
    mysqli_query($conn, $sql);

    session_unset();
    session_destroy();
    header("Location:../admin-panel.php?error=success");
    exit();
}
else
{
    header("Location:../index.php");
    exit();
}
?>