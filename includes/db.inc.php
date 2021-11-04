<?php


$servername = "localhost";
$username = "phpteszt";
$password = "4CYKC70ezREYBjPG";
$db = "teszt";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?> 