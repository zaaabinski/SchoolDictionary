<?php
require('connect.php');
$sql = 
"CREATE TABLE if not exists Admins (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Login VARCHAR(100) NOT NULL,
Haslo VARCHAR(100) NOT NULL,
notatki varchar(100)
)";
$conn->query($sql);




?>