<?php
session_start();

if(isset($_POST['submit']))
{
   include_once 'dbconnector.php';

   $from=$_POST['from'];
   $to=$_POST['to'];
   $deptime=$_POST['deptime'];
   $deptDate=$_POST['deptDate'];
   $user_id=$_SESSION['user_id'];
   $mysqlTime = date('Y-m-d H:i:s', time());

   $sql="SELECT* FROM clients WHERE id=$user_id";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0)
   {
       if($row=mysqli_fetch_assoc($result))
       {
           $fname=$row['fname'];
           $lname=$row['lname'];
       }
   }
   else
   {
        header("Location:../services.php");
        exit();
   }

   if($from=="From" || $to=="Destination" || $deptime=="Depart time")
   {
       header("Location:../services.php?error=empty");
       exit();
   }
   else
   {
       $from=strtoupper($from);
       $to=strtoupper($to);
       $line=$from.'-'.$to;

       $sql="SELECT* FROM tickets;";
       $result=mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)>0)
       {
           while($row=mysqli_fetch_assoc($result))
           {
                $ticketNo = $row['id'];
           }
           $ticketNo++;
       }
       else
       {
           $ticketNo=0;
       }

       $sql="SELECT* FROM buses WHERE line='".$line."';";
       $result=mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)>0)
       {
           while($row=mysqli_fetch_assoc($result))
           {
               if($row['seats']>0)
               {
                   $seatsNow= $row['seats']-1;
                   $busNo=$row['busNo'];
                   $mysqlTime = date('Y-m-d H:i:s', time());
                   $sql="UPDATE buses SET seats='$seatsNow' WHERE busNo='$busNo';";
                   mysqli_query($conn,$sql);
                   
                   $sql="INSERT INTO tickets(user_id,fname,lname,line,depart,busNo,date) VALUES('$user_id','$fname','$lname','$line','$deptime','$busNo','$mysqlTime');";
                   mysqli_query($conn,$sql);
                   

                   $title = "Reservation";
                   $desc = "Your ticket number is " . $ticketNo . " and you will have to board bus number ".$busNo." which will be on the road ".$line." not later than ".$deptime." Today. stay safe!";
                   
                   $sql = "INSERT INTO notifications(title,description,user_id,timeOfsubmit) VALUES('$title','$desc','$user_id','$mysqlTime')";
                   mysqli_query($conn, $sql);

                   $desc="Reserved a ticket for a trip ".$row['line'];
                   $sql="INSERT INTO log(user_id,description,time) VALUES('$user_id','$desc',$mysqlTime)";
                   mysqli_query($conn, $sql);
                   
                   header("Location:../services.php?error=success");
                   exit();
               break;
               }
           }
       }
       else
       {
            header("Location:../services.php?error=line");
            exit();
       }
   }
}

?>