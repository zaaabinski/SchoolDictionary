<link rel='stylesheet' href='style.css'>
<?php 
require('connect.php');
echo "<div class='centerLogin'>";
echo "<form action='authPage.php' method='post'>
  <div class='container'>
    <label for='login'><b>Login</b></label>
    <input type='text' placeholder='Podaj login' name='login' required>
<br>
    <label for='haslo'><b>Haslo</b></label>
    <input type='password' placeholder='Podaj haslo' name='haslo' required>
<br>
    <button type='submit'>Login</button>";

?>