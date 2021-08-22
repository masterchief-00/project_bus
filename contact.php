<?php
session_start();
?>
<html>

<head>
    <title>Contact us</title>
    <link rel="stylesheet" href="css\main.css">
    <link rel="icon" href="images\icon04.png" type="image/x-icon">
    <script src="js\script01.js"></script>
</head>

<body onload="toggle_contacts()">
    <nav class="top-menu">
        <a href="index.html"><img src="images\logo.png" alt="Logo"></a>
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
    <div class="contact">
        <h1>Our Contacts</h1>
        <ul>
            <li>
                <img src="images\fb.png" alt="facebook">
                <span>
                    <a href="www.facebook.com">Bus System</a>
                    <span class="tooltip-text">
                        <label>You can contact us via facebook!</label>
                    </span>
                </span>
            </li>
            <li>
                <img src="images\twi.png" alt="Twitter">
                <span>
                    <a href="www.twitter.com">bus_system</a>
                    <span class="tooltip-text">
                        <label>You can contact us via Twitter!</label>
                    </span>
                </span></li>
            <li>
                <img src="images\insta.png" alt="Instagram">
                <span>
                    <a href="www.instagram.com">@bus_syst05</a>
                    <span class="tooltip-text">
                        <label>You can contact us via Instagram!</label>
                    </span>
                </span>
            </li>
            <li>
                <img src="images\tel.png" alt="Telephone">
                <span>
                    +2507881234
                    <span class="tooltip-text">
                        <label>Or maybe call our customer care!</label>
                    </span>
                </span>
            </li>
        </ul>
    </div>
    <div class="pop-up2">
        <?php

        if (!isset($_SESSION['logged'])) 
        {
            echo '<label>You\'re not logged in!</label>';
        } 
        elseif (isset($_SESSION['uid'])) 
        {
            echo '<label>User: ' . $_SESSION['uid'] . '</label>';
        } 
        elseif (isset($_SESSION['aid'])) 
        {
            echo '<label>Admin: ' . $_SESSION['aid'] . '</label>';
        }
        ?>
    </div>
</body>

</html>