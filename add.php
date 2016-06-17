<?php
	// Ukljucujem DB config i pristupne metode
	include_once("config.php");
 ?>

<html>
<head>
	<title>Dodaj novog korisnika</title>
</head>

<body>
<?php
if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
		
	// Da li je sve popunjeno?
	if(empty($name) || empty($pass) || empty($email)) {

			echo "<p color='red'>Please Fill all fields.</p><br/>";
		
		// Link za history back
		echo "<a href='javascript:self.history.back();'>Vratite se stranu unazad</a>";
	} else { 
		$result = mysql_query("INSERT INTO users(name,pass,email) VALUES('$name','$pass','$email')");
		echo "<p color='green'>Podaci upisani.</p>";
		echo "<a href='index.php'>Nazad na Home</a>";
	}
}
?>
</body>
</html>
