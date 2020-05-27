<?php
$servername = "localhost";
$username = "gautham";
$password = "moviesadmin@1234";
$dbname = "book_myshow";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// $con = mysqli_connect("localhost","gautham","moviesadmin@1234","book_myshow");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$config=array();
$config['base_url']='http://localhost/book-myshow';
$config=(object)$config;
?>
