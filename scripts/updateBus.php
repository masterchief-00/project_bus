<?php
session_start();

if (isset($_POST['submit']) && isset($_SESSION['aid'])) 
{
    include_once 'dbconnector.php';
    $busNo = mysqli_real_escape_string($conn, $_POST['busNo']);
    $plateNo = mysqli_real_escape_string($conn, $_POST['plateNo']);
    $seats = mysqli_real_escape_string($conn, $_POST['seats']);
    $d_fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $d_lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $oldBusNo=mysqli_real_escape_string($conn, $_POST['oldBusNo']);


    if (empty($busNo) || empty($plateNo) || empty($seats) || empty($d_fname) || empty($d_lname)) 
    {
        header("Location:../admin-panel.php?error=empty");
        exit();
    }
    $sql = "UPDATE buses SET busNo='$busNo',plackNo='$plateNo',seats='$seats',d_fname='$d_fname',d_lname='$d_lname'  WHERE busNo='$oldBusNo';";
    mysqli_query($conn, $sql);
    header("Location:../admin-panel.php?error=success");
    exit();
} 
else 
{
    header("Location:../index.php");
    exit();
}
