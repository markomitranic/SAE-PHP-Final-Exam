<?php
// Ukljucujem DB config i pristupne metode
include("config.php");

// Koji ID brisemo
$id = $_GET['id'];
$result = mysql_query("DELETE FROM users WHERE id=$id");
header("Location:index.php");
?>

