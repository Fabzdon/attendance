<?php include_once 'includes/session.php' ;

require_once "database/crud.php";
require_once "database/connection.php";?>

<!doctype html>
<html lang="en">

<head>
  <h1><?php $title ?></h1>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: 'yy:mm:dd',
        changeMonth: true,
        changeYear: true,
        //yearRange: "-100+0"
      });
    });
  </script>

  <nav class="navbar navbar-expand-lg navbar-dark  bg-primary fixed">
    <a class="navbar-brand" href="index.php">IT Conference</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
        <a class="nav-link" href="viewrecords.php">View Attendees <span class="sr-only"></span></a>
        </li>
      </ul>
    </div>

    <div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <?php

          if (!isset($_SESSION['userid'])) {


          ?>


            <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>

          <?php } else { ?>
            <a class="nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span></a>
            <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>

          <?php } ?>
          </li>
        </ul>
      </div>
    </div>

  </nav>
  </br>


<body>
  <div class="container">


 
 