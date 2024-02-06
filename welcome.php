<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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
                    <li><a href="mybalance.php">Go to My Balance</a></li>
                    <li><a href="reset-password.php">Reset Password</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    
                </ul>
            </nav>

            <main>
                <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our bank.</h1>

                <p>
                <h2>What would you like to do today?</h2>
                <ul class="welcome_menu">
                    <li><a href="mybalance.php">Go to My Account</a></li>
                    <li><a href="reset-password.php">Reset Password</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
                </p>
            </main>
        


    </div>
</body>

</html>