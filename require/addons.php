<?php
require("config.php");
/**
 * @var array $_ADDONS
 */
// If you do not know what you are doing, you can follow the documentation on "how to install add-ons" here: https://dashdocs.shadow-baguet.xyz/addons/installing-add-ons-for-the-dash-itself
#$_ADDONS[] = array("name" => "", "path" => "");

function logClient($message) {
    $url = "";
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $POST = [ 'username' => 'Client logs', 'content' => $message ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response   = curl_exec($ch);
}