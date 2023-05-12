<?php
require 'connect.php';

$sql = "INSERT INTO admins (Login,Haslo) VALUES('Admin2','".md5('Admin2')."')";
$result = $conn->query($sql);
$conn->close();
?>