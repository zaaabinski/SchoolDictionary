<?php 
require('connect.php');
$kier =  $_GET['KierID'];
session_start();
$_SESSION['kierunek'] = $kier;
echo "<!DOCTYPE html>
<html>
<title>Slownik</title>
<head>
<link rel='stylesheet' href='style.css'>
</head>
<body id='a'>
<input type='button' value='A++' onclick='increaseFontSizeBy200()'>
<input type='button' value='A+' onclick='increaseFontSizeBy100()'>
<input type='button' value='A' onclick='increaseFontSizeBy0()'>
<input type='button' value='C' onclick='changeColors()'>
<input type='button' value='B' onclick='backColors()'>";

		
echo "<div class='main'>"; 
	echo "<img src='flaga.png'>";
	echo "</div>";

		echo "<div class='centrKierunek'>";
		echo "<h1>";echo "Wybrany kierunek : "; echo $kier; echo "</h1>"
		;
		echo "</div>";
		echo "<div class='centrKierunek'>";
		?>
		<a href = 'index.php'>Strona główna</a>
		<?php
	echo "</div>";

		

echo "<div class='main'>"; 
	echo "<div class='search'>";

	echo "<input type=text id='live_search' placeholder='Search...'>";
	echo "</div>";
	echo "</div>";

		echo "<div id='searchresult'></div>";
$sql = "select * from slowka where kierunek like '$kier'";

$result = $conn->query($sql);

echo "<br>";
  echo "<table>";
  echo "<th>Polski</th>"; echo "<th>Angielski</th>"; echo "<th>Zdanie</th>"; echo "<th>Tlumaczenie</th>";echo "<th>Kierunek</th>";
if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
	  
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
	  echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  

  echo "</body>";
  echo "</html>";
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
				
				url:"livesearchKierunek.php",
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
<script> 
    function increaseFontSizeBy200() {
        document.getElementById('a').style.fontSize = "400%";
    }

    function increaseFontSizeBy100() {
        document.getElementById('a').style.fontSize = "200%";      
    }
	function increaseFontSizeBy0() {
        document.getElementById('a').style.fontSize = "100%";      
    }
</script>
<script>
// get all elements on the page
function changeColors(){
var elements = document.getElementsByTagName("body");

// loop through each element and change its background color to yellow
for (var i = 0; i < elements.length; i++) {
  elements[i].style.backgroundColor = "yellow";
  elements[i].style.color = "black";
}
}

function backColors(){
var elements = document.getElementsByTagName("body");

// loop through each element and change its background color to yellow
for (var i = 0; i < elements.length; i++) {
  elements[i].style.backgroundColor = "#cdbdff";
  elements[i].style.color = "black";
}
}

</script>