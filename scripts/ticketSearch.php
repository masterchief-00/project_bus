<?php
 if(isset($_POST['submit']))
 {
     include_once 'dbconnector.php';
     $ticketNo=mysqli_real_escape_string($conn,$_POST['ticketNo']);

     if(empty($ticketNo))
     {
         header("Location:../services.php?error=empty");
         exit();
     }
     else
     {
         $sql="SELECT* FROM tickets WHERE id='$ticketNo';";
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
                $names=substr($row['fname'],0,1).". ".$row['lname'];
                $BusNo=$row['busNo'];
                $deptime=$row['depart'];
                $line=$row['line'];
                
                header("Location:../services.php?error=success&names=$names&busNo=$BusNo&dept=$deptime&line=$line&loadTicket=ticket");
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