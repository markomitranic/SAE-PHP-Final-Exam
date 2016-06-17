<?php
// Ukljucujem DB config i pristupne metode
include_once("config.php");

// Ako je ulogovan redirect na index
if (isLoggedIn()) {
	header('Location: index.php');
	die();
} else if ($_REQUEST['username'] && $_REQUEST['username'] !== '') {
	if (verifyLogin()) {
		header('Location: index.php');
		die();
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS Login Page</title>
	<link rel="stylesheet" href="css.css">

</head>
<body>


<form action="" method="GET">
	<label for="username"></label>
	<input type="text" id="username" name="username">
	<label for="pass"></label>
	<input type="password" id="pass" name="pass">
	<input type="submit" value="Uloguj se">
</form>



	
</body>
</html>