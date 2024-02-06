<?php
require_once('config.php');
require_once('connect.php');
db_connect();
session_start();
transaction();

function transaction() {
  global $pdo;

        
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
               
         try{
          /* if (isset($_POST['amount']) && isset($_POST['psw'])) */
          if (isset($_POST['amount'])){  
              
              
              //PREPARED statement    
              $sql = 'INSERT INTO trans (TransID, Username, TransDate, ReceivedFrom, SentTo, Debit, Credit, Balance) 
              VALUES (:TransID, :Username, :TransDate, :ReceivedFrom, :SentTo, :Debit, :Credit, :Balance)';      
              
              echo $_SESSION["username"];
              $statement = $pdo->prepare($sql);				
              
              $statement->bindValue(':TransID', date("Y-m-d")."-".time());
              $statement->bindValue(':TransDate', date("Y-m-d"));
              $statement->bindValue(':Username', $_SESSION['username']);
            
            $sql2 = "SELECT `Balance` FROM `trans` WHERE Username='". $_SESSION['username']."' ORDER BY `TransID` DESC LIMIT 1";
           
            $oldbalance="";

            $result2 = $pdo->query($sql2);
            
            while ($row = $result2->fetch()) {
               $oldbalance = $row['Balance'];
            }
           
            
            if (isset($_POST['deposit'])){ 
              $statement->bindValue(':SentTo', "");
              $statement->bindValue(':ReceivedFrom', "Cash In");
              $statement->bindValue(':Credit', $_POST["amount"]);
              $statement->bindValue(':Debit', 0);

              $statement->bindValue(':Balance', $oldbalance + $_POST["amount"]);
            } 

            if (isset($_POST['withdrawal'])){ 
              $statement->bindValue(':SentTo', "Cash Out");
              $statement->bindValue(':ReceivedFrom', "");
              $statement->bindValue(':Debit', $_POST["amount"]);
              $statement->bindValue(':Credit', 0);

              $statement->bindValue(':Balance', $oldbalance - $_POST["amount"]);
            }
              
            $statement->execute();   
            header('Location: ..\mybalance.php');
    exit();
          }
        }
        catch (PDOException $err ) {
            echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
        } 
    }
    
  }

  
function get_transactions() {

$pdo = db_connect();
global $posts;


$sql = "SELECT * FROM trans WHERE Username ='". $_SESSION['username']."' ORDER BY TransDate";
$results = $pdo->query($sql);


while ($row = $results->fetch()) {
// the keys match the field names from the table

$posts[] = Array (
  "TransDate" => $row['TransDate'],
  "TransID" => $row['TransID'],
  "ReceivedFrom" => $row['ReceivedFrom'],
  "SentTo" => $row['SentTo'],
  "Debit" => $row['Debit'],
  "Credit" => $row['Credit'],
  "Balance" => $row['Balance'],
);

}

}


function the_balance() {
  global $posts;
  ?>      


  <?php
  foreach ($posts as $value) {
  ?>             
      <tr>
      <td>
      <?php echo $value["TransDate"]; ?>
      </td>

      <td>
      <?php echo $value["ReceivedFrom"]; ?> <?php echo $value["SentTo"]; ?>
      </td>

      <td>
      <?php echo $value["Debit"]; ?>
      </td>

      <td>
      <?php echo $value["Credit"]; ?>
      </td>

      <td>
      <?php echo $value["Balance"]; ?>
      </td>
      </tr>
              
    <?php
  }
}
  
?>