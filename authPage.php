<?php 
require('connect.php');
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 	

	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: login.php');
		exit();
	}

$login = $_POST['login'];
$haslo = $_POST['haslo'];
$lo1=0;
$ha1=0;
$pasw=0;
$sql = "SELECT Login, Haslo from admins where login = '$login' order by id";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result-> fetch_assoc()){
	$lo1 = $row["Login"];
	$ha1 = $row["Haslo"];
}
}
else {}

if ((md5($haslo)==$ha1)) {
	$pasw=true;
}
$hasloHa = md5($haslo);

if($login==$lo1 && $pasw==true)
{
	$_SESSION['zalogowany']=true;
}
else{
	header('Location: login.php');
}
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		echo "Zalogowano";
		 header('Location: indexAdmin.php');
	}
	else "Podano błedne dane logownia";
?>
