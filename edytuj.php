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
$nrSlowka = $_GET['SlowkoID'];
$_SESSION['id']=$nrSlowka;
$sql = "SELECT polski, angielski, zdanie, tlumaczenie,kierunek  from slowka where id = $nrSlowka";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result-> fetch_assoc()){
	$var0 =  $row['polski'];
	$var1 =  $row['angielski'];
	$var2 = $row['zdanie'];
	$var3 = $row['tlumaczenie'];
	$var4 = $row['kierunek'];
	
}}

echo "<form action='edytujSkrypt.php' method='post'>
    <label for='pl'><b>Polski</b></label>
    <input type='text' placeholder='' name='pl' value='$var0' required>
<br>
    <label for='eng'><b>Angielski</b></label>
    <input type='text' placeholder='' name='eng'  value='  $var1'required>
<br>
  <label for='zda'><b>Zdanie</b></label>
    <input type='text' placeholder='' name='zda'  value='  $var1'required>
<br>
<label for='tlum'><b>Tlumaczenie</b></label>
    <input type='textarea '  placeholder='' name='tlum'  value='  $var3'required >
<br>
<label for='kier'><b>Kierunek</b></label>
    <input type='textarea' placeholder='' name='kier'  value='  $var4'required>
<br>
    <button type='submit'>Wyslij</button>
</form>";
	}else {
	echo "<a href=login.php>Zaloguj</a>";
	}

?>




