<?php
session_start();

if(isset($_POST['submit']))
{
    include_once 'dbconnector.php';
    
    $fname=$_SESSION['uid'];
    $lname=$_SESSION['lname'];
    $id=$_SESSION['user_id'];
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $desc=mysqli_real_escape_string($conn,$_POST['problem']);
    $mysqlTime = date('Y-m-d H:i:s', time());

    if(empty($title) || empty($desc))
    {
        header("Location:../services.php?error=empty");
        exit();
    }
    else
    {
        $mysqlTime=date('Y-m-d H:i:s', time());
        $sql="INSERT INTO support(user_id,fname,lname,title,prob,timeOfSubmit) VALUES('$id','$fname','$lname','$title','$desc','$mysqlTime');";
        mysqli_query($conn,$sql);
           
        $titleInfo="Query reported";
        $descInfo="Your query has been sent to the administrator and your will soon receive an answer.";
        $sql = "INSERT INTO notifications(title,description,user_id,timeOfsubmit) VALUES('$titleInfo','$descInfo','$id','$mysqlTime')";
        mysqli_query($conn, $sql);

        $desc = "Successfully reported a query to the administrator.";
        $sql = "INSERT INTO log(user_id,description,time) VALUES('$id','$desc','$mysqlTime')";
        mysqli_query($conn, $sql);

        header("Location:../services.php?error=success");
        exit();
    }
}
else
{
    header("Location:../services.php");
    exit();
}
?>