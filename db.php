<?php

$hostname = "localhost";
$username = "ghcray";
$passwd = "dbuser@28";
$dbname = "ghcray";

$con = mysql_connect($hostname, $username, $passwd);
if(!$con)
	die("Database Connection Error " . mysql_error());

$db = mysql_select_db($dbname);
if(!$db)
	die("Database Selection Failed " . mysql_error());

?>