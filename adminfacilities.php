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
    <title> Facilities </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "OYjQALASxhL8";
    $facility_id = array();
    $facility_name = array();
    $street_address = array();
    $city = array();
    $state = array();
    $zip = array();
    $email_address = array();
    $phone_number = array();

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
    $sql = "SELECT facility_id, facility_name, street_address, city, state, zip, email_address, phone_number FROM facility_registration";

    // Insert SQL data in MySQL database table
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data
    while ($row = mysqli_fetch_assoc($result))
    {
      array_push($facility_id, $row['facility_id']);
      array_push($facility_name, $row['facility_name']);
      array_push($street_address, $row['street_address']);
      array_push($city, $row['city']);
      array_push($state, $row['state']);
      array_push($zip, $row['zip']);
      array_push($email_address, $row['email_address']);
      array_push($phone_number, $row['phone_number']);
    }
  }
  else {
    echo "no result found";
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
      <a class="nav-link" href="adminportal.php">Home</a>
    </li>
  <li class="nav-item">
    <a class="nav-link" href="adminfacilities.php">Facilities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="adminbloodrequests.php">Blood Requests</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="requestform.html">Feedback</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contact Us</a>
  </li>
</ul>
<br>
<p class="text-center"> Facilities </p> <br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Facility ID</th>
      <th scope="col">Facility Name</th>
      <th scope="col">Street Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Zip</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>
  <tbody>
      <?php for ($i=0; $i<count($facility_id); $i++) {
        echo '<tr>';
        echo '<th scope="row">'.$facility_id[$i].'</th>';
        echo '<td>'.$facility_name[$i].'</td>';
        echo '<td>'.$street_address[$i].'</td>';
        echo '<td>'.$city[$i].'</td>';
        echo '<td>'.$state[$i].'</td>';
        echo '<td>'.$zip[$i].'</td>';
        echo '<td>'.$email_address[$i].'</td>';
        echo '<td>'.$phone_number[$i].'</td>';
        echo '</tr>';
      } ?>

  </tbody>
</table>
