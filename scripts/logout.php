<?php
session_start();
if(isset($_GET['submit']))
{
    include_once 'dbconnector.php';
    $mysqlTime = date('Y-m-d H:i:s', time());

    $userID = $_SESSION['user_id'];
    $desc = "Logged out as user " . $_SESSION['uid'] . " " . $_SESSION['lname'];
    $sql = "INSERT INTO log(user_id,description,time) VALUES('$userID','$desc','$mysqlTime');";
    mysqli_query($conn, $sql);

    if (isset($_SESSION['umail'])) 
    {
        $email=$_SESSION['umail'];
        $sql = "UPDATE clients SET u_status='offline' WHERE email='$email';";
        mysqli_query($conn, $sql);
    }
    session_unset();
    session_destroy();
    header("Location:../index.php?error=success");
    exit();
}
else
{
    header("Location:../index.php");
    exit();
}

?>