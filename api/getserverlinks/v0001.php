<?php
define('IN_SITE', 1);
require_once('../config.php');

$alLinks = [];
for($i = 0; $i < sizeof($links); $i++) {
	array_push($alLinks, 'sm_'. $links[$i][0]);
}
echo('OK '. implode(' ', $alLinks));
?>