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
	$nrSlowka= $_SESSION['id'];
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$var0=$_POST['pl'];
$var1=$_POST['eng'];
$var2=$_POST['zda'];
$var3=$_POST['tlum'];
$var4=$_POST['kier'];


 $sql = "Update  slowka set  polski = '$var0', angielski = '$var1', zdanie = '$var2', tlumaczenie='$var3', kierunek = '$var4' where id = $nrSlowka";
 header('Location: indexAdmin.php');
 
 $result = $conn->query($sql);
	}
	else {
	echo "<a href=login.php>Zaloguj</a>";
	}
?>
