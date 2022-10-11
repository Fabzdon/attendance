<?php

$host = '127.0.0.1';
$db = 'attendance_db';
$username = 'root';
$password = '';
$charset = 'utf8mb4';


$dsn = "mysql:host = $host; dbname=$db; charset = $charset";

try
{
    $pdo = new PDO($dsn, $username, $password);
    echo "Database Connection Successful";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   

}
catch(PDOException $e)
{

  throw new PDOException("<h3 class = 'text-danger'> A Database Connection Error Occured Please see error message: <h/>" . $e->getMessage());
  
}




require_once 'crud.php';
$crud = new crud($pdo);
?>