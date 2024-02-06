<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your bank</title>

    <link rel="stylesheet" href="resources/mystyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <script src="resources/script.js" defer> </script>

</head>

<body onload="startTime()">

    <div class="wrapper">

        <header>
        <a href="index.php"><img src="media/smile-logo.png" id="logo" alt="Smile" width="150" height="150"></a>

            <div id="banner-text">
                <h3>Saving is a virtue</h3>
                <p>Today is <span id="time"></span></p>
            </div>

        </header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="mybalance.php">My Balance</a></li>
            </ul>
        </nav>



        <main>

            <h1>Main area</h1>
            <p>See how you deposit and withdraw here</p>
            <p>This system can tell your balance, without guessing</p>

        </main>

        <footer>
            <a href="doc.html">Project Documentation</a>
        </footer>
    </div>
    
</body>

</html>

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// array of posts, fetched from database
$posts = [];

// Import functions
require_once 'database/mybalance_action.php';


//connect to database: PHP Data object representing Database connection
$pdo = db_connect();

//insert transaction
transaction();



?>