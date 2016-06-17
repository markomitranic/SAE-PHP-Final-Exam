<?php
session_start();
// Definisem pristupne podatke
define('DB_NAME', 'crud');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Pokusavamo konekciju
$conn = mysql_connect(DB_HOST,DB_USER,DB_PASS) 
			or die("cannot connected");

// Vracam resource
return mysql_select_db(DB_NAME, $conn);


function isLoggedIn() {
	if ($_SESSION['login'] = true) {
		return true;
	} else {
		return false;
	}
}
function verifyLogin() {
	$username = $_GET['username'];
	$pass = hash('sha256', $_GET['pass']);

	$result = mysql_query("SELECT * FROM users WHERE name='$username'");
	$row = mysql_fetch_array($result) or die(mysql_error());

	if ($pass == $row['pass']) {
		$_SESSION['login'] = true;
		return true;
	} else {
		$_SESSION['login'] = false;
		return false;
	}
}



	
?>
