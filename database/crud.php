

<?php

class crud
{

    //private database object
  private $database;

  //constructor to initialise private variable
  function __construct($conn)
  {
    $this->database = $conn;

  }

  public function insert ($fname, $lname, $dob, $email, $contactnum, $specialty, $avatar_path)
  {
    

    try
    {
        $sql = "INSERT INTO attendance (firstname, lastname, dateofbirth, email, contactnum, specialty_id, avatar_path) VALUES (:fname, :lname, :dob, :email, :contactnum, :specialty_id, :avatar_path)";
        $statement = $this->database->prepare($sql);

        $statement->bindparam(':fname', $fname);
        $statement->bindparam(':lname', $lname);
        $statement->bindparam(':dob', $dob);
        $statement->bindparam(':email', $email);
        $statement->bindparam(':contactnum', $contactnum);
        $statement->bindparam(':specialty_id', $specialty);
        $statement->bindparam(':avatar_path', $avatar_path);



        $statement->execute();
        return true;




    }
    catch(PDOException $e)
    {

        echo $e->getMessage();
        //throw $e;
        return false;

    }


    


  }

  public function getAttendees()
  {
    try{
    $sql = "SELECT * FROM `attendance` a inner join specialties s on a.specialty_id = s.specialty_id";
    $result = $this->database->query($sql);
    return $result;
  }
  catch (PDOException $e)
  {

    echo $e->getMessage();
    return false;
  
  }
}


  public function getSpecialties(){
    try
    {
    $sql = "SELECT * FROM `specialties`";
    $result = $this->database->query($sql);
    return $result;
    }
    catch (PDOException $e){

      echo $e->getMessage();
      return false;
    
    }
  }

  public function getAttendeeDetails($id)
  {
    try
    {
    $sql = "select * from attendance a inner join specialties s on a.specialty_id = s.specialty_id where id = :id";
    $stmt = $this->database->prepare($sql);
    $stmt->bindparam(':id',$id);
     $stmt->execute();
     $result = $stmt->fetch();
     return $result;
    }
    catch (PDOException $e){

      echo $e->getMessage();
      return false;
    
    }
  }

  public function deleteAttendee($id){


    try
    {

    $sql = "delete from attendance where id = :id";
    $stmt = $this->database->prepare($sql);
    $stmt->bindparam(':id',$id);
    $stmt->execute();
    return true;
  }
  catch (PDOException $e){

    echo $e->getMessage();
    return false;

  }
    
  }

  public function editAttendee($id, $fname, $lname, $dob, $email, $contactnum, $specialty){

    try{
      $sql = "UPDATE `attendance` SET `firstname`= :fname,`lastname`=:lname,`dateofbirth`=
      :dob,`email`= :email,`contactnum`= :contactnum,`specialty_id`= :specialty_id WHERE id = :id ";

       $statement = $this->database->prepare($sql);
       $statement->bindparam(':id', $id);
  
       $statement->bindparam(':fname', $fname);
       $statement->bindparam(':lname', $lname);
       $statement->bindparam(':dob', $dob);
       $statement->bindparam(':email', $email);
       $statement->bindparam(':contactnum', $contactnum);
       $statement->bindparam(':specialty_id', $specialty);
  
  
       $statement->execute();
       return true;

    }
    catch(PDOException $e)
    {

        echo $e->getMessage();
        //throw $e;
        return false;

    }

  }
  public function getSpecialtiesById($id){
    try
    {
    $sql = "SELECT * FROM `specialties` where specialty_id = :id";
    $stmt = $this->database->prepare($sql);
    $stmt->bindparam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
    }
    catch (PDOException $e)
    {

      echo $e->getMessage();
      return false;
    
    }
  }


  };

?>