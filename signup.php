<?php
global $emailErr;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resources/mystyle.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
  <script src="resources/script.js" defer> </script>
  <title>Sign Up</title>
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

    <main style="border: 1px lightcoral solid">
      <form method="post" action="./database/signup_action.php">
        <div class="form_container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>

          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Your Username" name="username" id="username" required>
          <br>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
          <br>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
          <br>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
          <br>

          <hr>

          <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
          <p>Already have an account? <a href="login.php">Log in here</a>.</p>
        </div>

      </form>

      <a href="index.php">Back to Home Page</a>

    </main>

  </div>
</body>

</html>