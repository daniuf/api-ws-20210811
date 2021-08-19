<?php

require_once('functions.php');

ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL", "https://jsonplaceholder.typicode.com/posts/1");
define("LOGS", "logs/");
define("METHOD", "DELETE");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, METHOD);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");

if (($http_status_code == 200) && ($user == true)) {

    loguear("a+", LOGS."info_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");

 } else {
   echo "Ha ocurrido un error";
   loguear("a+", LOGS."error_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");
 }

curl_close($ch);


