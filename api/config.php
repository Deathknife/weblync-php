<?php
if(!(defined("IN_SITE"))) {
	die("Access Denied");
}

//mysql connection
$servername = "127.0.0.1";
$username = "user";
$password = "pw";
$dbname = "db";

$links = [
	["google", "https://www.google.com"],
	["youtube", "https://www.youtube.com"],
	["github", "https://www.github.com"]
];

?>