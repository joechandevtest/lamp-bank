<?php 

function db_connect() {
  global $pdo;

  try {
   
    $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME; $user = DBUSER; $pass = DBPASS;    

    $pdo = new PDO($connectionString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
	
    return $pdo;  
    
  }
  catch (PDOException $e)
  {
    echo "<p style='color:red'>Connection Failed: " . $e->getMessage() . "</p>\r\n";
    die($e->getMessage());
  }

  //$pdo->close();
}

?>