<?php
$servername = "localhost";
$username = "kuba";
$password = "kuba123";
$database = "slownik";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>