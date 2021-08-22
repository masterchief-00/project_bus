<?php
 if(isset($_POST['submit']))
 {
     include_once 'dbconnector.php';
     $busNo=mysqli_real_escape_string($conn,$_POST['busNo']);

     if(empty($busNo))
     {
         header("Location:../services.php?error=empty");
         exit();
     }
     else
     {
         $sql="SELECT* FROM buses WHERE busNo='$busNo';";
         $result=mysqli_query($conn,$sql);
         if(mysqli_num_rows($result)<1)
         {
             header("Location:../services.php?error=invalidNo");
             exit();
         }
         else
         {
             if($row=mysqli_fetch_assoc($result))
             {
                $names=substr($row['d_fname'],0,1).". ".$row['d_lname'];
                $BusNo=$row['busNo'];
                $seatsNow=$row['seats'];
                $plateNo=$row['plackNo'];
                $line=$row['line'];
                
                header("Location:../services.php?error=success&names=$names&busNo=$BusNo&plateNo=$plateNo&seats=$seatsNow&line=$line&loadBus=bus");
                exit();
             }
         }
     }
 }
 else
 {
     header("Location:../services.php");
     exit();
 }
?>