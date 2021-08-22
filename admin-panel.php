<?php
session_start();
if (!isset($_SESSION['aid'])) {
    header("Location:index.php");
    exit();
} else {
    include_once 'scripts/dbconnector.php';
    $sql = "SELECT* FROM clients;";
    $result = mysqli_query($conn, $sql);
    $userNo = mysqli_num_rows($result);

    $sql = "SELECT* FROM buses;";
    $result = mysqli_query($conn, $sql);
    $busNo = mysqli_num_rows($result);

    $sql = "SELECT* FROM support;";
    $result = mysqli_query($conn, $sql);
    $probNo = mysqli_num_rows($result);

    $sql = "SELECT* FROM support WHERE response is NULL;";
    $result = mysqli_query($conn, $sql);
    $respNo = mysqli_num_rows($result);

    $sql = "SELECT* FROM tickets;";
    $result = mysqli_query($conn, $sql);
    $ticketsNo = mysqli_num_rows($result);

    $sql = "SELECT* FROM clients WHERE u_status='online';";
    $result = mysqli_query($conn, $sql);
    $onlineNo = mysqli_num_rows($result);
}
?>
<html>

<head>
    <title>Administrator</title>
    <link rel="stylesheet" href="css\main.css">
    <link rel="icon" href="images\icon04.png" type="image/x-icon">
    <script src="js\script01.js"></script>
</head>

