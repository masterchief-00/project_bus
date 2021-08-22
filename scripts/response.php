<?php
session_start();

if(isset($_POST['submit']))
{
    include_once 'dbconnector.php';
    $prob_id=$_POST['submit'];
    $user_id= $_SESSION['tmp_userid'];
    $response=mysqli_real_escape_string($conn,$_POST['response']);

    if(empty($response))
    {
        header("Location:../admin-panel.php?error=empty");
        exit();
    }
    else
    {
        $title="Response";
        $desc=$response;
        $mysqlTime = date('Y-m-d H:i:s', time());

        $sql="UPDATE support SET response='$response' WHERE id='$prob_id';";
        mysqli_query($conn,$sql);

        $sql="INSERT INTO notifications(title,description,user_id,timeOfsubmit) VALUES('$title','$desc','$user_id','$mysqlTime')";
        mysqli_query($conn,$sql);
        
        header("Location:../admin-panel.php?error=success");
        exit();
    }
}

?>