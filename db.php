<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "tutorial");

$conn = mysqli_connect(HOST, USER, PASS, DBNAME);
if (!$conn) {
	echo "Database Connection Error";
	exit();
}
?>