<?php
require('connect.php');

$sql = 
"CREATE TABLE if not exists Slowka (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
polski VARCHAR(100) NOT NULL,
angielski VARCHAR(100) NOT NULL,
zdanie VARCHAR(150),
tlumaczenie varchar(200),
kierunek varchar(50),
notatki varchar(200)
)";
$conn->query($sql);




?>