<?php

$sname= "localhost";
$uname= "admin";
$password = "admin123";

$db_name = "log";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

?>