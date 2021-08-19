<?php

require_once('functions.php');

ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL", "https://jsonplaceholder.typicode.com/posts");
define("LOGS", "logs/");

$json = array(
	  "title" => "Titulo de prueba",
	  "body" => "Cuerpo del POST",
	  "userId" => 1
	);

$json_input = json_encode($json);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json; charset=UTF-8'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=POST]");

if (($http_status_code == 201) && ($user == true)) {

    $data = json_decode($user);
    loguear("a+", LOGS."info_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."]");
    loguear("a+", LOGS."info_log", var_export($data, true));
    var_dump($data);

 } else {
   echo "Ha ocurrido un error";
   loguear("a+", LOGS."error_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=POST]");
 }

curl_close($ch);


