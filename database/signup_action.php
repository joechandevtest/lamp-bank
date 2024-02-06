<?php

require_once('config.php');
require_once('connect.php');
db_connect();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

register_member();
function register_member() {
    global $pdo, $emailErr;
    
    $error = false;
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST['email']) && isset($_POST['email']) && isset($_POST['psw'])){     
            
          $email = test_input($_POST["email"]);

         if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailErr = "Invalid email format";
          $error = true;
          echo "<p style= 'color: red;'> {$emailErr} </p>";
          
         ?> 
          <input type="button" value="Back to Sign Up" onclick="javascript:history.go(-1)" />
          <?php
          
        }else if($_POST['psw'] != $_POST['psw-repeat']){
            $passwordErr = "password is not the same";
            $error = true;
            echo "<p style= 'color: red;'> {$passwordErr} </p>";
            
            ?>
            <input type="button" value="Back to Sign Up" onclick="javascript:history.go(-1)" />
            <?php
        } else if(strlen($_POST['psw']) < 6){ 
          
            $passwordErr = "Password must have at least 6 characters.";
            $error = true;
            echo "<p style= 'color: red;'> {$passwordErr} </p>";
            
            ?>
            <input type="button" value="Back to Sign Up" onclick="javascript:history.go(-1)" />
            <?php 
                        
        }
        
        if (!$error){

		try{
          		//PREPARED statement    
          		$sql = 'INSERT INTO member ( username, password, email, creationDate) 
        			VALUES ( :username, :psw, :email, :creationDate)';
          
          		$statement = $pdo->prepare($sql);		
          
		          $statement->bindValue(':username', $_POST['username']);
		          $statement->bindValue(':psw', $_POST['psw']);		
		          $statement->bindValue(':email', $_POST['email']);
		          $statement->bindValue(':creationDate', date("Y-m-d"));
          
		          $statement->execute();   

		          //initalize the account balance
		          $sql1 = 'INSERT INTO trans (TransID, TransDate, Username, ReceivedFrom, SentTo, Debit, Credit, Balance) 
		          VALUES (:TransID, :TransDate, :Username, :ReceivedFrom, :SentTo, :Debit, :Credit, :Balance)';  

		          $statement1 = $pdo->prepare($sql1);				
            
		          $statement1->bindValue(':TransID', date("Y-m-d")."-".time());
		          $statement1->bindValue(':TransDate', date("Y-m-d"));
		          $statement1->bindValue(':Username', $_POST['username']);
		          $statement1->bindValue(':ReceivedFrom', "Account Creation");
		          $statement1->bindValue(':SentTo', " ");
		          $statement1->bindValue(':Debit', "0");
		          $statement1->bindValue(':Credit', "0");
		          $statement1->bindValue(':Balance', "0");

		          $statement1->execute();   
		} catch (PDOException $e){
			echo "Database Error: " . $e->getMessage();
		}

          ?>

          <p style= 'color: green'> Registration Success, log in in the main page</p>
          <input type="button" value="Back to home to log in" onclick="javascript:history.go(-2)" />

          <?php
        }
      }
    }


}
?>



