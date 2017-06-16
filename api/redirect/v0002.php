<?php
define('IN_SITE', 1);
require_once('../config.php');

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "ERROR Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}


$UserId = $mysqli->real_escape_string($_GET["UserId"]);
$steamid = $mysqli->real_escape_string($_GET["SteamId"]);
$serverkey = $mysqli->real_escape_string($_GET["ServerKey"]);

$sql = $mysqli->query("SELECT * FROM weblinks WHERE userid='{$UserId}' and steamid='{$steamid}' and serverkey='{$serverkey}' ORDER BY created_at DESC LIMIT 1");
if(!$sql) {
	echo "error detected";

    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    die();
}
if($page = $sql->fetch_array()) {
	echo ("<script>
	window.open('{$page["url"]}', '', '', true);
	</script>");
	$mysqli->query("DELETE FROM weblinks WHERE userid='{$UserId}' and steamid='{$steamid}' and serverkey='{$serverkey}'");
}
$sql->free();
$mysqli->close();
?>