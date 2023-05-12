<?php 

require('connect.php');
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		$zalogo=true;
	}
	else{
	$zalogo=false;}
	
	
	if($zalogo==true)
	{
echo "<!DOCTYPE html>
<html>
<title>Slownik</title>
<head>
<link rel='stylesheet' href='style.css'>
</head>
<body>";
$sql = "select * from slowka";
$result = $conn->query($sql);

$pl = $_POST['pl'];
$eng = $_POST['eng'];
$zda = $_POST['zda'];
$tlum = $_POST['tlu'];
$kier = $_POST['kier'];

 $sql = "INSERT INTO slowka (polski,angielski,zdanie,tlumaczenie,kierunek) VALUES ('$pl', '$eng', '$zda', '$tlum', '$kier')";
 
 $result = $conn->query($sql);
 header('Location: indexAdmin.php');
	}
else {
	echo "<a href=login.php>Zaloguj</a>";
	}
	  
?>