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
    <title> Final Exam </title>
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

    $url = 'https://api.exchangerate-api.com/v4/latest/USD';
    $json = file_get_contents($url);
    $currency = json_decode($json, true);

     $sql = "INSERT INTO exchangerate (DATE, TIME_UPDATED, USD, AUD, CAD, CHF, CNY, EUR, GBP, HKD)
            VALUES ('".$currency[date]."', '".$currency[time_last_updated]."', '".$currency['rates']['USD']."',
              '".$currency['rates']['AUD']."', '".$currency['rates']['CAD']."', '".$currency['rates']['CHF']."',
              '".$currency['rates']['CNY']."', '".$currency['rates']['EUR']."', '".$currency['rates']['GBP']."',
              '".$currency['rates']['HKD']."')";

?>
<p class="text-center">
<?php
        echo "Database has been updated with the most recent exchange rates!";
    //Select database
    mysqli_select_db ( $conn , 'finalexam' );

    mysqli_query($conn, $sql);

    // Close connection
    mysqli_close($conn);

    ?>
