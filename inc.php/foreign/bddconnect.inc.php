<?php	
	$BDD = array();
	$BDD['host'] = "crifrbaunidice.mysql.db";
	$BDD['user'] = "crifrbaunidice";
	$BDD['pass'] = "Winningteamdeadass93";
	$BDD['db'] = "crifrbaunidice";
	$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
	$mysqli->set_charset("utf8");
	$_SESSION["mysqli"] = $mysqli;
?>