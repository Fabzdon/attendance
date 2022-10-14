<?php 
$title = "Edit Record" ;
 require_once 'includes/header.php'; 
 require_once 'database/connection.php';
 require_once 'database/crud.php';
 require_once 'includes/auth_check.php';


 $results = $crud->getSpecialties();

 if(!isset($_GET['id'])){

    include 'includes/errormessage.php';
    header("Location: viewrecords.php");


 }

 else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);



 ?>

<h1 class="text-center">Edit Record</h1>

<form method = "post" action = "editrecord.php">
    <input type = "hidden" name = "id" value = "<?php echo $attendee['id']?>" />

    <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" class="form-control" value = "<?php echo $attendee['firstname'] ?>" id="firstname" name = "firstname">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value = "<?php echo $attendee['lastname'] ?>" id="lastname" name = "lastname">
    </div>

    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" value = "<?php echo $attendee['dateofbirth'] ?>"class="form-control" id="datepicker" name = "datepicker">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" value = "<?php echo $attendee['email'] ?>" class="form-control" for = "email" id="email" name = "email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class = "mb-3" >
        <label name = "specialty" for = "specialty"> Area of Expertise </label>
        <select class = "form-control" id = "specialty" name = "specialty" >
           <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <option value = "<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'?>>
            <?php echo $r['name']; ?> 
        </option>

        <?php }?>

    </select>
 
   
    </div>

    <div class="mb-3">
        <label name = "contactnum" for="contactnum" class="form-label">Contact Number</label>
        <input type="text" value = "<?php echo $attendee['contactnum'] ?>"name="contactnum" class="form-control" id="contactnum" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <div class ="d-grid gap-2 col-6 mx-auto">

    <a  href = "viewrecords.php" type="submit" name = "submit" class="btn btn-success btn">Back to List</a>


    <button  type="submit" name = "submit" class="btn btn-success btn">Save Changes</button>

</div>
<?php }?>
<?php require_once 'includes/footer.php';?>
</form>

