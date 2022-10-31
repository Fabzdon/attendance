<?php

class user 
{

    //private database object
  private $database;

  //constructor to initialise private variable
  function __construct($conn)
  {
    $this->database = $conn;

  }

  public function insertUser ($username, $password)
  {
    
    try
    {
        $result = $this->getUSerByUsername($username);
        if($result['num'] > 0){
            return false;
        }
        else{
        $new_password = md5($password.$username);
        $sql = "INSERT INTO user (username,password) VALUES (:username, :password)";
        $statement = $this->database->prepare($sql);

        $statement->bindparam(':username', $username);
        $statement->bindparam(':password', $new_password);
       


        $statement->execute();
        return true;

        }


    }
    catch(PDOException $e)
    {

        echo $e->getMessage();
        //throw $e;
        return false;

    }
}

public function getAttendeeDetails($username, $password)
  {
    try{
    $sql = "select * from user  where username = :username AND password = :password";
    $stmt = $this->database->prepare($sql);
    $stmt->bindparam(':username',$username);
    $stmt->bindparam(':password',$password);

     $stmt->execute();
     $result = $stmt->fetch();
     return $result;
    }
    catch (PDOException $e){

      echo $e->getMessage();
      return false;
    
    }
  }
  public function getUSerByUsername($username){
    
    try{
        $sql = "select count(*) as num  from user where username = :username";
        $stmt = $this->database->prepare($sql);
        $stmt->bindparam(':username',$username);
      
    
         $stmt->execute();
         $result = $stmt->fetch();
         return $result;
        }
        catch (PDOException $e){
    
          echo $e->getMessage();
          return false;
        
        }
}

}

?>