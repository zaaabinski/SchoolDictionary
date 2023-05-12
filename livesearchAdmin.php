<?php
require('connect.php');
echo "<head>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<table>
  <th>Polski</th>
  <th>Angielski</th>
  <th>Zdanie</th>
  <th>Tlumaczenie</th>
  <th>Kierunek</th>
  <th>Edytuj</th>";	

if(isset($_POST['input'])){
	
$input = $_POST['input'];

//$query = "Select polski,angielski,zdanie,tlumaczenie,kierunek from slowka where name like '%{$input}%'";
$query = "Select * from slowka where polski like '%$input%' or angielski like '%$input%' " ;

$result = (mysqli_query($conn,$query));
if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		$id = $row["id"];
		$pl =  $row["polski"]; 
	  $eng = $row["angielski"]; 
	  $zdanie =  $row["zdanie"]; 
	  $tlum = $row["tlumaczenie"];
	  $kier = $row["kierunek"]; 
	  
		echo "<tr>";
		echo "<td>"; echo $pl; echo "</td>";
		echo "<td>"; echo $eng; echo "</td>";
		echo "<td>"; echo $zdanie; echo "</td>";
		echo "<td>"; echo $tlum; echo "</td>";
		echo "<td>"; echo $kier; echo "</td>";
		echo "<td>"; echo "<a href='edytuj.php?SlowkoID=  $id;  '>Edytuj</a>"; echo "</td>";
		echo "</tr>";
	}
}	


else{
	echo "<h1>Nie ma takich wynikow</h1>";
}
}
echo "</table></body>";
?>