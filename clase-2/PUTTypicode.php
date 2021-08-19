<?php

require_once('functions.php');

ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL", "https://jsonplaceholder.typicode.com/posts/1");
define("LOGS", "logs/");
define("METHOD", "PUT");

$json = array(
	  "id" => 1,
	  "title" => "Titulo de prueba UPDATE",
	  "body" => "Cuerpo actualizado",
	  "userId" => 1
	);

$json_input = json_encode($json);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, METHOD);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json; charset=UTF-8'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");

if (($http_status_code == 200) && ($user == true)) {

    $data = json_decode($user);
    loguear("a+", LOGS."info_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");
    loguear("a+", LOGS."info_log", var_export($data, true));
    var_dump($data);

 } else {
   echo "Ha ocurrido un error";
   loguear("a+", LOGS."error_log", "[URL=".URL."]||[STATUS_CODE=".$http_status_code."][METHOD=".METHOD."]");
 }

curl_close($ch);


