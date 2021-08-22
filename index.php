<?php

session_start();
include_once 'scripts/dbconnector.php';
$email = (isset($_SESSION['umail'])) ? $_SESSION['umail'] : NULL;
$userID= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : NULL;


?>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="css\main.css">
  <link rel="icon" href="images\icon04.png" type="image/x-icon">
  <script src="js\script01.js"></script>
</head>

<body onload="toggle_home()">
  <nav class="top-menu">
    <a href="index.php" onclick="toggle_home()"><img src="images\logo.png" alt="Logo"></a>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="contact.php">Contact us</a></li>
      <?php

      if (isset($_SESSION['aid'])) {
        echo '<li><a href="admin-panel.php" class="adminButton">Administrator</a></li>';
      }

      ?>
    </ul>
    <?php
    if (isset($_SESSION['uid']) || isset($_SESSION['aid'])) {
      echo '<form action="scripts/logout.php" method="GET" name="form-logout">
            <button class="nav-button" type="submit" name="submit">Log Out</button>
          </form>';
    }
    ?>
  </nav>
  <?php

  if (!isset($_SESSION['logged'])) {
    echo '<div class="sign-up">
           <h1>Register</h1>
           <form method="POST" name="form-signup" action="scripts/register.php">
             <input type="text" name="fname" placeholder="First Name" required><br>
             <input type="text" name="lname" placeholder="Last Name" required><br>
             <select name="sex">
             <option value="">[Sex]</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
             </select>
             <input type="email" name="email" placeholder="Email" required><br>
             <input type="text" name="phone" placeholder="Phone Number" required><br>
             <input type="password" name="pwd" placeholder="password" required><br>
             <button type="submit" name="submit">Submit</button>
           </form>
           <a href="#" class="link-1" onclick="toggle_login()">Already have an account?</a>
         </div>
         <div class="login">
           <h1>Login</h1>
           <form method="POST" name="form-login" action="scripts/login.php">
             <div class="toggle-switch">
               <input type="checkbox" id="toggle" class="checkbox" name="checkAdmin" onchange="toggle_adminTheme()">
               <label for="toggle" class="switch"></label>
             </div>
             <input type="email" name="email" placeholder="Email" onfocus="input_focus(1)" onblur="input_focusOff(1)" required><br>
             <input type="password" name="pwd" placeholder="password" onfocus="input_focus(2)" onblur="input_focusOff(2)" required><br>
             <button type="submit" name="submit" onmouseover="login_mouseOver()" onmouseout="login_mouseOff()">Login</button>
           </form>
           <label class="label2">Admin</label>
           <label class="label1">Client</label>
           <a href="#" class="link-2">Forgot Password?</a><br>
           <a href="#" class="link-3" onclick="toggle_signup()">Don\'t have an account?</a>
         </div>';
  } else {
    echo '<div class="homepage">
            <h1>Welcome!</h1>';
    if (isset($_SESSION['uid'])) {
      echo '<label>Welcome to our homepage, you\'ve made it through. After the login was succesfull, you can proceed to our services if you need any help you can contact our support team.<br>If you encounter an error please report it and our tech team will be glad to fix it ASAP!</label>';
    } elseif (isset($_SESSION['aid'])) {
      echo '<label>Welcome to the homepage, looks like it\'s the admin himself!<br>Well   you know how all this works so now GET TO WORK!</label>';
    }
    echo '</div>';
  }
  ?>
  <div class="acc-update">
    <h1>Update info</h1>
    <form action="scripts/updateUser.php" method="POST">
      <?php
      if (isset($_SESSION['logged'])) {
        $sql = "SELECT* FROM clients WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            echo '<input type="text" name="fname" value=' . $row["fname"] . '><br>
            <input type="text" name="lname" value=' . $row["lname"] . '><br>
            <input type="text" name="email" value=' . $row["email"] . '><br>
            <input type="password" name="oldPwd" placeholder="Old Password"><br>
            <input type="password" name="newPwd" placeholder="New Password"><br>
            <input type="text" name="phone" value=' . $row["telNo"] . '><br>
            <button type="submit" name="submit" value="' . $id . '">Update</button><br>';
          }
        }
      }

      ?>
    </form>
  </div>
  <div class="acc-notifier">
    <h1>Notifications</h1>
    <?php
    if (isset($_SESSION['logged'])) 
    {
      $sql = "SELECT* FROM notifications WHERE user_id='$userID';";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) 
      {
        while ($row = mysqli_fetch_assoc($result)) 
        {
          echo '<div class="notification-Div">';
          echo '<h2>' . $row['title'] . '</h2>';
          echo '<p>' . $row['description'] . '</p><br>';
          echo '<label>Notification sent on: ' . $row['timeOfSubmit'] . '</label></div>';
        }
      }
    }

    ?>
  </div>
  <div class="acc-tickets">
    <h1>Tickets</h1>
    <?php
     $sql="SELECT* FROM tickets WHERE user_id='$userID'";
     $result=mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0)
     {
       while($row=mysqli_fetch_assoc($result))
       {
        echo '<div class="tickets-Div">';
        echo '<h2> Ticket number ' . $row['id'] . '</h2>';
        echo '<p> You\'ll board bus number ' . $row['busNo'] . ' which will take off at '.$row['depart'].' Today</p><br>';
        echo '<label>Ticket processed on: ' . $row['date'] . '</label><label class="status">NB: Be advised, no refunds if late!</label></div>';
       }
     }
    ?>
  </div>
  <div class="acc-history">
    <h1>History</h1>
    <?php 
    $sql="SELECT* FROM log WHERE user_id='$userID'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        echo '<div class="history-Div">';
        echo '<h2> At ' . $row['time'] . '</h2>';
        echo '<p> You ' . $row['description'] . '</p><br>';
        echo '<label>Log ID: '.$row['id'].'</label><label class="status"></div>';
      }
    }

    ?>
  </div>
  <div class="acc-delete">
    <h1>Delete Account</h1>
    <p><?php echo $_SESSION['uid']; ?> ,You are about to delete your account, be advised that this action is irreversible which means that you'll lose any unsaved information like tickets reserved.</p>
    <form action="scripts/delete.php" method="POST">
    <button type="submit" name="delete" value="<?php echo $userID; ?>">DELETE!</button>
    </form>
  </div>
  <div class="pop-up">
    <label>Welcome back to this website which is under construction!<br>If you encounter any problem simply report it, Hopefully you like how it looks! :)</label>
  </div>
  <?php

  if (isset($_SESSION['logged'])) {
    echo '<div class="user-settings">
              <h1>Account Settings</h1>
              <ul>
                <li><a href="#" onclick="toggle_update()">Update info</a></li>
                <li><a href="#" onclick="toggle_notifier()">Notifications</a></li>
                <li><a href="#" onclick="toggle_tickets()">Tickets</a></li>
                <li><a href="#" onclick="toggle_history()">History</a></li>
                <li><a href="#" onclick="toggle_delete()">Delete Account</a></li>
              </ul>
            </div>';
  }

  ?>
  <div class="pop-up2" <?php if (isset($_SESSION['logged'])) echo 'onclick="toggle_settings()"'; ?>>
    <?php

    if (!isset($_SESSION['logged'])) {
      echo '<label>You\'re not logged in!</label>';
    } elseif (isset($_SESSION['uid'])) {
      echo '<label>User: ' . $_SESSION['uid'] . '</label>';
    } elseif (isset($_SESSION['aid'])) {
      echo '<label>Admin: ' . $_SESSION['aid'] . '</label>';
    }
    ?>
  </div>
  <div class="errorPop">
    <?php
    if (isset($_GET['error']) && $_GET['error'] == "success") {
      echo '<img src="images/success.png"> <label class="success">Done!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "empty") {
      echo '<img src="images/error.png"> <label class="error">Please fill out all fields</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "name") {
      echo '<img src="images/error.png"> <label class="error">Invalid names!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "emailNot") {
      echo '<img src="images/error.png"> <label class="error">Invalid email!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "phone") {
      echo '<img src="images/error.png"> <label class="error">Invalid phone number!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "duplicate") {
      echo '<img src="images/error.png"> <label class="error">Email/Phone number already registered!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "pwd") {
      echo '<img src="images/error.png"> <label class="error">Wrong password!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "pwdChange") {
      echo '<img src="images/error.png"> <label class="error">Wrong old password!</label>';
    } elseif (isset($_GET['error']) && $_GET['error'] == "fatal") {
      echo '<img src="images/error.png"> <label class="error">Internal error!</label>';
    } elseif (!isset($_GET['error'])) {
      echo '<img src="images/hello.png"> <label class="error">Hi, there!</label>';
    }
    ?>

  </div>
</body>

</html>