<!doctype html>
<html lang="en">
  <head>
  <div class = "container">
    <h1><?php echo $title ?></h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel = "stylesheet" href="css/index.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
 $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy:mm:dd',
      changeMonth: true,
      changeYear: true,
      //yearRange: "-100+0"
    });
  } );

  

  </script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">IT Conference</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="viewrecords.php">View Attendees <span class="sr-only"></span></a>
      </li>
      
     
    </ul>
  </div>
</nav>
</br>
  </head>
  <body>
 
    

    
  