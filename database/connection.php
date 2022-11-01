<?php

  //  $host = '127.0.0.1';
  //  $db = 'attendance_db';
  //  $username = 'root';
  //  $password = '';
  //  $charset = 'utf8mb4';


////Remote Database COnnection 
  $host ='applied-web.mysql.database.azure.com';
   $db = 'attendee_fabian_gordon';
   $username ='appliedweb_user@applied-web';
   $password='P@ssword1';
   $charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try
{
    $pdo = new PDO($dsn, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   

}
catch(PDOException $e)
{

  throw new PDOException("<h3 class = 'text-danger'> A Database Connection Error Occured Please see error message: <h/>" . $e->getMessage());
  
}

require_once 'crud.php';
require_once 'user.php';
$user = new user($pdo);
$crud = new crud($pdo);

$user->insertUser("admin", "password");
?>