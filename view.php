<?php 
$title = "view record";

require_once "includes/header.php";

require_once 'includes/auth_check.php';

if(!isset($_GET['id']))
{
    echo "<h1 class = 'text-danger'>An error occurred please try again</h1>";
  

}

else 
{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
    


?>
 <img src="<?php echo empty($result['avatar_path']) ? "uplaods/banner.jpg.png" : $result['avatar_path'];?>"  class = "rounded-circle" style = "width : 12%; height : 12%;  " />
<div class="card" style="width: 18rem;">
<div class="card-body">
<p class="card-text"><?php echo $result["id"] ?></p>
  <h5 class="card-title"> <?php echo $result["firstname"] . ' ' . $result["lastname"]  ?></h5>
  <p class="card-text"><?php echo $result["contactnum"] ?></p>
  <h6 class="card-subtitle mb-2 text-muted"> <?php echo $result["email"] ?></h6>
  <p class="card-text"><?php echo $result["name"] ?></p>
  <p class="card-text"><?php echo $result["dateofbirth"] ?></p>
  

 
</div> 
</div>
</br>

<td> <a href = "viewrecords.php"  class = "btn btn-info">Back to list </a></td>
    <td> <a href = "edit.php?id=<?php echo $result['id'] ?>" class = "btn btn-warning">Edit </a></td>
    <td> <a onclick = "return confirm('Delete this record?')"href = "deleterecord.php?id=<?php echo $result['id'] ?>" class = "btn btn-danger">Delete </a></td>
    
<?php }?>

<?php require_once "includes/footer.php"; ?>
