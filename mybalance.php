<?php
require_once 'database/mybalance_action.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}


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
  <title>Your Account</title>
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

        <li><a href="reset-password.php">Reset Password</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </nav>



    <main>
      <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>

      <form method="post" action="database/mybalance_action.php">
        <div class="form_container">
          <h3>You can Deposit or Withdraw the amount fill in the box.</h3>
          
          <label for="amount"><b>Amount</b></label>
          <input type="text" placeholder="Enter the amount" name="amount" id="amount" required>
          
          <hr>

          <button type="submit" id="depositBtn" value="deposit" name="deposit" onclick="deposit()">Deposit</button>
          <button type="submit" id="witdrawBtn" value="withdrawal" name="withdrawal">Withdrawal</button>
        </div>

      </form>



      <h1>This is Your Account Balance</h1>
      <?php get_transactions(); ?>
      <table>
        <tr>
          <th>TransDate</th>
          <th>Description</th>
          <th>Debit</th>
          <th>Credit</th>
          <th>Balance</th>
        </tr>
        <?php the_balance(); ?>

      </table>
    </main>

</body>

</html>