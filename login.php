<?php

session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page


// Include config file
require_once "./database/config.php";
require_once "./database/connect.php";
db_connect();


// Define variables and initialize with empty values

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: mybalance.php");
    exit;
}

if (isset($_SESSION['username0'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
}

$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty 
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }


    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT * FROM member WHERE username = :username && password = :password";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(array(':username' => $username, ':password' => $password));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data == false) {
            $errMsg = "User $username not found.";
        } else {
            if ($password == $_POST['password']) {
                session_start();

                // Store data in session variables
                $_SESSION['loggedin'] = true;
                //$_SESSION["accountNumber"] = $accountNumber;
                $_SESSION["username"] = $username;

                // Redirect user to welcome page
                header('Location: welcome.php');
                exit;
            } else {
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
                echo "<p style='color:red'>session fail</p>";
                $errMsg = 'Password not match.';
                header('Location: notcheck.php');
            }
        }
    }

}
?>

<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="resources/mystyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <script src="resources/script.js" defer> </script>

</head>

<body onload="startTime()">

    <div class="wrapper">
        <header>
            <img src="media/smile-logo.png" id="logo" alt="Smile" width="150" height="150">

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
                <!--  -->
            </ul>
        </nav>



        <main>

            <form action="login.php" method="POST">
                
            <div class="form_container">
                    <h1>Log In</h1>
                    <p>Please fill in your username and password to access your account.</p>
                    <hr>

                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Your username" name="username" id="username">
                    <span style="color: red"><?php echo $username_err; ?></span>
                    <br>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" required>
                    <span style="color: red"><?php echo $password_err; ?></span>
                    <br>

                    <button type="submit" class="registerbtn">Access account</button>

                </div>

                <div class="container signin">
                    <p>Don't have an account? <a href="signup.php">Sign Up Here</a>.</p>
                </div>
            </form>

            <a href="index.php">Back to Home Page</a>

        </main>
    </div>

    

</body>

</html>