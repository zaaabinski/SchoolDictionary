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
echo "<div class='main'>"; 
		echo "<div class='centrKierunek'>";
		echo "<a href=dodanie.php>Dodaj slowko</a>";
		echo "</div>";
	echo "<div class='search'>";
	echo "<input type=text id='live_search' placeholder='Search...'>";
	echo "</div>";
	echo "<br>";
		echo "<div=class'center'>";
		echo "<a href=logout.php>Wyloguj</a>";
		echo "</div>";
echo "</div>";
		echo "<div id='searchresult'></div>";
$sql = "select * from slowka";

$result = $conn->query($sql);


  echo "<table>";
  echo "<th>Polski</th>"; echo "<th>Angielski</th>"; echo "<th>Zdanie</th>"; echo "<th>Tlumaczenie</th>";echo "<th>Kierunek</th>";echo "<th>Edycja</th>";
if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
	  $id = $row["id"];
	  $pl =  $row["polski"]; 
	  $eng = $row["angielski"]; 
	  $zdanie =  $row["zdanie"]; 
	  $tlum = $row["tlumaczenie"];
	  $kier = $row["kierunek"]; 
	  //$not = $row["notati"]; echo "<br>";
	  
	  echo "<tr>";
	   echo "<td>"; echo $pl; echo "</td>";
		echo "<td>"; echo $eng; echo "</td>";
		echo "<td>"; echo $zdanie; echo "</td>";
		echo "<td>"; echo $tlum; echo "</td>";
		echo "<td>"; echo $kier; echo "</td>";
		echo "<td>"; echo "<a href='edytuj.php?SlowkoID=  $id;  '>Edytuj</a>"; echo "</td>";
	  echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
}
	}  
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	
	$("#live_search").keyup(function(){
		
		var input = $(this).val();
		//alert(input);
		
		if(input !=""){
			$.ajax({
				
				url:"livesearchAdmin.php",
				method:"POST",
				data:{input:input},
				
				success:function(data){
					$("#searchresult").html(data);
					$("#searchresult").css("display","block");
				}
			});
		}
		else{$("#searchresult").css("display","none");
		}
	 });
});
</script>