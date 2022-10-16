<?php

$title = "Success!!!";
require_once "includes/header.php";
require_once "database/crud.php";
require_once "database/connection.php";
require_once 'includes/auth_check.php';
require_once 'sendemail.php';

?>

<h1 > Registration was successful. </h1>




<!-- 
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php //echo $_GET["firstname"] . ' ' . $_GET["lastname"]  ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php //echo $_GET["email"] ?></h6>
    <p class="card-text"><?php //echo $_GET["specialty"] ?></p>
    <a href="#" class="card-link"><?php //echo $_GET["datepicker"] ?></a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
-->

<?php // echo $_GET["firstname"];
    // echo $_GET["lastname"];
    // echo $_GET["dob"];
    // //echo $_GET["firstname"];
    // //echo $_GET["firstname"];
    // //echo $_GET["firstname"];x

    if(isset($_POST['submit'])){
      
      $fname = $_POST["firstname"];
      $lname = $_POST["lastname"];
      $dob = $_POST["datepicker"];
      $email = $_POST["email"];
      $contact = $_POST["contactnum"];
      $specialty = $_POST["specialty"];

      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext  = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = "$target_dir$contact.$ext";
      move_uploaded_file($orig_file,$destination);

      
     //  echo $_POST["lastname"];
     // echo $_POST["firstname"];
    //  echo $dob = $_POST["datepicker"];
    //  echo $_POST["email"];
     // echo $_POST["contactnum"];
      //echo $_POST["specialty"];


      
      

     
      $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty, $destination);
      $specialtyName = $crud->getSpecialtiesById($specialty);

      //echo $fname;
      

      if ($isSuccess)
      {
        $subject = "Welcome to I.t Conference 2019";
        $content = "You have successfully registered for this year\'s IT Conference";
        SendEmail::SendMail($email,'yes',"yes");

        include 'includes/successmessage.php';;


      }
      else 
      {

        include 'includes/errormessage.php';

      }
    }


    ?>
    
  <img src="<?php echo $destination?>"  class = "rounded-circle" style = "width : 15%, height : 15%" />
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $_POST["firstname"] . ' ' . $_POST["lastname"]  ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $_POST["email"] ?></h6>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $specialtyName['name'] ?></h6>

    <a > <?php echo $_POST["datepicker"] ?> </a>
  </br>
    <a > <?php echo $_POST["contactnum"] ?> </a>

    

    <!-- <div class="card" style="width: 18rem;">
<div class="card-body">
<p class="card-text"><?php echo $result["id"] ?></p>
  <h5 class="card-title"> <?php echo $result["firstname"] . ' ' . $result["lastname"]  ?></h5>
  <p class="card-text"><?php echo $result["contactnum"] ?></p>
  <h6 class="card-subtitle mb-2 text-muted"> <?php echo $result["email"] ?></h6>
  <p class="card-text"><?php echo $result["name"] ?></p>
  <p class="card-text"><?php echo $result["dateofbirth"] ?></p> -->

    
  </div> 
</div>




<br>
<br>
<br>
<br>
<br>

<?php
require_once "includes/footer.php"; 
?>