<body onload="toggle_adminPanel()">
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
    <div class="dashboard">
        <h1>Dashboard</h1>
        <div class="container">
            <div id="info-div" class="info1" onclick="toggle_adminMadness(0)">
                <span>Users</span>
                <div class="notifier"><label><?php echo $userNo; ?></label></div>
            </div>
            <div id="info-div" class="info2" onclick="toggle_adminMadness(1)">
                <span>Online</span>
                <div class="notifier"><label><?php echo $onlineNo; ?></label></div>
            </div>
            <div id="info-div" class="info3" onclick="toggle_adminMadness(2)">
                <span>Delete User</span>
            </div>
            <div id="info-div" class="info4" onclick="toggle_adminMadness(3)">
                <span>Modify User</span>
            </div>
            <div id="info-div" class="info5" onclick="toggle_adminMadness(4)">
                <span>Buses</span>
                <div class="notifier"><label><?php echo $busNo; ?></label></div>
            </div>
            <div id="info-div" class="info6" onclick="toggle_adminMadness(5)">
                <span for="">Update bus Info</span>
            </div>
            <div id="info-div" class="info7" onclick="toggle_adminMadness(6)">
                <span>Delete Bus</span>
            </div>
            <div id="info-div" class="info8" onclick="toggle_adminMadness(7)">
                <span>Problems</span>
                <div class="notifier"><label><?php echo $probNo; ?></label></div>
            </div>
            <div id="info-div" class="info9" onclick="toggle_adminMadness(8)">
                <span>Respond</span>
                <div class="notifier"><label><?php echo $respNo; ?></label></div>
            </div>
            <div id="info-div" class="info10" onclick="toggle_adminMadness(9)">
                <span>Tickets</span>
                <div class="notifier"><label><?php echo $ticketsNo; ?></label></div>
            </div>
            <div class="more">
                <span onclick="displayOptions()">More...</span>
            </div>
            <div class="more-options">
                <ul>
                    <li onclick="toggle_adminMadness(10)">History log</li>
                    <li onclick="toggle_adminMadness(11)">Stats</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="users" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(0)">Dashboard</a>
        </button>
        <h1 class="h1-short">Users</h1>
        <table class="users-table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            <?php
            $sql01 = "SELECT* FROM clients;";
            $result_users = mysqli_query($conn, $sql01);
            if (mysqli_num_rows($result_users) > 0) {
                while ($row = mysqli_fetch_assoc($result_users)) 
                {
                    echo '<tr><td>' . $row["fname"] . '</td>';
                    echo '<td>' . $row["lname"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["telNo"] . '</td></tr>';
                }
            }

            ?>
        </table>
    </div>
    <div class="user-online" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(1)">Dashboard</a>
        </button>
        <h1 class="h1-short">Online</h1>
        <table class="online-table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            <?php
            $sql05 = "SELECT* FROM clients WHERE u_status='online';";
            $result_online = mysqli_query($conn, $sql05);
            if (mysqli_num_rows($result_online) > 0) {
                while ($row = mysqli_fetch_assoc($result_online)) {
                    echo '<tr><td>' . $row["fname"] . '</td>';
                    echo '<td>' . $row["lname"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["telNo"] . '</td></tr>';
                }
            }

            ?>
        </table>
    </div>
    <div class="user-delete" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(2)">Dashboard</a>
        </button>
        <h1 class="h1-short">Delete users</h1>
        <table class="del-table">
            <tr>
                <th>Names</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php
            $sql06 = "SELECT* FROM clients;";
            $result_del = mysqli_query($conn, $sql06);
            if (mysqli_num_rows($result_del) > 0) {
                while ($row = mysqli_fetch_assoc($result_del)) {
                    echo '<tr><td>' . substr($row["fname"], 0, 1) . '. ' . $row['lname'] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["telNo"] . '</td>';
                    echo '<td><a href="scripts/delete.php?id=' . $row["email"] . '" class="del">Delete</a></td></tr>';
                }
            }
            ?>
        </table>
    </div>
    <div class="user-modify" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(3)">Dashboard</a>
        </button>
        <h1 class="h1-long">Update User info</h1>
        <div class="wrapper">
            <?php
            $sql07 = "SELECT* FROM clients;";
            $result_mod = mysqli_query($conn, $sql07);
            if (mysqli_num_rows($result_mod) > 0) {
                while ($row = mysqli_fetch_assoc($result_mod)) {
                    echo '<div class="usersDiv">';
                    echo '<h1>ID-' . $row["id"] . '</h1>';
                    echo '<form method="POST" action="scripts/updateUser.php">';
                    echo '<input type="text" name="fname" value=' . $row["fname"] . '><br>';
                    echo '<input type="text" name="lname" value=' . $row["lname"] . '><br>';
                    echo '<input type="email" name="email" value=' . $row["email"] . '><br>';
                    echo '<input type="text" name="phone" value=' . $row["telNo"] . '><br>';
                    echo '<button type="submit" name="submit" value="'.$row['id'].'">Update</button>';
                    echo '</form></div>';
                    echo '<div class="usersSepartor"></div>';
                }
            }
            ?>
        </div>
    </div>
    <div class="buses" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(4)">Dashboard</a>
        </button>
        <h1 class="h1-short">Buses</h1>
        <table class="buses-table">
            <tr>
                <th>Bus No</th>
                <th>Plate No</th>
                <th>Line</th>
                <th>Seats</th>
                <th>Driver</th>
            </tr>
            <?php
            $sql02 = "SELECT* FROM buses;";
            $result_buses = mysqli_query($conn, $sql02);
            if (mysqli_num_rows($result_users) > 0) {
                while ($row = mysqli_fetch_assoc($result_buses)) {
                    echo '<tr><td>' . $row["busNo"] . '</td>';
                    echo '<td>' . $row["plackNo"] . '</td>';
                    echo '<td>' . $row["line"] . '</td>';
                    echo '<td>' . $row["seats"] . '</td>';
                    echo '<td>' . substr($row["d_fname"], 0, 1) . '. ' . $row["d_lname"] . '</td></tr>';
                }
            }

            ?>
        </table>
    </div>
    <div class="buses-modify" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(5)">Dashboard</a>
        </button>
        <h1 class="h1-long">Update Bus info</h1>
        <div class="wrapper-buses">
            <?php
            $sql08 = "SELECT* FROM buses;";
            $result_busMod = mysqli_query($conn, $sql08);
            if (mysqli_num_rows($result_busMod) > 0) {
                while ($row = mysqli_fetch_assoc($result_busMod)) {
                    echo '<div class="busesDiv">';
                    echo '<h1>BUS-' . $row["busNo"] . '</h1>';
                    echo '<form method="POST" action="scripts/updateBus.php">';
                    echo '<input type="text" name="busNo" value=' . $row["busNo"] . '><br>';
                    echo '<input type="text" name="plateNo" value=' . $row["plackNo"] . '><br>';
                    echo '<input type="text" name="seats" value=' . $row["seats"] . '><br>';
                    echo '<input type="text" name="fname" value=' . $row["d_fname"] . '><br>';
                    echo '<input type="text" name="lname" value=' . $row["d_lname"] . '><br>';
                    echo '<input type="hidden" name="oldBusNo" value=' . $row["busNo"] . '><br>';
                    echo '<button type="submit" name="submit">Update</button>';
                    echo '</form></div>';
                    echo '<div class="usersSepartor"></div>';
                }
            }
            ?>
        </div>
    </div>
    <div class="buses-delete" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(6)">Dashboard</a>
        </button>
        <h1 class="h1-short">Delete Buses</h1>
        <table class="delBus-table">
            <tr>
                <th>No</th>
                <th>Plate No</th>
                <th>Driver</th>
                <th>Seats</th>
                <th>Action</th>
            </tr>
            <?php
            $sql06 = "SELECT* FROM buses;";
            $result_del = mysqli_query($conn, $sql06);
            if (mysqli_num_rows($result_del) > 0) {
                while ($row = mysqli_fetch_assoc($result_del)) {
                    echo '<tr><td>' . $row['busNo'] . '</td>';
                    echo '<td>' . $row["plackNo"] . '</td>';
                    echo '<td>' . $row["d_fname"] . ' ' . $row['d_lname'] . '</td>';
                    echo '<td>' . $row["seats"] . '</td>';
                    echo '<td><a href="scripts/deleteBus.php?id=' . $row["busNo"] . '" class="del">Delete</a></td></tr>';
                }
            }
            ?>
        </table>
    </div>
    <div class="problems" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(7)">Dashboard</a>
        </button>
        <h1 class="h1-short">Problems</h1>
        <?php
        $sql03 = "SELECT* FROM support;";
        $result_prob = mysqli_query($conn, $sql03);
        if (mysqli_num_rows($result_prob) > 0) {
            while ($row = mysqli_fetch_assoc($result_prob)) {
                $status = (isset($row['response'])) ? "RESPONDED" : "WAITING";
                echo '<div class="prob"><h2>' . $row['title'] . '</h2>';
                echo '<p>' . $row['prob'] . '</p><br>';
                echo '<label>Submitted on: ' . $row['timeOfSubmit'] . ' by ' . $row['fname'] . ' ' . $row['lname'] . '</label><label class="status">Status: ' . $status . '</label></div>';
            }
        }

        ?>
    </div>
    <div class="problems-respond" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(8)">Dashboard</a>
        </button>
        <h1 class="h1-long">Respond to Problems</h1>
        <?php
        $sql09 = "SELECT* FROM support;";
        $result_resp = mysqli_query($conn, $sql09);
        if (mysqli_num_rows($result_resp) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result_resp)) 
            {
                if (!isset($row['response'])) 
                {
                    $_SESSION['tmp_userid']= $row['user_id'];
                    echo '<div class="prob"><h2>' . $row['title'] . '</h2>';
                    echo '<p>' . $row['prob'] . '</p><br>';
                    echo '<label>Submitted on: ' . $row['timeOfSubmit'] . ' by ' . $row['fname'] . ' ' . $row['lname'] . '</label></div>';
                    echo '<div class="resp">
                          <form method="POST" action="scripts/response.php">
                          <textarea cols="50" rows="2" name="response" placeholder="Your response..."></textarea><br>
                          <button type="submit" name="submit" value="'.$row['id'].'">Respond</button>
                          </form>
                          </div>';
                    echo '<div class="separator"></div>';
                }
            }
        }

        ?>
    </div>
    <div class="ticket" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(9)">Dashboard</a>
        </button>
        <h1 class="h1-short">Tickets</h1>
        <table class="tickets-table">
            <tr>
                <th>Ticket No</th>
                <th>Bus No</th>
                <th>Line</th>
                <th>Passenger</th>
                <th>Date</th>
                <th>Depart Time</th>
            </tr>
            <?php
            $sql04 = "SELECT* FROM tickets;";
            $result_tickets = mysqli_query($conn, $sql04);
            if (mysqli_num_rows($result_tickets) > 0) {
                while ($row = mysqli_fetch_assoc($result_tickets)) 
                {
                    $passenger_id= $row["user_id"];
                    $query="SELECT* FROM clients WHERE id=$passenger_id";
                    $queryResult=mysqli_query($conn,$query);
                    if(mysqli_num_rows($queryResult)>0)
                    {
                        if($queryRow=mysqli_fetch_assoc($queryResult))
                        {
                            $query_fname= $queryRow['fname'];
                            $query_lname=$queryRow['lname'];
                        }
                    }
                    else
                    {
                        header("location:admin-panel.php");
                        exit();
                    }

                    echo '<tr><td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["busNo"] . '</td>';
                    echo '<td>' . $row["line"] . '</td>';
                    echo '<td>' . substr($query_fname, 0, 1) . '. ' . $query_lname . '</td>';
                    echo '<td>' . $row["date"] . '</td>';
                    echo '<td>' . $row["depart"] . '</td></tr>';
                }
            }
            ?>
        </table>
    </div>
    <div class="history-admin" id="adminInfo">
        <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(10)">Dashboard</a>
        </button>
    <h1 class="h1-short">History</h1>
    <?php 
    $sql="SELECT* FROM log;";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        echo '<div class="history-Div">';
        echo '<h2> At ' . $row['time'] . '</h2>';
        echo '<p>' . $row['description'] . '</p><br>';
        echo '<label>Log ID: '.$row['id'].'</label><label class="status"></div>';
      }
    }

    ?>
    </div>
    <div class="stats" id="adminInfo">
    <button class="toDashBoard">
            <a href="#" onclick="toggle_adminMadness(11)">Dashboard</a>
    </button>
    <h1 class="h1-short">Some numbers</h1>
    <?php
       
       $sql="SELECT* FROM clients WHERE sex='Female'";
       $result=mysqli_query($conn,$sql);
       $female_users=mysqli_num_rows($result);

       $sql="SELECT* FROM clients WHERE sex='Male'";
       $result=mysqli_query($conn,$sql);
       $male_users=mysqli_num_rows($result);

       echo '<label class="notice">[under construction]</label>';
       echo '<div class="stats-Div">';
       echo '<h2>Users</h2>';
       echo '<label class="stats-label">Male users:'.$male_users.'</label><br>';
       echo '<label class="stats-label">Female users:'.$female_users.'</label>';
       echo '</div>';

       echo '<div class="stats-Div">';
       echo '<h2>Travelling</h2>';
       echo '<label class="stats-label">Male users:'.$male_users.'</label><br>';
       echo '<label class="stats-label">Female users:'.$female_users.'</label>';
       echo '</div>'
       
    ?>
    </div>
    <div class="pop-up2">
        <?php

        if (!isset($_SESSION['logged'])) 
        {
            echo '<label>You\'re not logged in!</label>';
        } elseif (isset($_SESSION['uid'])) 
        {
            echo '<label>User: ' . $_SESSION['uid'] . '</label>';
        } elseif (isset($_SESSION['aid'])) 
        {
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
            echo '<img src="images/error.png"> <label class="error">Already registered!</label>';
        } elseif (isset($_GET['error']) && $_GET['error'] == "pwd") {
            echo '<img src="images/error.png"> <label class="error">Wrong password!</label>';
        } elseif (isset($_GET['error']) && $_GET['error'] == "busNo") {
            echo '<img src="images/error.png"> <label class="error">Invalid Bus Number!</label>';
        } elseif (isset($_GET['error']) && $_GET['error'] == "plackNo") {
            echo '<img src="images/error.png"> <label class="error">Invalid Plate Number!</label>';
        } elseif (isset($_GET['error']) && $_GET['error'] == "Seats") {
            echo '<img src="images/error.png"> <label class="error">Invalid Seats Number!</label>';
        } elseif (isset($_GET['error']) && $_GET['error'] == "plackNo") {
            echo '<img src="images/error.png"> <label class="error">Invalid Plate Number!</label>';
        } elseif (!isset($_GET['error'])) {
            echo '<img src="images/hello.png"> <label class="error">Hi, there!</label>';
        }
        ?>
</body>

</html>