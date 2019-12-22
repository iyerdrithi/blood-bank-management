<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $param_facility_name = trim($_POST["facility_name"]);
  $_SESSION['facility_name'] = $param_facility_name;
  header("location: portal.php");
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>
<body>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Facility Login </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "OYjQALASxhL8";
    $facility_arr = array();

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //Select database
    mysqli_select_db ( $conn , 'blood_bank_system' );
    // SQL statement to insert form posted data into table
    // the variable parameters on the right are inside the $_POST are received from the form.
    $sql = "SELECT facility_name from facility_registration";

    // Insert SQL data in MySQL database table
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data
    while ($row = mysqli_fetch_assoc($result))
    {
      array_push($facility_arr, $row['facility_name']);
    }
  }
  else {
    echo "no result found";
  }
    ?>

  </span>
   </body>
   </html>

  <picture>
    <img src="picture1.png" class = "rounded mx-auto d-block" align = "middle" class="blood" alt="blood" height="130" width="130">
  </picture>
  <h4 class="text-center">
    Blood Bank Management System
  </h4>
  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="#">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contact Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Feedback</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Volunteer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminlogin.php">Admin Login</a>
  </li>
</ul>
<br>
<br>
<p class="text-center">Facility Login</p> <br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="text-center">

  <select class="custom-select" name="facility_name" style="width: 250px;">
  <option> Choose your facility </option>
  <?php for ($i=0; $i<count($facility_arr); $i++) {
    echo '<option>'.$facility_arr[$i].'</option>';
  } ?>
</select> </div>
<br>
  <div align="center">
  <input type="password" name="password" class="form-control" placeholder="Password" style="width: 250px;">
  </div>
  <br> <br>
  <div class="text-center">
  <button type="submit" name="login" class="btn btn-danger mb-2">Login</button>
</div>
</form>
