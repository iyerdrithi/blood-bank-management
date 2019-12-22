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
    <title> Facility Portal </title>
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
<h3 class="text-center"> Welcome <?php echo $_SESSION['facility_name']
?> </h3> <br>
