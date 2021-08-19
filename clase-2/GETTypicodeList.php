<?php

require_once('functions.php');

ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL", "https://jsonplaceholder.typicode.com/posts");
define("LOGS", "logs/");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."]");

if (($http_status_code == 200) && ($user == true)) {

    $data = json_decode($user);
    loguear("a+", LOGS."info_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."]");
    loguear("a+", LOGS."info_log", var_export($data, true));
    var_dump($data);

 } else {
   echo "Ha ocurrido un error";
   loguear("a+", LOGS."error_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."]");
 }

curl_close($ch);


