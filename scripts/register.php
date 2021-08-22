<?php
  if(isset($_POST['submit']))
  {
    include_once 'dbconnector.php';
    
    $fname =mysqli_real_escape_string($conn, $_POST['fname']);
    $lname =mysqli_real_escape_string($conn, $_POST['lname']);
    $email =mysqli_real_escape_string($conn, $_POST['email']); 
    $phone =mysqli_real_escape_string($conn, $_POST['phone']); 
    $pwd =mysqli_real_escape_string($conn, $_POST['pwd']);
    $sex = $_POST['sex'];

    if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($pwd) || empty($sex)) 
    {
      header("Location:../index.php?error=empty");
      exit();
    } 
    else 
      {
        if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) 
        {
           header("Location:../index.php?error=name");
           exit();
        }
        else
        {
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
              header("Location:../index.php?error=email");
              exit();
            }
            else
            {
              if(!preg_match(("/^[0-9]{10,12}$/"),$phone))
              {
                 header("Location:../index.php?error=phone");
                 exit();
              }
              else
              {
                $sql="SELECT* FROM clients WHERE email='$email' OR telNo='$phone';";
                $result=mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck>0)
                {
                  header("Location:../index.php?error=duplicate");
                  exit();
                }
                else
                {
                  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                  $sql = "INSERT INTO clients(fname,lname,email,telNo,pwd,sex) VALUES('$fname','$lname','$email','$phone','$hashedPwd','$sex');";
                  mysqli_query($conn, $sql);
                  header("Location:../index.php?error=success");
                  exit();
                }
              }
            }
        }
      }
  }
  else
  {
  header("Location:../index.php");
  exit();
  }
     
?>