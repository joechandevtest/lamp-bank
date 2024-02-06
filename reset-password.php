<?php

// Include config file
require_once "database/config.php";
require_once('database/connect.php');

db_connect();
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}



// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) { //less than 6 
        $new_password_err = "Password must have at least 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {

        try {
            // Prepare an update statement
            $sql = "UPDATE member SET password ='" . $new_password . "' WHERE username = '" . $_SESSION['username'] . "'";

            // Prepare statement
            $stmt = $pdo->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo "<p style='color:green'>records UPDATED successfully</p>";

            
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

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
                <li><a href="mybalance.php">My Balance</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>



        <main>

            <h1>Rest Password</h1>
            <div class="wrapper">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                        <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit">
                        
                        <a href="welcome.php">Cancel</a>
                    

                    </div>
                </form>
            </div>

        </main>


    </div>


</body>

</html>