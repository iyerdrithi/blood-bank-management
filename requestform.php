<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Facility Registration </title>
</head>
<body>
  <html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  </head>
  <body>
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

<?php
session_start();
if (isset($_SESSION['facility_name'])) {
  //logged in
} else {
  // not logged in
}
$facility = $_SESSION['facility_name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Request Form </title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "OYjQALASxhL8";


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
$sql = "INSERT INTO request_form set
TODAYS_DATE = '$_POST[todays_date]',
BLOOD_TYPE = '$_POST[blood_type]',
QUANTITY = '$_POST[quantity]',
DATE_REQUIRED = '$_POST[date_required]',
FACILITY_NAME = '$facility',
STATUS = 'Received'";

// Insert SQL data in MySQL database table
mysqli_query($conn, $sql);
?>

<p class="text-center">
<?php

// Display confirmation
echo "Your request has been received!";

// Close connection
mysqli_close($conn);

?>
</span>
 </body>
 </html>
