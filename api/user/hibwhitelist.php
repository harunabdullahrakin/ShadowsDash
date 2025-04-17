<?php
header("Access-Control-Allow-Origin: *");
require("../../require/sql.php");
if (!isset($_GET['serverid'])) {
    die("server id not set");
}
$result = $cpconn->query("SELECT * FROM hibernate_whitelist WHERE uid = '" . mysqli_real_escape_string($cpconn, $_GET['serverid']) . "'")->num_rows;


echo $result;
