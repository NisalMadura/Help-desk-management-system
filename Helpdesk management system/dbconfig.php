<?php

//Define your host here.
$hostname = "localhost";

//Define your database username here.
$username = "root";

//Define your database password here.
$password = "";

//Define your database name here.
$dbname = "db_helpdesk";

$conn = mysqli_connect("$hostname", "$username", "$password","$dbname");

$connect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
 
 if (!$conn)
 
 {
	 
 die('Could not connect: ' . mysqli_error());
 
 }
 session_start();

?>
