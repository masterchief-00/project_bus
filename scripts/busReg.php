<?php
  if(isset($_POST['submit']))
  {
    include_once 'dbconnector.php';

    $bus_no =mysqli_real_escape_string($conn, $_POST['bus_no']);
    $d_fname =mysqli_real_escape_string($conn, $_POST['d_fname']);
    $d_lname =mysqli_real_escape_string($conn, $_POST['d_lname']);
    $plack_no =mysqli_real_escape_string($conn, $_POST['plack_no']);
    $line =strtoupper(mysqli_real_escape_string($conn, $_POST['line']));
    $seats =mysqli_real_escape_string($conn, $_POST['seats']); 

    if (empty($bus_no) || empty($d_fname) || empty($d_lname) || empty($plack_no) || empty($seats) || empty($line)) 
    {
      header("Location:../services.php?error=empty");
      exit();
    } 
    else 
      {
         if(!preg_match("/^[0-9]{1,}$/",$bus_no))
         {
            header("Location:../services.php?error=busNo");
            exit();
         }
         else
         {
            if (!preg_match("/^[a-zA-Z]*$/", $d_fname) || !preg_match("/^[a-zA-Z]*$/", $d_lname)) 
            {
                header("Location:../services.php?error=name");
                exit();
            }
            else
            {
                if(!preg_match("/^[A-Z]{3}[0-9]{3}$/",$plack_no))
                {
                    header("Location:../services.php?error=plackNo");
                    exit();
                }
                else
                {
                    if(!preg_match("/^[0-9]*$/",$seats))
                    {
                        header("Location:../services.php?error=seats");
                        exit();
                    }
                    else
                    {
                        if(!preg_match("/^[A-Z]*[-]{1}[A-Z]*$/",$line))
                        {
                            header("Location:../services.php?error=line");
                            exit();
                        }
                        else
                        {
                            $sql = "SELECT* FROM buses WHERE busNo='$bus_no' OR plackNo='$plack_no';";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) 
                            {
                                header("Location:../services.php?error=duplicate");
                                exit();
                            } 
                            else 
                            {
                                $sql = "INSERT INTO buses(busNo,d_fname,d_lname,plackNo,seats,line) VALUES('$bus_no','$d_fname','$d_lname','$plack_no','$seats','$line');";
                                mysqli_query($conn, $sql);
                                header("Location:../services.php?error=success");
                                exit();
                            }
                        }
                    }
                }
            }
         }
      }
  }
  else
  {
  header("Location:../services.php");
  exit();
  }
