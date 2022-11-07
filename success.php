<?php

$title = "Success!!!";
require_once "includes/header.php";


require_once 'sendemail.php';

?>

<h1 > Registration was successful. </h1>


<?php 

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
    
  <img src="<?php echo $destination?>"  class = "rounded-circle" style = "width : 12%; height : 12%" />
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $_POST["firstname"] . ' ' . $_POST["lastname"]  ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $_POST["email"] ?></h6>
    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $specialtyName['name'] ?></h6>

    <a > <?php echo $_POST["datepicker"] ?> </a>
  </br>
    <a > <?php echo $_POST["contactnum"] ?> </a>

  
    
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


