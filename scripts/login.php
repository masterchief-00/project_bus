<?php
session_start();

if(isset($_POST['submit']))
{
    include_once 'dbconnector.php';

    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
    $mysqlTime = date('Y-m-d H:i:s', time());
    $admin=false;
    
    if(isset($_POST['checkAdmin']))
    {
       $admin=true;
    }
     
    if(empty($email) || empty($pwd))
    {
        header("Location:../index.php?error=empty");
        exit();
    }
    else
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            header("Location:../index.php?error=email");
            exit();
        }
        else
        {
            if ($admin==false) 
            {
                $sql = "SELECT* FROM clients WHERE email='$email';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck < 1) 
                {
                    header("Location:../index.php?error=emailNot");
                    exit();
                } 
                elseif ($resultCheck > 0) 
                {
                    if ($row = mysqli_fetch_assoc($result)) 
                    {
                        $pwdCheck = password_verify($pwd, $row['pwd']);
                        if ($pwdCheck == false) 
                        {
                            header("Location:../index.php?error=pwd");
                            exit();
                        } 
                        else 
                        {
                            $_SESSION['uid'] = $row['fname'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['umail']=$row['email'];
                            $_SESSION['user_id']=$row['id'];
                            $_SESSION['logged']=true;
                            $sql="UPDATE clients SET u_status='online' WHERE fname='".$row['fname']."';";
                            mysqli_query($conn,$sql);
                            
                            $userID= $_SESSION['user_id'];
                            $desc="Logged in as user ". $_SESSION['uid']." ". $_SESSION['lname'];
                            $sql="INSERT INTO log(user_id,description,time) VALUES('$userID','$desc','$mysqlTime');";
                            mysqli_query($conn, $sql);

                            header("Location:../index.php?error=success");
                            exit();
                        }
                    }
                } 
            }
            elseif($admin==true)
            {
                $sql = "SELECT* FROM admins WHERE email='$email';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck < 1) 
                {
                    header("Location:../index.php?error=emailNot");
                    exit();
                } 
                elseif ($resultCheck > 0) 
                {
                    if ($row = mysqli_fetch_assoc($result)) 
                    {
                        $pwdCheck = password_verify($pwd, $row['pwd']);
                        if ($pwdCheck == false) 
                        {
                            header("Location:../index.php?error=pwd");
                            exit();
                        } 
                        else 
                        {
                            $_SESSION['aid'] = $row['fname'];
                            $_SESSION['lname']=$row['lname'];
                            $_SESSION['admin_id'] = $row['id'];
                            $_SESSION['logged']=true;
                            header("Location:../index.php?error=success");
                            exit();
                        }
                    }
                }  
            }
        }
    }
}

?>