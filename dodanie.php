<link rel='stylesheet' href='style.css'>
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
<body>
<div class='centerDodanie'>";
$sql = "select * from slowka";
$result = $conn->query($sql);
echo '<form action="dodanieDoBazy.php" method="post">
  <div class="container">
    <label for="PL"><b>Polski</b></label>
    <input type="text" placeholder="Podaj slowko PL" name="pl" required maxlength="100">
<br>
    <label for="ENG"><b>Angielski</b></label>
    <input type="text" placeholder="Podaj slowko ANG" name="eng" required maxlength="100">
<br>
	<label for="ZDA"><b>Zdanie</b></label>
    <input type="text" placeholder="Podaj zdanie" name="zda"  maxlength="200">
	<br>
	<label for="TLU"><b>Tlumaczenie</b></label>
    <input type="text" placeholder="Podaj tlumaczenie" name="tlu"  maxlength="200">
	<br>
	<label for="KIER"><b>Kierunek</b></label>
    <input type="text" placeholder="Podaj kierunek" name="kier" required maxlength="100">
<br>
    <button type="submit">Dodaj</button> <input type="button" value="Anuluj!" onclick="history.back()">' ;
	}
	else {
	echo "<a href=login.php>Zaloguj</a>";
	}
	  
?>