<?php
/*
1- API: https://api.estadisticasbcra.com

2- Autorizacion
  -  Authorization: BEARER {TOKEN}

  BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NjA4NjMyNDksInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.ox0xUlAT3tcaMyGavKzbUiYbIyxH_QDQzJygQu96IirePmRVUpNrBwqJjW5ysly_jNtKuEITZJfazDq31VSSDw

*/

ini_set("date.timezone", "America/Argentina/Buenos_Aires");

define("URL", "https://api.estadisticasbcra.com/");
define("TOKEN", "BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NjA4NjMyNDksInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.ox0xUlAT3tcaMyGavKzbUiYbIyxH_QDQzJygQu96IirePmRVUpNrBwqJjW5ysly_jNtKuEITZJfazDq31VSSDw");
define("LOGS", "logs/");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL."usd_of");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.TOKEN));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$usd = curl_exec($ch);

$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access_log", "[URL=".URL."usd_of]||[STATUS_CODE=".$http_status_code."]");

if (($http_status_code == 200) && ($usd == true)) {

    $data = json_decode($usd);

    for ($i = 0; $i < count($data); $i++) {
	echo "El dia ".$data[$i]->d." la cotizacion era de ".$data[$i]->v."<br/>";
    }
 } else {
   echo "Ha ocurrido un error";
   loguear("a+", LOGS."error_log", "[URL=".URL."usd_of]||[STATUS_CODE=".$http_status_code."]");
 }

curl_close($ch);


function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $datetime = $date->format("Y-m-d H:i:s");

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$datetime."]\t".$mensaje.PHP_EOL);
  fclose($fp);

}
