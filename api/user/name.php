<?php
require("../../require/sql.php");
ini_set("display_errors", 0);
if (!isset($_GET['id'])) {
    die("ID unset");
}
if (!is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$user = $cpconn->query("SELECT discord_name FROM users WHERE discord_id = '".mysqli_real_escape_string($cpconn, $_GET['id'])."'");
if ($user->num_rows == 0) {
    die("User doesn't exist");
}
echo $user->fetch_object()->discord_name;
die();
