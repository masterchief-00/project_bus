<?php
session_start();
include_once 'scripts\dbconnector.php';
?>
<html>

<head>
    <title>Services</title>
    <link rel="stylesheet" href="css\main.css">
    <link rel="icon" href="images\icon04.png" type="image/x-icon">
    <script src="js\script01.js"></script>
</head>

<body onload="toggle_services()">
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
    <div class="sidebar">
        <ul>
            <li><a href="#" onclick="toggle_Res()">Reservation</a></li>
            <li><a href="#" onclick="toggle_busReg()">Bus Registration</a></li>
            <li><a href="#" onclick="toggle_busInfo()">Bus Info</a></li>
            <li><a href="#" onclick="toggle_ticketinfo()">Ticket info</a></li>
            <li><a href="#" onclick="toggle_problem()">Report a problem</a></li>
            <li><a href="#" onclick="toggle_faq()">FAQ</a></li>
        </ul>
    </div>
    <div class="default" <?php if (isset($_GET['loadTicket']) || isset($_GET['loadBus'])) echo 'style="visibility:hidden"'; ?>>
        <?php

        if (!isset($_SESSION['logged'])) {
            echo '<h1>Error!</h1>
            <label>Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        } elseif (isset($_SESSION['logged']) && isset($_SESSION['uid'])) {
            echo '<h1>Welcome</h1>
            <label>You have arrived at the services page, here you can access different services like reservation, checking your ticket information and bus information and so on as you can see on the side menu.<br> If you can any problem or have any suggestion you can do so here(check the side menu).</label>';
        } elseif (isset($_SESSION['aid'])) {
            echo '<h1>Welcome</h1>
            <label>Well it\'s the admin himself, what can we help?<br>One thing, there are services you can\'t access like reporting problems as it doesn\'t make sense answering to a problem you just reported.<br>NOW GET TO WORK!</label>';
        }
        ?>
    </div>
    <div class="reservation">
        <?php
        if (isset($_SESSION['uid']) || isset($_SESSION['aid'])) {
            echo '<h1>Reservation</h1>
                    <form method="POST" action="scripts\reservation.php">
                        <select name="from" onchange="load_dest()">
                        <option value="From">From</option>
                        <option value="Huye">Huye</option>
                        <option value="Kigali">Kigali</option>
                        <option value="Muhanga">Muhanga</option>
                        <option value="Ruhango">Ruhango</option>
                        <option value="Nyanza">Nyanza</option>
                        <option value="Rusizi">Rusizi</option>
                        </select><br>
                        <select name="to" onchange="load_time()">
                        <option value="Destination">Destination</option>
                        </select><br>
                        <select name="deptime">
                        <option value="">Depart time</option>
                        </select><br>
                        <select name="deptDate">
                        <option value="">Today</option>
                        </select><br>
                        <button type="submit" name="submit" class="buttonReserve">Reserve</button>
                        </form>';
        } else {
            echo '<h1>Error!</h1>
                  <label class="errorInfo">Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        }
        ?>

    </div>
    <div class="bus-reg">
        <?php
        if (isset($_SESSION['aid'])) {
            echo '<h1>Bus Registration</h1>
                    <form method="POST" action="scripts\busReg.php">
                    <input type="text" name="bus_no" placeholder="Bus Number" required><br>
                    <input type="text" name="d_fname" placeholder="Driver\'s First Name" required><br>
                    <input type="text" name="d_lname" placeholder="Driver\'s Last Name" required><br>
                    <input type="text" name="plack_no" placeholder="Plate number" required><br>
                    <input type="text" name="line" placeholder="Line" required><br>
                    <input type="text" name="seats" placeholder="Total seats" required><br>
                    <button type="submit" name="submit">Submit</button>
                    </form>';
        } else {
            echo '<h1>Error!</h1>
                  <label class="errorInfo">Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        }
        ?>
    </div>
    <div class="bus-info">
        <?php
        if (isset($_SESSION['uid']) || isset($_SESSION['aid'])) {
            echo '<h1>Bus Search</h1>
                     <form method="POST" action="scripts/busSearch.php">
                         <input type="text" name="busNo" placeholder="Bus Number" required><br>
                         <button onclick="toggle_busInfo()" name="submit" type="submit">Check</button>
                     </form>';
        } else {
            echo '<h1>Error!</h1>
                  <label class="errorInfo">Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        }
        ?>
    </div>
    <div class="bus-delete" <?php if (isset($_GET['loadBus'])) echo 'style="visibility:visible"'; ?>>
        <h1>Bus info</h1>
        <label>Driver Names:<?php if (isset($_GET['names'])) {
                                echo " " . $_GET['names'];
                            }
                            ?>
        </label><br>
        <label>Bus No:<?php if (isset($_GET['busNo'])) {
                            echo " " . $_GET['busNo'];
                        }
                        ?>
        </label><br>
        <label>Line:<?php if (isset($_GET['line'])) {
                        echo " " . $_GET['line'];
                    }
                    ?>
        </label><br>
        <label>Free Seats:<?php if (isset($_GET['seats'])) {
                                echo " " . $_GET['seats'];
                            }
                            ?>
        </label><br>
        <label>Plate Number:<?php if (isset($_GET['plateNo'])) {
                                echo " " . $_GET['plateNo'];
                            }
                            ?>
        </label><br>
        <button class="button1">OK</button>
        <button class="button2">DELETE</button>
    </div>
    <div class="ticket-info">
        <?php
        if (isset($_SESSION['uid']) || isset($_SESSION['aid'])) {
            echo '<h1>Ticket Search</h1>
                    <form Method="POST" action="scripts\ticketSearch.php">
                        <input type="text" name="ticketNo" placeholder="Ticket Number" required><br>
                        <button name="submit" type="submit" onclick="toggle_ticketDelete()">Check</button>
                    </form>';
        } else {
            echo '<h1>Error!</h1>
                  <label class="errorInfo">Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        }
        ?>

    </div>
    <div class="ticket-delete" <?php if (isset($_GET['loadTicket'])) echo 'style="visibility:visible"'; ?>>
        <h1>Ticket info</h1>
        <label>Names:<?php if (isset($_GET['names'])) {
                            echo " " . $_GET['names'];
                        };
                        ?>
        </label><br>
        <label>Bus No:<?php if (isset($_GET['busNo'])) {
                            echo " " . $_GET['busNo'];
                        };
                        ?>
        </label><br>
        <label>Depart Time:<?php if (isset($_GET['dept'])) {
                                echo " " . $_GET['dept'];
                            };
                            ?>
        </label><br>
        <label>Line:<?php if (isset($_GET['line'])) {
                        echo " " . $_GET['line'];
                    };
                    ?>
        </label><br>
        <button type="submit" name="ok" class="button1">OK</button>
        <button type="submit" name="delete" class="button2">DELETE</button>
    </div>
    <div class="problem-rep">
        <?php
        if (isset($_SESSION['uid'])) {
            echo '<h1>Report a problem</h1>
                    <form method="POST" action="scripts\support.php">
                        <input type="text" name="title" placeholder="Problem"><br>
                        <textarea name="problem" class="problem-desc" cols="30" rows="10" placeholder="Problem description" required></textarea><br>
                        <button type="submit" name="submit">Submit</button>
                    </form>';
        } else {
            echo '<h1>Error!</h1>
                  <label class="errorInfo">Your clearance level does not allow you to access this service, if you\'re not logged in <a href="index.php">click here</a> to do so.<br>If not please feel free to contact our tech team they\'ll be grad to help.</label>';
        }
        ?>

    </div>
    <div class="faq">
        <label for="">[under construction]</label>
    </div>
    <div class="pop-up2">
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
        if (isset($_GET['error']) && $_GET['error'] == "success") 
        {
            echo '<img src="images/success.png"> <label class="success">Done!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "empty") 
        {
            echo '<img src="images/error.png"> <label class="error">Please fill out all fields</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "name") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid names!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "emailNot") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid email!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "phone") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid phone number!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "duplicate") 
        {
            echo '<img src="images/error.png"> <label class="error">Already registered!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "pwd") 
        {
            echo '<img src="images/error.png"> <label class="error">Wrong password!</label>';
        } 
        elseif(isset($_GET['error']) && $_GET['error'] == "busNo")
        {
            echo '<img src="images/error.png"> <label class="error">Invalid Bus Number!</label>';
        }
        elseif(isset($_GET['error']) && $_GET['error'] == "plackNo")
        {
            echo '<img src="images/error.png"> <label class="error">Invalid Plate Number!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "Seats") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid Seats Number!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "plackNo") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid Plate Number!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "invalidNo") 
        {
            echo '<img src="images/error.png"> <label class="error">Unregistered number!</label>';
        } 
        elseif (isset($_GET['error']) && $_GET['error'] == "line") 
        {
            echo '<img src="images/error.png"> <label class="error">Invalid line!</label>';
        }
        elseif (!isset($_GET['error'])) 
        {
            echo '<img src="images/hello.png"> <label class="error">Hi, there!</label>';
        }
        ?>
</body>

</html>