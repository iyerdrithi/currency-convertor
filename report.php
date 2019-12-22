<?php

session_start();

if(isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views']+1;
else
    $_SESSION['views']=1;
?>
<p class="text-right">
  <?php
echo"Pages Viewed by Drithi: ".$_SESSION['views'];

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
    <title> Report </title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "OYjQALASxhL8";
    $DATE = array();
    $TIME_UPDATED = array();
    $USD= array();
    $AUD = array();
    $CAD = array();
    $CHF = array();
    $CNY = array();
    $EUR = array();
    $GBP = array();
    $HKD = array();
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //Select database
    mysqli_select_db ( $conn , 'finalexam' );

    $sql = "SELECT DATE, TIME_UPDATED, USD, AUD, CAD, CHF, CNY, EUR, GBP, HKD FROM exchangerate";

    // Insert SQL data in MySQL database table
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data
    while ($row = mysqli_fetch_assoc($result))
    {
      array_push($DATE, $row['DATE']);
      array_push($TIME_UPDATED, $row['TIME_UPDATED']);
      array_push($USD, $row['USD']);
      array_push($AUD, $row['AUD']);
      array_push($CAD, $row['CAD']);
      array_push($CHF, $row['CHF']);
      array_push($CNY, $row['CNY']);
      array_push($EUR, $row['EUR']);
      array_push($GBP, $row['GBP']);
      array_push($HKD, $row['HKD']);
    }
  }
  else {
    echo "";
  }
    ?>

    <br><br><br><br>

    <h4 class="text-center">
      Currency Report
    </h4>
    <br>
    <br>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Time Updated</th>
          <th scope="col">USD</th>
          <th scope="col">AUD</th>
          <th scope="col">CAD</th>
          <th scope="col">CHF</th>
          <th scope="col">CNY</th>
          <th scope="col">EUR</th>
          <th scope="col">GBP</th>
          <th scope="col">HKD</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i<count($DATE); $i++) {
          echo '<tr>';
          echo '<th scope="row">'.$DATE[$i].'</th>';
          echo '<td>'.$TIME_UPDATED[$i].'</td>';
          echo '<td>'.$USD[$i].'</td>';
          echo '<td>'.$AUD[$i].'</td>';
          echo '<td>'.$CAD[$i].'</td>';
          echo '<td>'.$CHF[$i].'</td>';
          echo '<td>'.$CNY[$i].'</td>';
          echo '<td>'.$EUR[$i].'</td>';
          echo '<td>'.$GBP[$i].'</td>';
          echo '<td>'.$HKD[$i].'</td>';
          echo '<tr>';
        } ?>
      </tbody>
    </table>
