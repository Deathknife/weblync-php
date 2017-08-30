<?php
define('IN_SITE', 1);
require_once('../config.php');

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "ERROR Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}

$url = $_POST["Url"]);
$stringsToReplace = [
	"SteamID", "SteamID64", "Hostname", "IpAddress" ,"Port", "UserId", "Client", "Args"
];
for($i = 0; $i < sizeof($stringsToReplace); $i++) {
	if(isset($_POST[$stringsToReplace[$i]])) {
		$url = str_replace('{'. $stringsToReplace[$i] .'}', $_POST[$stringsToReplace[$i]], $url);
	}
}

/*
SteamWorks_SetHTTPRequestGetOrPostParameter(request, "ServerKey", ServerKey);
	SteamWorks_SetHTTPRequestGetOrPostParameter(request, "UserId", UserId);
	SteamWorks_SetHTTPRequestGetOrPostParameter(request, "SteamId", SteamId);
SteamWorks_SetHTTPRequestGetOrPostParameter(request, "Url", buffer);
*/

$UserId = $mysqli->real_escape_string($_POST["UserId"]);
$steamid = $mysqli->real_escape_string($_POST["SteamID"]);
$serverkey = $mysqli->real_escape_string($_POST["ServerKey"]);
$urlEx = $mysqli->real_escape_string($url);

$sql = $mysqli->query("INSERT INTO weblinks(userid, steamid, serverkey, url) VALUES ('{$UserId}', '{$steamid}', '{$serverkey}', '{$urlEx}')");
if(!$sql) {
	echo "error detected";

    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    die();
}

//$sql->free();
$mysqli->close();
echo('OK '. $UserId);
?>
