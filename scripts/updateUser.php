<?php
session_start();
$id=$_POST['submit'];
if(isset($_POST['submit']) && isset($_SESSION['aid']))
{
   include_once 'dbconnector.php';
   $fname= mysqli_real_escape_string($conn,$_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $id=$_POST['submit'];

   if(empty($fname) || empty($lname) || empty($email) || empty($phone))
   {
        header("Location:../admin-panel.php?error=empty");
        exit();
   }
   else
   {
      $sql="UPDATE clients SET fname='$fname',lname='$lname',email='$email',telNo='$phone'  WHERE id='$id';";
      mysqli_query($conn,$sql);
      header("Location:../admin-panel.php?error=success");
      exit();
   }
}
elseif(isset($_POST['submit']) && isset($_SESSION['uid']))
{
    include_once 'dbconnector.php';
    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pwdOld = mysqli_real_escape_string($conn, $_POST['oldPwd']);
    $pwdNew = mysqli_real_escape_string($conn, $_POST['newPwd']);
    $id=$_POST['submit'];

    if(empty($fname) || empty($lname) || empty($email) || empty($phone))
    {
         header("Location:../index.php?error=empty");
         exit();
    }
    else
    {
        if(!empty($pwdOld) && !empty($pwdNew))
        {
           $sql="SELECT* FROM clients WHERE id='$id';";
           $result=mysqli_query($conn,$sql);
           if(mysqli_num_rows($result)>0)
           {
               if($row=mysqli_fetch_assoc($result))
               {
                   if(password_verify($pwdOld,$row['pwd']))
                   {
                      $pwd_hash=password_hash($pwdNew,PASSWORD_DEFAULT);
                      $sql="UPDATE clients SET fname='$fname',lname='$lname',email='$email',telNo='$phone',pwd='$pwd_hash'  WHERE id='$id';";
                      mysqli_query($conn,$sql);
                      header("Location:../index.php?error=success");
                      exit();
                   }
                   else
                   {
                    header("Location:../index.php?error=pwdChange");
                    exit();
                   }
               }
           }
           else
           {
            header("Location:../index.php?error=fatal");
            exit();
           }
        }
        else
        {
            $sql="UPDATE clients SET fname='$fname',lname='$lname',email='$email',telNo='$phone'  WHERE id='$id';";
            mysqli_query($conn,$sql);
            header("Location:../index.php?error=success");
            exit();
        }
    }
    
}
else
{
    header("Location:../index.php");
    exit();
}
