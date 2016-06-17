<?php
// Ukljucujem DB config i pristupne metode
include_once("config.php");

// Ako nije ulogovan redirect na login
if (!isLoggedIn()) {
	header('Location: login.php');
	die();
}

// Pokupi podatke iz baze o svim userima
$result = mysql_query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>CMS Home</title>
</head>

<body>
<h1>CMS Users Lista</h1>
	<table>
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Email</td>
			<td>Update</td>
		</tr>
		<?php while($key = mysql_fetch_array($result)) :	?>
			<tr>
				<td><?php echo $key['name']; ?></td>
				<td><?php echo $key['email']; ?></td>
				<td><a href="edit.php?id=<?php echo $key['id']; ?>">Izmeni</a> || <a href="delete.php?id=<?php echo $key['id']; ?>" onClick="return confirm('Jeste li sigurni da zelite da obrisete ovaj unos?')">Obrisi</a></td>
			</tr>
		<?php endwhile; ?>
	</table>
	<a href="add.html">Napravi Novi post</a>

</body>
</html>
