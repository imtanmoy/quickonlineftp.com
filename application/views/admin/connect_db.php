<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "quickonline";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//
//$con=mysqli_connect('localhost','root','')or die("cannot connect to server");
//mysqli_select_db('pharmacydb')or die("cannot connect to database");

?>