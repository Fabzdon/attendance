<?php 
$title = "view records";

require_once "includes/header.php";
require_once 'includes/auth_check.php';

$title = 'Index';



$results = $crud->getAttendees();

?>



<table class = "table table-striped table-dark">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date Of Birth</th>
        <th>Email Address</th>
        <th>Area of Expertise</th>
        <th>Contact Number</th>
        <th>Select</th>
        <th>Edit</th>
        <th>Delete</th>




    </tr>
<?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) 
{ ?>


<tr>
    <td> <?php echo $r['id']; ?></td>
    <td> <?php echo $r['firstname']; ?></td>
    <td> <?php echo $r['lastname']; ?></td>
    <td> <?php echo $r['dateofbirth']; ?></td>
    <td> <?php echo $r['email']; ?></td>
    <td> <?php echo $r['contactnum']; ?></td>
    <td> <?php echo $r['name']; ?></td>
    <td> <a href = "view.php?id=<?php echo $r['id']; ?>" class = "btn btn-primary">View </a></td>
    <td> <a href = "edit.php?id=<?php echo $r['id']; ?>" class = "btn btn-warning">Edit </a></td>
    <td> <a onclick = "return confirm('Delete this record?')"href = "deleterecord.php?id=<?php echo $r['id'] ?>" class = "btn btn-danger">Delete </a></td>


</tr>

<?php } ?>
</table>


<br>
<br>
<br>

<?php require_once 'includes/footer.php'?>
