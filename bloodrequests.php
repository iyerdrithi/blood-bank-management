<?php
session_start();
if (isset($_SESSION['facility_name'])) {
  //logged in
} else {
  // not logged in
}
$facility = $_SESSION['facility_name'];
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
    <title> Blood Requests </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "OYjQALASxhL8";
    $record_no = array();
    $todays_date = array();
    $blood_type = array();
    $quantity = array();
    $status = array();

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
    $sql = "SELECT record_no, todays_date, blood_type, quantity, status FROM request_form WHERE facility_name='$facility'";

    // Insert SQL data in MySQL database table
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data
    while ($row = mysqli_fetch_assoc($result))
    {
      array_push($record_no, $row['record_no']);
      array_push($todays_date, $row['todays_date']);
      array_push($blood_type, $row['blood_type']);
      array_push($quantity, $row['quantity']);
      array_push($status, $row['status']);
    }
  }
  else {
    echo "";
  }
    ?>

  <picture>
    <img src="picture1.png" class = "rounded mx-auto d-block" align = "middle" class="blood" alt="blood" height="130" width="130">
  </picture>
  <h4 class="text-center">
    Blood Bank Management System
  </h4>
  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="portal.php">Facility Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="bloodrequests.php">Blood Requests</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="requestform.html">Request Form</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contact Us</a>
  </li>
</ul>
<br>
<h3 class="text-center"> Welcome <?php echo $_SESSION['facility_name']
?> </h3> <br>

<p class="text-center"> Blood Requests </p>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date Requested</th>
      <th scope="col">Blood Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php for ($i=0; $i<count($record_no); $i++) {
        echo '<tr>';
        echo '<th scope="row">'.$record_no[$i].'</th>';
        echo '<td>'.$todays_date[$i].'</td>';
        echo '<td>'.$blood_type[$i].'</td>';
        echo '<td>'.$quantity[$i].'</td>';
        echo '<td>'.$status[$i].'</td>';
        echo '</tr>';
      } ?>

  </tbody>
</table>
