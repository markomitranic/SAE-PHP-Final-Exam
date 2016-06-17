<?php
// Ukljucujem DB config i pristupne metode
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$pass = hash('sha256', $_POST['pass']);
	$name=$_POST['name'];
	$email=$_POST['email'];	
	
	// Proveri da nema nesto prazno
	if(empty($name) || empty($email)) {	
			echo "<font color='red'>Polje je prazno.</font><br/>";
	} else {	
		// Ukoliko je sve ok izmeni tabelu
		$result = mysql_query("UPDATE users SET name='$name',pass='$pass',email='$email' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];
// Podatke povezane sa ovim id prikazati
$result = mysql_query("SELECT * FROM users WHERE id=$id");

while($res = mysql_fetch_array($result))
{
	$pass = $res['pass'];
	$name = $res['name'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Izmeni podatke</title>
	<link rel="stylesheet" href="css.css">

</head>

<body>
	<a href="index.php">Nazad na pregled</a>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr> 
				<td>Pass</td>
				<td><input type="password" name="pass" value=<?php echo $pass;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Izmeni podatke"></td>
			</tr>
		</table>
	</form>
</body>
</html>
