<?php 
$title = "User Login" ;
 require_once 'includes/header.php'; 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getAttendeeDetails($username,$new_password);
    if(!$result)
    {

        echo '<div class = "alert alert-danger">Username or Password is Incorrect! Please try again. </div>';

    }

    else 
    {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: viewrecords.php");

    }

}

 ?>

 <h1 class = "text-center"> <?php echo $title ?> </h1>

<br>
<br>

 <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method = "post" class="row g-3">
 <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Username</label>
    <input type="text" name = "username" class="form-control" id="inputPassword2" placeholder="Username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input name = "password" type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary btn-block mb-3">Login</button>
    <button type="submit" class="btn btn-primary btn-block mb-3">Forgot Password</button>

  </div>
</form>



<?php  require_once 'includes/footer.php';?>
</form>