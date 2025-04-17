<?php
require("../../require/sql.php");
header("Content-type: application/json");
ini_set("display_errors", 0);
if (!isset($_GET['id'])) {
    die("ID unset");
}
if (!is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$user = $cpconn->query("SELECT * FROM users WHERE discord_id = '".mysqli_real_escape_string($cpconn, $_GET['id'])."'");
if ($user->num_rows == 0) {
    die(json_encode(array("error" => array("message"=>"The user is not registered on our systems."))));
}
$user = $user->fetch_object();
echo json_encode(
    array(
        "error" => null,
        "username" => $user->discord_name,
        "avatar" => $user->avatar,
        "coins" => $user->coins,
        "balance" => $user->balance,
        "memory" => $user->memory,
        "disk" => $user->disk_space,
        "ports" => $user->ports,
        "databases" => $user->databases,
        "cpu" => $user->cpu,
        "server_limit" => $user->server_limit,
    )
);
die();
